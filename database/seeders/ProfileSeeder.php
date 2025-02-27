<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = \App\Models\User::all();
    
        foreach ($users as $user) {
            if (!$user->profile) {
                $user->profile()->create([
                    'full_name' => $user->name,
                ]);
            }
        }
    }
}
