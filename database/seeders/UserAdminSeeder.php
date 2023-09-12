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
        User::create(['name' => 'adminName1',
                        'surname' => 'adminSurname1',
                        'nickname' => 'adminNickname1',
                        'role' => 'admin',
                        'rubrics_combination_id' => 256,
                        'email' => 'admin1@gmail.com',
                        'password' => Hash::make(1077),
        ]);
    }
}
