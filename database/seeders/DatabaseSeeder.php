<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Outlet;
use Illuminate\Database\Seeder;

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
        $o = Outlet::create([
            'nama' => 'Barrr',
            'telepon' => '089862659825'
        ]);

        \App\Models\User::factory()->create([
            'outlet_id' => $o->id,
            'name' => 'Barrr',
            'email' => 'barr@example.com',
            'telephone' => '089862659825',
            'password' => bcrypt(123123123),
        ]);
    }
}
