<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tbl_barang')->insert([
            [
                'kodebarang' => 'BRG001',
                'namabarang' => 'Laptop Lenovo',
                'stok' => 10,
                'tahunpengajuan' => 2023,
                'harga' => 8500000.00,
                'merk' => 'Lenovo',
                'jenisbarang' => 'Elektronik',
                'deskripsi' => 'Laptop Lenovo Core i5 untuk keperluan kerja dan sekolah',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kodebarang' => 'BRG002',
                'namabarang' => 'Proyektor Epson',
                'stok' => 5,
                'tahunpengajuan' => 2022,
                'harga' => 5500000.00,
                'merk' => 'Epson',
                'jenisbarang' => 'Elektronik',
                'deskripsi' => 'Proyektor Epson berkualitas tinggi untuk presentasi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kodebarang' => 'BRG003',
                'namabarang' => 'Meja Kayu',
                'stok' => 20,
                'tahunpengajuan' => 2024,
                'harga' => 1200000.00,
                'merk' => 'Toko Jati',
                'jenisbarang' => 'Furniture',
                'deskripsi' => 'Meja kayu jati berkualitas tinggi untuk kantor',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}