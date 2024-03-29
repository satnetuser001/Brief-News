<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRootSeeder extends Seeder
{
    /**
     * Creates a root user.
     */
    public function run(): void
    {
        User::create(['name' => 'rootName',
                        'surname' => 'rootSurname',
                        'nickname' => 'rootNickname',
                        'role' => 'root',
                        'rubrics_combination_id' => 256,
                        'email' => 'root@gmail.com',
                        'password' => Hash::make(1077),
        ]);
    }
}
