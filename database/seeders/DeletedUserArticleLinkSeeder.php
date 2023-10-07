<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DeletedUserArticleLinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*settings*/
        $writersCount = 50;
        $articleCount = 5;
        $delay = 1; //time between article creation (int.sec.)
        $wordsCount = 500; //in the article
        $wordsInLine = 15;
        $linksCount = 5;

        /*writer*/
        for ($i=1; $i <= $writersCount; $i++) {            
            $objWriter = User::create([
                'name' => 'deleted-Writer-Name' . $i,
                'surname' => 'deleted-Writer-Surname' . $i,
                'nickname' => 'deleted-Writer-Nickname' . $i,
                'role' => 'writer',
                'status' => 'active',
                'rubrics_combination_id' => rand(1, 256),
                'email' => 'deleted-Writer-' . $i . '@gmail.com',
                'password' => Hash::make(1077),
                'deleted_at' => date("Y-m-d H:i:s"),
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
                    'header' => "This is test header, author $objWriter->name, article N $j",
                    'body' => $body,
                    'rubrics_combination_id' => rand(1, 256),
                ]);

                /*link*/
                for ($k=1; $k <= $linksCount; $k++) {                    
                    $objArticle->links()->create([
                        'link' => 'https://this_is_link_N_' . $k . '.com.ua',
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
