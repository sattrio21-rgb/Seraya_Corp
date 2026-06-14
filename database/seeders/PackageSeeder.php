<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    public function run(): void
    {
        $packages = [
            [
                'name' => 'Open Trip Bromo',
                'description' => 'Nikmati keindahan Gunung Bromo dengan paket open trip yang seru. Termasuk jeep, guide, dan perlengkapan pendakian.',
                'price' => 350000,
                'is_available' => true,
            ],
            [
                'name' => 'Private Trip Malang',
                'description' => 'Jelajahi kota Malang dengan paket private trip yang fleksibel. Kunjungi wisata alam, kuliner, dan sejarah.',
                'price' => 500000,
                'is_available' => true,
            ],
            [
                'name' => 'Paket Wedding',
                'description' => 'Paket pernikahan lengkap dengan dekorasi, dokumentasi, dan koordinasi acara di lokasi wisata pilihan.',
                'price' => 15000000,
                'is_available' => true,
            ],
        ];

        foreach ($packages as $package) {
            Package::create($package);
        }
    }
}
