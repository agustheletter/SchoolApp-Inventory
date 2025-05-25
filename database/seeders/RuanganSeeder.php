<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RuanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tbl_ruangan')->insert([
            [
                'koderuangan' => 'RPL-01',
                'namaruangan' => 'SE-Room',
                'jumlah'      => 1,
                'kapasitas'   => 20,
                'lokasi'      => 'Gedung RPL',
                'deskripsi'   => 'Ruangan untuk rapat pengurus RPL',
                'gambar'      => null,
                'status'      => 'tersedia',
                'idjurusan'   => 8,
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'koderuangan' => 'AULA-01',
                'namaruangan' => 'Aula Utama',
                'jumlah'      => 1,
                'kapasitas'   => 700,
                'lokasi'      => 'SMKN 1 Cimahi',
                'deskripsi'   => 'Digunakan untuk acara besar dan seminar',
                'gambar'      => null,
                'status'      => 'tersedia',
                'idjurusan'   => null,
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'koderuangan' => 'PERPUS-01',
                'namaruangan' => 'Perpustakaan',
                'jumlah'      => 1,
                'kapasitas'   => 50,
                'lokasi'      => 'Lantai 2 Gedung NA',
                'deskripsi'   => 'Tempat membaca dan meminjam buku',
                'gambar'      => null,
                'status'      => 'tersedia',
                'idjurusan'   => null,
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
        ]);
    }
}