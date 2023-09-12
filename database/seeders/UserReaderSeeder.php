<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserReaderSeeder extends Seeder
{
    /**
     * Creates an reader user.
     */
    public function run(): void
    {
        User::create(['name' => 'readerName1',
                        'surname' => 'readerSurname1',
                        'nickname' => 'readerNickname1',
                        'role' => 'reader',
                        'rubrics_combination_id' => 256,
                        'email' => 'reader1@gmail.com',
                        'password' => Hash::make(1077),
        ]);
    }
}
