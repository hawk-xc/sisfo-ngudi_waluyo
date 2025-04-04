<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LansiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lansias = [
            [
                'user_id' => 1,
                'nik' => '3276010101010001',
                'nama' => 'Budi Santoso',
                'umur' => 70,
                'jenis_kelamin' => 'Laki-laki',
                'alamat' => 'Jl. Merdeka No. 10',
                "pj_nama" => 'warsinoSlank',
                "pj_email" => 'warsino@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'nik' => '3276010101010002',
                'nama' => 'Siti Aminah',
                'umur' => 68,
                'jenis_kelamin' => 'Perempuan',
                'alamat' => 'Jl. Ahmad Yani No. 22',
                "pj_nama" => 'warsinoSlank',
                "pj_email" => 'warsino@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'nik' => '3276010101010003',
                'nama' => 'Suparman',
                'umur' => 75,
                'jenis_kelamin' => 'Laki-laki',
                'alamat' => 'Jl. Diponegoro No. 5',
                "pj_nama" => 'beni',
                "pj_email" => 'beni@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        DB::table('lansias')->insert($lansias);
    }
}
