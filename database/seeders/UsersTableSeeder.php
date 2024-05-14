<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'User One',
            'email' => 'admin@gmail.com',
            'gender' => 'male',
            'age' => 25,
            'birth' => '1999-01-01',
            'alamat' => 'Jl. Contoh Alamat No. 1',
            'role' => 'user',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Superadmin One',
            'email' => 'superadmin@example.com',
            'gender' => 'female',
            'age' => 30,
            'birth' => '1994-02-02',
            'alamat' => 'Jl. Contoh Alamat No. 2',
            'role' => 'superadmin',
            'password' => Hash::make('password'),
        ]);

        // Tambahkan lebih banyak pengguna jika diperlukan
    }
}
