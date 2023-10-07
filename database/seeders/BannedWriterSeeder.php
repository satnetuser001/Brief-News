<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class BannedWriterSeeder extends Seeder
{
    /**
     * Create a banned writer.
     */
    public function run(): void
    {
        User::create(['name' => 'bannedWriterName1',
                        'surname' => 'bannedWriterSurname1',
                        'nickname' => 'bannedWriterNickname1',
                        'role' => 'writer',
                        'status' => 'ban',
                        'rubrics_combination_id' => 256,
                        'email' => 'bannedWriter1@gmail.com',
                        'password' => Hash::make(1077),
        ]);
    }
}
