<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PekerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pekerja.pekerjas')->insert([
            'nama' => 'Vindra Arya Yulian',
            'jeniskelamin' => 'laki-laki',
            'alamat' => 'Grendeng',
            'tanggallahir' => '2006-07-25',
        ]);
    }
}
