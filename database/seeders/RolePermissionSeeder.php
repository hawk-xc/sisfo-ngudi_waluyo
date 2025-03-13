<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// use Spatie\Permission\Contracts\Permission;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // permission data-kader
        Permission::create(['name' => 'tambah-data-kader']);
        Permission::create(['name' => 'edit-data-kader']);
        Permission::create(['name' => 'hapus-data-kader']);
        Permission::create(['name' => 'lihat-data-kader']);
        // permission data-lansia
        Permission::create(['name' => 'tambah-data-lansia']);
        Permission::create(['name' => 'edit-data-lansia']);
        Permission::create(['name' => 'hapus-data-lansia']);
        Permission::create(['name' => 'lihat-data-lansia']);
        // permission data-gizi
        Permission::create(['name' => 'tambah-data-gizi']);
        Permission::create(['name' => 'edit-data-gizi']);
        Permission::create(['name' => 'hapus-data-gizi']);
        Permission::create(['name' => 'lihat-data-gizi']);
        // permission jadwal_kegiatan
        Permission::create(['name' => 'tambah-jadwal-kegiatan']);
        Permission::create(['name' => 'edit-jadwal-kegiatan']);
        Permission::create(['name' => 'hapus-jadwal-kegiatan']);
        Permission::create(['name' => 'lihat-jadwal-kegiatan']);


        // role admin
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'nakes']);
        Role::create(['name' => 'kader']);

        // assign permissions to roles
        $roleAdmin = Role::findByName('admin');
        $roleNakes = Role::findByName('nakes');
        $roleKader = Role::findByName('kader');
        $roleAdmin->givePermissionTo(Permission::all());
        $roleNakes->givePermissionTo([
            'tambah-data-lansia',
            'edit-data-lansia',
            'hapus-data-lansia',
            'lihat-data-lansia',
            'tambah-data-gizi',
            'edit-data-gizi',
            'hapus-data-gizi',
            'lihat-data-gizi',
            'tambah-jadwal-kegiatan',
            'edit-jadwal-kegiatan',
            'hapus-jadwal-kegiatan',
            'lihat-jadwal-kegiatan',

        ]);
        $roleKader->givePermissionTo([
            'edit-data-kader',
            'lihat-data-kader',
            'lihat-data-lansia',
            'edit-data-lansia',
            'lihat-data-gizi',
            'edit-data-gizi',
            'lihat-jadwal-kegiatan',
            'edit-jadwal-kegiatan',
        ]);
    }
}
