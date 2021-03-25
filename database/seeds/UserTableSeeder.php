<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@email.com',
            'address' => 'Jakarta',
            'phone' => '0812345678',
            'password' => bcrypt('12345678'),
            'role' => '1',
        ]);
        User::create([
            'name' => 'Pelanggan',
            'email' => 'pelanggan@email.com',
            'address' => 'Bekasi',
            'phone' => '08987654321',
            'password' => bcrypt('12345678'),
            'role' => '2',
        ]);
    }
}