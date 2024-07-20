<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResepSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reseps')->insert([
            'nama' => 'Gilang',
            'kategori' => 'Sehat',
            'deskripsi' => 'lorem ipsum',
            'gambar' => 'empal.png',
        ]);
    }
}
