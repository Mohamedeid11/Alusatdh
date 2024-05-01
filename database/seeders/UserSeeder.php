<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate([
            'id'        => 1,
            'first_name'  => 'Admin',
            'email'     => 'admin@alustdh.com',
            'phone'     => '0123456789',
            'password'  => '123456789',
            'gender'  => 'male',
            'system' => 1
        ]);
    }
}
