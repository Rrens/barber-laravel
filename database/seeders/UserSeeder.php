<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name' => 'Admin Barbershop',
            'username' => 'Admin Barber',
            'role' => 'admin',
            'email' => 'admin@babershop.com',
            'password' => Hash::make('halloadmin123')
        ]);
    }
}
// admin@babershop.com::halloadmin123
// customer@gmail.com::customer123
// customerpentest@gmail.com::pentest123
