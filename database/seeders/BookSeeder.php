<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Tambahkan data dummy
        // Tambahkan data dummy
        DB::table('books')->insert([
            [
                'judul' => 'Pemrograman Web dengan Laravel',
                'penulis' => 'Ahmad Fauzan',
                'deskripsi' => 'Panduan lengkap untuk pemrograman web dengan framework Laravel.',
                'tahun' => 2021,
                'kategori' => 'Pemrograman',
                'image' => 'laravel-web.jpg',
            ],
            [
                'judul' => 'Matematika Diskrit',
                'penulis' => 'Budi Santoso',
                'deskripsi' => 'Buku panduan dasar matematika diskrit untuk pemula.',
                'tahun' => 2020,
                'kategori' => 'Matematika',
                'image' => 'matematika-diskrit.jpg',
            ],
            [
                'judul' => 'Fisika Kuantum',
                'penulis' => 'Albert Einstein',
                'deskripsi' => 'Pengenalan fisika kuantum dan teorinya.',
                'tahun' => 2019,
                'kategori' => 'Fisika',
                'image' => 'fisika-kuantum.jpg',
            ],
            [
                'judul' => 'Kimia Organik',
                'penulis' => 'Marie Curie',
                'deskripsi' => 'Buku panduan dasar untuk kimia organik.',
                'tahun' => 2022,
                'kategori' => 'Kimia',
                'image' => 'kimia-organik.jpg',
            ],
            [
                'judul' => 'Bahasa Indonesia untuk Pemula',
                'penulis' => 'Siti Nurhaliza',
                'deskripsi' => 'Panduan menulis dan berbahasa Indonesia dengan baik dan benar.',
                'tahun' => 2023,
                'kategori' => 'Bahasa',
                'image' => 'bahasa-indonesia.jpg',
            ],
        ]);
    }
}
