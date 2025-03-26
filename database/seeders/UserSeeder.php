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
            'name' => 'admin1',
            'email' => 'admin1@gmail.com',
            'password' => bcrypt('password'),
            'role_id' => 1,
        ]);
        $admin->assignRole('admin');

        $pj = User::create([
            'name' => 'PJ (Penanggung Jawab)',
            'email' => 'pj@gmail.com',
            'role_id' => 3,
            'password' => bcrypt('password'),
        ]);
        $pj2 = User::create([
            'name' => 'warsinoSlank',
            'role_id' => 3,
            'email' => 'warsinoSlank@gmail.com',
            'password' => bcrypt('password'),
        ]);
        $pj3 = User::create([
            'name' => 'beni',
            'email' => 'beni@gmail.com',
            'role_id' => 3,
            'password' => bcrypt('password'),
        ]);
        $pj2->assignRole('pj');
        $pj3->assignRole('pj');
        $pj->assignRole('pj');

        $kader = User::create([
            'name' => 'Kader',
            'email' => 'kader@gmail.com',
            'role_id' => 2,
            'password' => bcrypt('password'),
        ]);
        $kader->assignRole('kader');

        $wahyu = User::create([
            'name' => 'wahyu',
            'email' => 'wahyu@gmail.com',
            'role_id' => 2,
            'password' => bcrypt('password')
        ]);

        $wahyu->assignRole('kader');
    }
}
