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
        Permission::create(['name' => 'tambah-data-pj']);
        Permission::create(['name' => 'edit-data-pj']);
        Permission::create(['name' => 'hapus-data-pj']);
        Permission::create(['name' => 'lihat-data-pj']);
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
        Role::create(['name' => 'kader']);
        Role::create(['name' => 'pj']);

        // assign permissions to roles
        $roleAdmin = Role::findByName('admin');
        $roleKader = Role::findByName('kader');
        $rolePj = Role::findByName('pj');
        $roleAdmin->givePermissionTo(Permission::all());
        $roleKader->givePermissionTo([
            'tambah-data-pj',
            'edit-data-pj',
            'hapus-data-pj',
            'lihat-data-pj',
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
        $rolePj->givePermissionTo([
            'edit-data-pj',
            'lihat-data-pj',
            'lihat-data-lansia',
            'edit-data-lansia',
            'lihat-data-gizi',
            'lihat-jadwal-kegiatan',
        ]);
    }
}
