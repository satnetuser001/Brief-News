<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserAdminSeeder extends Seeder
{
    /**
     * Creates an admin user.
     */
    public function run(): void
    {
        User::create(['role' => 'admin',
                        'rubrics_combination_id' => 256,
                        'email' => 'admin_1@gmail.com',
                        'password' => Hash::make(1077),
        ]);
    }
}
