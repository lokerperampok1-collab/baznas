<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\QurbanPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Services\PakasirService;

class CampaignController extends Controller
{
    protected $pakasir;

    public function __construct(PakasirService $pakasir)
    {
        $this->pakasir = $pakasir;
    }

    public function show()
    {
        $target = 1000000000;
        $total_donated = Donation::where('payment_status', 'success')->sum('total_nominal');
        $donation_count = Donation::where('payment_status', 'success')->count();
        $progress_percent = ($target > 0) ? ($total_donated / $target) * 100 : 0;
        $donations = Donation::where('payment_status', 'success')->latest()->take(10)->get();

        return view('campaign.show', compact('total_donated', 'donation_count', 'target', 'progress_percent', 'donations'));
    }

    public function donate()
    {
        $qurbans = QurbanPackage::where('is_active', true)->get();
        return view('campaign.donate', compact('qurbans'));
    }

    public function donateSubmit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:120',
            'whatsapp' => 'required|string|max:15',
            'payment_method' => 'required',
            'qurban_details' => 'required|array',
        ]);

        $total_nominal = 0;
        foreach ($request->qurban_details as $item) {
            $price = $item['price'] ?? 0;
            $count = $item['count'] ?? 0;
            $total_nominal += $price * $count;
        }

        $unique_code = rand(100, 999);
        $total_payment = $total_nominal + $unique_code;
        $token = Str::random(16);

        $donationData = [
            'token' => $token,
            'sapaan' => $request->sapaan,
            'name' => $request->name,
            'whatsapp' => $request->whatsapp,
            'comment' => $request->comment,
            'qurban_details' => $request->qurban_details,
            'total_nominal' => $total_nominal,
            'unique_code' => $unique_code,
            'total_payment' => $total_payment,
            'payment_method' => $request->payment_method,
            'payment_status' => 'pending',
        ];

        // Pakasir Integration
        if ($request->payment_method == 'qris') {
            $pakasirResponse = $this->pakasir->createPayment('qris', $token, $total_payment);
            \Log::info('Pakasir Response: ' . json_encode($pakasirResponse));
            
            if (isset($pakasirResponse['payment'])) {
                $donationData['pakasir_order_id'] = $pakasirResponse['payment']['order_id'] ?? null;
                $donationData['payment_data'] = $pakasirResponse['payment'] ?? null;
            }
        }

        $donation = Donation::create($donationData);

        return response()->json([
            'success' => true,
            'redirect_url' => url('/campaign/kurban/invoice/' . $token)
        ]);
    }

    public function invoice($token)
    {
        $donation = Donation::where('token', $token)->firstOrFail();
        
        $banks = [
            'bsi' => ['name' => 'Bank Syariah Indonesia', 'number' => '7110821888', 'acc' => 'BAZNAS Kabupaten Tasikmalaya'],
            'bank_bjb_syariah' => ['name' => 'Bank BJB Syariah', 'number' => '5160102000700', 'acc' => 'BAZNAS Kabupaten Tasikmalaya'],
            'bank_bjb' => ['name' => 'Bank BJB', 'number' => '0050030012410', 'acc' => 'BAZNAS Kabupaten Tasikmalaya'],
            'bri' => ['name' => 'Bank BRI', 'number' => '016101000295300', 'acc' => 'BAZNAS Kabupaten Tasikmalaya'],
            'bni' => ['name' => 'Bank BNI', 'number' => '589387361', 'acc' => 'BAZNAS Kabupaten Tasikmalaya'],
            'mandiri' => ['name' => 'Bank Mandiri', 'number' => '1770001242988', 'acc' => 'BAZNAS Kabupaten Tasikmalaya'],
        ];

        $bank = $banks[$donation->payment_method] ?? null;

        return view('campaign.invoice', compact('donation', 'bank'));
    }

    public function loadMoreDonations(Request $request)
    {
        $limit = 10;
        $offset = $request->input('offset', 0);
        $type = $request->input('type', 'terbaru'); // terbaru, terbesar, doa

        $query = Donation::where('payment_status', 'success');

        if ($type == 'terbaru') {
            $query->latest();
        } elseif ($type == 'terbesar') {
            $query->orderByDesc('total_nominal');
        } elseif ($type == 'doa') {
            $query->whereNotNull('comment')->latest();
        }

        $donations = $query->skip($offset)->take($limit)->get();

        $html = '';
        foreach ($donations as $dn) {
            if ($type == 'doa') {
                $html .= view('campaign.partials.doa_item', compact('dn'))->render();
            } else {
                $html .= view('campaign.partials.donation_item', compact('dn'))->render();
            }
        }

        return response()->json([
            'html' => $html,
            'count' => $donations->count()
        ]);
    }
}
