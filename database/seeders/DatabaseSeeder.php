<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Outlet;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $permission1 = Permission::create(['name' => 'Menambahkan karyawan']);
        $permission2 = Permission::create(['name' => 'Menghapus karyawan']);
        
        $permission3 = Permission::create(['name' => 'Menambahkan pelanggan']);

        $permission4 = Permission::create(['name' => 'Menambahkan cucian']);
        $permission5 = Permission::create(['name' => 'Mengubah data cucian']);
        $permission6 = Permission::create(['name' => 'Mengubah status cucian']);

        $permission7 = Permission::create(['name' => 'Menambahkan Transaksi']);
        $permission8 = Permission::create(['name' => 'Mengubah status transaksi']);
        $permission9 = Permission::create(['name' => 'Melihat detail transaksi']);

        $permission10 = Permission::create(['name' => 'Membuat laporan']);
        $permission11 = Permission::create(['name' => 'Melihat laporan']);
        
        $permission12 = Permission::create(['name' => 'Mengubah role']);

        
        $role1 = Role::create(['name' => 'Owner']);
        $role1->givePermissionTo([$permission1, $permission2, $permission10, $permission11, $permission12]);
        
        $role2 = Role::create(['name' => 'Admin']);
        $role2->givePermissionTo([$permission3, $permission4, $permission5, $permission7, $permission9, $permission10, $permission11]);

        $role3 = Role::create(['name' => 'Kasir']);
        $role3->givePermissionTo([$permission3, $permission4, $permission5, $permission6, $permission7, $permission8, $permission9, $permission10, $permission11]);

        $o = Outlet::create([
            'nama' => 'Barrr',
            'telepon' => '089862659825'
        ]);

        \App\Models\User::create([
            'outlet_id' => $o->id,
            'name' => 'Barrr',
            'email' => 'barr@example.com',
            'telephone' => '089862659825',
            'password' => bcrypt(123123123),
        ])->assignRole($role1);

        \App\Models\User::factory(5000)->create()->each(function ($user) {
            $user->assignRole(3);
        });
        
    }
}
