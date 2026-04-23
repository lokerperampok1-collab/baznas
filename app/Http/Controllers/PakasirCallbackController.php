<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;
use Illuminate\Support\Facades\Log;

class PakasirCallbackController extends Controller
{
    /**
     * Handle Pakasir Webhook Callback
     */
    public function handle(Request $request)
    {
        Log::info('Pakasir Callback Received:', $request->all());

        $amount = $request->input('amount');
        $order_id = $request->input('order_id');
        $project = $request->input('project');
        $status = $request->input('status'); // 'completed'

        if ($project !== env('PAKASIR_PROJECT')) {
            Log::warning('Pakasir Callback: Project slug mismatch.');
            return response()->json(['message' => 'Project mismatch'], 400);
        }

        // Search for donation by token (which is used as order_id)
        $donation = Donation::where('token', $order_id)->first();

        if (!$donation) {
            Log::warning("Pakasir Callback: Donation not found for order_id: {$order_id}");
            return response()->json(['message' => 'Donation not found'], 404);
        }

        // Verify amount (optional but recommended)
        // Pakasir amount might be different if there are fees, but total_payment should match.
        // In our case, we send total_payment as amount to Pakasir.
        if ($donation->total_payment != $amount) {
            Log::warning("Pakasir Callback: Amount mismatch. Expected: {$donation->total_payment}, Received: {$amount}");
            // Some gateways might include fees in amount, so check your Pakasir configuration.
        }

        if ($status === 'completed') {
            $donation->update([
                'payment_status' => 'success'
            ]);
            Log::info("Pakasir Callback: Donation #{$donation->token} successfully updated to success.");
        }

        return response()->json(['message' => 'OK']);
    }
}
