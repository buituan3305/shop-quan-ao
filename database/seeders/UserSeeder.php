<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     * Tạo tài khoản admin và user mẫu
     */
    public function run(): void
    {
        // Tạo tài khoản Admin
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Tạo tài khoản User thường
        User::create([
            'name' => 'Normal User',
            'email' => 'user@example.com',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        // Tạo thêm user từ hình ảnh
        User::create([
            'name' => 'Duong',
            'email' => 'duongqg@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);
    }
}
