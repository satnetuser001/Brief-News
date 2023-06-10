<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserArticleLinkSeeder extends Seeder
{
    /**
     * creates the writers, articles, and links, and saves them in the database
     */
    public function run(): void
    {
        /*settings*/
        $writersCount = 10;
        $articleCount = 10;
        $delay = 1; //time between article creation (int.sec.)
        $wordsCount = 500; //in the article
        $linksCount = 5;

        /*writer*/
        for ($i=1; $i <= $writersCount; $i++) {            
            $objWriter = User::create([
                'name' => 'writerName_' . $i,
                'surname' => 'writerSurname_' . $i,
                'nickname' => 'writerNickname_' . $i,
                'role' => 'writer',
                'status' => 'active',
                'email' => 'writerEmail_' . $i . '@gmail.com',
                'password' => Hash::make('standart'),
            ]);

            /*article*/
            for ($j=1; $j <= $articleCount; $j++) {
                //article settings
                $rubric = rand(1, 6); //random select rubric
                $location = rand(1, 2); //random select location (world or local)

                //form body text
                $body = 'This is the test body of the article, then the random text is displayed: <br> ';
                for ($w=0; $w < $wordsCount; $w++) { 
                    $body .= Str::random(rand(5, 10)) . ' ';
                }

                $objArticle = $objWriter->articles()->create([
                    'header' => "This is test header, $objWriter->name, article N $j",
                    'body' => $body,
                    'policy' => $rubric == 1,
                    'economy' => $rubric == 2,
                    'science' => $rubric == 3,
                    'technologies' => $rubric == 4,
                    'sport' => $rubric == 5,
                    'other' => $rubric == 6,
                    'world' => $location == 1,
                    'local' => $location == 2,
                ]);

                //time delay after the creation of each article except the last one
                if ($i != $writersCount or $j != $articleCount) {
                    sleep($delay);
                }

                /*link*/
                for ($k=1; $k <= $linksCount; $k++) {                    
                    $objArticle->links()->create([
                        'link' => 'This_is_link_N_' . $k . '.com.ua',
                    ]);
                }
            }
        }
    }
}
