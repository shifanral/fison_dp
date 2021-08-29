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
            'nama' => 'admin',
            'email' => 'admin@email.com',
            'alamat' => 'Jakarta',
            'no_hp' => '0812345678',
            'password' => bcrypt('12345678'),
            'role' => '1',
        ]);
        User::create([
            'nama' => 'Pelanggan',
            'email' => 'pelanggan@email.com',
            'alamat' => 'Bekasi',
            'no_hp' => '08987654321',
            'password' => bcrypt('12345678'),
            'role' => '2',
        ]);
    }
}