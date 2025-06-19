<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Nguyễn Đăng Hiếu',
                'email' => '23010049@st.phenikaa-uni.edu.vn',
                'email_verified_at' => '2025-06-19 06:31:30',
                'password' => Hash::make('123456'),
                'remember_token' => null,
                'created_at' => '2025-06-19 06:30:42',
                'updated_at' => '2025-06-19 06:31:30',
                'role' => 'user',
                'phone' => null,
                'address' => null,
                'dob' => null,
                'profile_completed' => false,
            ],
            [
                'name' => 'Admin',
                'email' => 'hieuk290605@gmail.com',
                'email_verified_at' => '2025-06-19 06:32:28',
                'password' => Hash::make('123456'),
                'remember_token' => null,
                'created_at' => '2025-06-19 06:31:45',
                'updated_at' => '2025-06-19 06:32:28',
                'role' => 'admin',
                'phone' => null,
                'address' => null,
                'dob' => null,
                'profile_completed' => false,
            ]
        ]);
    }
}
