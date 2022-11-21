<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PerusahaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pekerja.perusahaans')->insert([
            'nama' => 'Puskomedia',
            'email' => 'puskomedia@gmail.com',
            'logo' => 'pusko.jpg',
            'website' => 'puskomedia.id',
        ]);
    }
}
