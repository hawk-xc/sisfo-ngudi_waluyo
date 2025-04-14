<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Services\PasswordService;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $password = Str::random(rand(1, 9));

        // \App\Models\User::factory()
        $admin = User::create([
            'name' => 'admin1',
            'email' => 'admin1@gmail.com',
            'password' => bcrypt('password'),
            'raw_password' => PasswordService::encrypt('password'),
            'role_id' => 1,
        ]);
        $admin->assignRole('admin');

        $pj = User::create([
            'name' => 'PJ (Penanggung Jawab)',
            'nik' => '1234567890123456',
            'phone' => '081234567890',
            'address' => 'Jl. Contoh Alamat No. 123',
            'born_date' => '1990-01-01',
            'gender' => 'L',
            'born_place' => 'Jakarta',
            'email' => 'pj@gmail.com',
            'role_id' => 3,
            'raw_password' => PasswordService::encrypt('password'),
            'password' => bcrypt('password'),
        ]);
        // $pj2 = User::create([
        //     'name' => 'warsinoSlank',
        //     'role_id' => 3,
        //     'email' => 'warsinoSlank@gmail.com',
        //     'raw_password' => PasswordService::encrypt($password),
        //     'password' => bcrypt('password'),
        // ]);
        // $pj3 = User::create([
        //     'name' => 'beni',
        //     'email' => 'beni@gmail.com',
        //     'role_id' => 3,
        //     'raw_password' => PasswordService::encrypt($password),
        //     'password' => bcrypt('password'),
        // ]);
        $pj->assignRole('pj');
        // $pj2->assignRole('pj');
        // $pj3->assignRole('pj');

        $kader = User::create([
            'name' => 'Kader',
            'nik' => '1234567890123457',
            'phone' => '081234567891',
            'address' => 'Jl. Contoh Alamat No. 124',
            'born_date' => '1990-01-01',
            'gender' => 'L',
            'born_place' => 'Jakarta',
            'relationship_name' => 'Keluarga',
            'email' => 'kader@gmail.com',
            'role_id' => 2,
            'raw_password' => PasswordService::encrypt('password'),
            'password' => bcrypt('password'),
        ]);
        $kader->assignRole('kader');

        $wahyu = User::create([
            'name' => 'Wahyu',
            'nik' => '1234567890123458',
            'phone' => '081234567892',
            'address' => 'Jl. Contoh Alamat No. 125',
            'born_date' => '1991-02-02',
            'gender' => 'L',
            'born_place' => 'Bandung',
            'relationship_name' => 'Teman',
            'email' => 'wahyu@gmail.com',
            'role_id' => 2,
            'raw_password' => PasswordService::encrypt('password'),
            'password' => bcrypt('password'),
        ]);
        $wahyu->assignRole('kader');
    }
}
