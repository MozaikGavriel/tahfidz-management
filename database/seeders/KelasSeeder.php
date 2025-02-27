<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('kelas')->insert([
            ['nama_kelas' => 'IPA 1', 'kelas' => '10', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kelas' => 'IPS 1', 'kelas' => '11', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
    
}
