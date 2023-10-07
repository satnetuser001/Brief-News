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

            //creates a test admin user
            UserAdminSeeder::class,

            //create a test deleted authors, articles, and links
            DeletedUserArticleLinkSeeder::class,

            //create a test authors, deleted articles, and links
            UserDeletedArticleLinkSeeder::class,

            //create a test deleted authors, deleted articles, and links
            DeletedUserDeletedArticleLinksSeeder::class,

            //create a test banned author
            BannedWriterSeeder::class,

            //create a test authors, articles and links
            UserArticleLinkSeeder::class,

            //create a test reader user
            UserReaderSeeder::class,

            //create an instruction article for a web application
            InstructionArticleSeeder::class,
        ]);
    }
}
