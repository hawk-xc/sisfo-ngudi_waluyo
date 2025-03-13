<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // \App\Models\User::factory()
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),

        ]);
        $admin->assignRole('admin');

        $nakes = User::create([
            'name' => 'Nakes',
            'email' => 'nakes@gmail.com',
            'password' => bcrypt('password'),
        ]);
        $nakes->assignRole('nakes');

        $kader = User::create([
            'name' => 'Kader',
            'email' => 'kader@gmail.com',
            'password' => bcrypt('password'),
        ]);
        $nakes->assignRole('kader');
    }
}
