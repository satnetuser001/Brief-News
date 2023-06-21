<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        /*calling seed classes*/
        $this->call([
            //filling the table 'rubrics_cambinations' with all possible combinations
            RubricsCombinationSeeder::class,

            //creates a root user
            UserRootSeeder::class,

            //creates an admin user
            UserAdminSeeder::class,

            //create test authors, articles, and links
            UserArticleLinkSeeder::class,
        ]);
    }
}
