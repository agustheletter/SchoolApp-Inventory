<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgramKeahlianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tbl_programkeahlian')->insert([
            [
                'idprogramkeahlian' => 1,
                'kodeprogramkeahlian' => 'TE',
                'namaprogramkeahlian' => 'Teknik Elektronika',
            ],
            [
                'idprogramkeahlian' => 2,
                'kodeprogramkeahlian' => 'TK',
                'namaprogramkeahlian' => 'Teknik Ketenagalistrikan',
            ],
            [
                'idprogramkeahlian' => 3,
                'kodeprogramkeahlian' => 'PPLG',
                'namaprogramkeahlian' => 'Pengembangan Perangkat Lunak dan Gim',
            ],
            [
                'idprogramkeahlian' => 4,
                'kodeprogramkeahlian' => 'BP',
                'namaprogramkeahlian' => 'Broadcasting dan Perfilman',
            ],    
        ]);
    }
}
