<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    public function run(): void
    {
        $pages = [
            ['slug' => 'about_title', 'title' => 'Judul Tentang Kami', 'content' => 'Tentang Travel Kami'],
            ['slug' => 'about_content', 'title' => 'Konten Tentang Kami', 'content' => 'Semua Travel adalah penyedia layanan perjalanan yang berkomitmen memberikan pengalaman liburan yang aman, nyaman, dan berkesan. Kami siap membantu Anda menemukan destinasi impian, baik untuk perjalanan wisata, ziarah, liburan keluarga, maupun perjalanan bisnis.'],
            ['slug' => 'founder_name', 'title' => 'Nama Pendiri', 'content' => 'Fiddan'],
            ['slug' => 'founder_description', 'title' => 'Deskripsi Pendiri', 'content' => 'Pendiri kami percaya bahwa setiap perjalanan adalah cerita berharga. Dengan pengalaman dan dedikasi tinggi, ia membangun layanan travel yang ramah, profesional, dan selalu mengutamakan kepuasan pelanggan.'],
            ['slug' => 'values_title', 'title' => 'Judul Alasan Memilih Kami', 'content' => 'Alasan Memilih Kami'],
            ['slug' => 'value_0', 'title' => 'Nilai 1', 'content' => 'Nikmati kebebasan menjadwalkan perjalanan, pembatalan gratis, dan berbagai pilihan pembayaran sesuai kebutuhanmu.'],
            ['slug' => 'value_1', 'title' => 'Nilai 2', 'content' => 'Jelajahi destinasi dan aktivitas menarik yang akan meninggalkan kenangan indah di setiap langkah perjalananmu.'],
            ['slug' => 'value_2', 'title' => 'Nilai 3', 'content' => 'Kami selalu mengutamakan kenyamanan dan kepuasan pelanggan dengan standar pelayanan tinggi.'],
            ['slug' => 'value_3', 'title' => 'Nilai 4', 'content' => 'Kami selalu mengutamakan kenyamanan dan kepuasan pelanggan dengan standar pelayanan tinggi.'],
        ];

        foreach ($pages as $page) {
            Page::create($page);
        }
    }
}
