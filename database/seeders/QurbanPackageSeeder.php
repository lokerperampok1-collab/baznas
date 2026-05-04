<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\QurbanPackage;

class QurbanPackageSeeder extends Seeder
{
    public function run(): void
    {
        $qurbans = [
            ['name' => 'DOMBA GRADE C 🔥(Stok Terbatas)', 'price' => 1699000, 'description' => 'Perkiraan Berat 20 - 23 Kg', 'image_folder' => '2026/03', 'image_name' => 'gradec-500x350.png', 'type' => 'Domba'],
            ['name' => 'DOMBA GRADE B', 'price' => 2750000, 'description' => 'Perkiraan Berat 28 - 32 Kg', 'image_folder' => '2026/03', 'image_name' => 'grade-B-500x350.png', 'type' => 'Domba'],
            ['name' => 'DOMBA GRADE A', 'price' => 3300000, 'description' => 'Perkiraan Berat 35 - 38', 'image_folder' => '2026/03', 'image_name' => 'Grade-A-500x350.png', 'type' => 'Kambing'],
            ['name' => 'Sapi 1/7 Ekor', 'price' => 3500000, 'description' => 'Perkiraan Berat 220 - 270 Kg', 'image_folder' => '2025/04', 'image_name' => 'paybill-program-banner-1-NOALGD-1715674694244.jpg', 'type' => 'Sapi'],
            ['name' => 'Sapi 1 Ekor Full', 'price' => 24500000, 'description' => 'Perkiraan Berat 220 - 270 Kg', 'image_folder' => '2025/04', 'image_name' => 'SAPI.jpg', 'type' => 'Sapi'],
        ];

        foreach ($qurbans as $q) {
            QurbanPackage::updateOrCreate(['name' => $q['name']], $q);
        }
    }
}
