<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SiswaSeeder extends Seeder
{
    public function run()
    {
        DB::table('tbl_siswa')->insert([
            [
                'nis' => 'SL001',
                'nisn' => 'LS001',
                'namasiswa' => 'Evan',
                'tempatlahir' => 'Bandung',
                'tgllahir' => '2008-08-07',
                'jk' => 'L',
                'alamat' => 'jl.bbc',
                'idagama' => '1',
                'tlprumah' => '000000000',
                'hpsiswa' => '0909090909090',
                'photosiswa' => '-',
                'idthnmasuk' => '3',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null
            ],
            [
                'nis' => 'SL002',
                'nisn' => 'LS002',
                'namasiswa' => 'Alya',
                'tempatlahir' => 'Jakarta',
                'tgllahir' => '2009-05-15',
                'jk' => 'P',
                'alamat' => 'jl.merdeka',
                'idagama' => '2',
                'tlprumah' => '08123456789',
                'hpsiswa' => '081298765432',
                'photosiswa' => '-',
                'idthnmasuk' => '3',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null
            ]
        ]);
    }
}
