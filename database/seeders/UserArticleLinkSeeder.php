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
        $writersCount = 15;
        $articleCount = 10;
        $delay = 1; //time between article creation (int.sec.)
        $wordsCount = 500; //in the article
        $wordsInLine = 15;
        $linksCount = 5;

        /*writer*/
        for ($i=1; $i <= $writersCount; $i++) {            
            $objWriter = User::create([
                'name' => 'writerName' . $i,
                'surname' => 'writerSurname' . $i,
                'nickname' => 'writerNickname' . $i,
                'role' => 'writer',
                'status' => 'active',
                'rubrics_combination_id' => rand(1, 256),
                'email' => 'writer' . $i . '@gmail.com',
                'password' => Hash::make(1077),
            ]);

            /*article*/
            for ($j=1; $j <= $articleCount; $j++) {

                //form body text
                $body = "This is the test body of the article, then the random text is displayed:";
                for ($w=0; $w < $wordsCount; $w++) {
                    if ($w % $wordsInLine == 0) {
                        $body .="\n";
                    }
                    $body .= Str::random(rand(5, 10)) . " ";
                }

                $objArticle = $objWriter->articles()->create([
                    'header' => "This is test header, $objWriter->name, article N $j",
                    'body' => $body,
                    'rubrics_combination_id' => rand(1, 256),
                ]);

                /*link*/
                for ($k=1; $k <= $linksCount; $k++) {                    
                    $objArticle->links()->create([
                        'link' => 'https://This_is_link_N_' . $k . '.com.ua',
                    ]);
                }

                //time delay after the creation of each article except the last one
                if ($i != $writersCount or $j != $articleCount) {
                    sleep($delay);
                }
            }
        }
    }
}
