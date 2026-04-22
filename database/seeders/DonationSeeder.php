<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Donation;
use Illuminate\Support\Str;
use Carbon\Carbon;

class DonationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Donation::truncate();
        $jsonPath = database_path('seeders/donors.json');
        if (!file_exists($jsonPath)) {
            return;
        }

        $donors = json_decode(file_get_contents($jsonPath), true);
        
        foreach ($donors as $d) {
            Donation::create([
                'token' => 'DON-' . Str::upper(Str::random(8)),
                'sapaan' => 'Bpk/Ibu',
                'name' => $d['name'],
                'whatsapp' => '0812' . rand(10000000, 99999999),
                'comment' => $d['comment'],
                'qurban_details' => [['type' => 'Kurban', 'qty' => 1]],
                'total_nominal' => $d['amount'],
                'unique_code' => rand(100, 999),
                'total_payment' => $d['amount'] + rand(100, 999),
                'payment_method' => 'VA',
                'payment_status' => 'success',
                'created_at' => Carbon::parse($d['date']),
                'updated_at' => Carbon::parse($d['date']),
            ]);
        }
    }
}
