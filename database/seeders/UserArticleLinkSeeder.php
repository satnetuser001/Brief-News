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
     * Run the database seeds.
     */
    public function run(): void
    {
        //creates the writer, articles, and links, and saves it in the database
        for ($i=1; $i <= 3; $i++) { 
            //writer
            $objWriter = User::create([
                'name' => 'writerName_' . $i,
                'surname' => 'writerSurname_' . $i,
                'nickname' => 'writerNickname_' . $i,
                'role' => 'writer',
                'status' => 'active',
                'email' => 'writerEmail_' . $i . '@gmail.com',
                'password' => Hash::make('standard'),
            ]);
            for ($j=1; $j <= 5; $j++) { 
                //article
                $rubric = rand(1, 6);
                $location = rand(1, 2);

                $objArticle = $objWriter->articles()->create([
                    'header' => "This is test header, $objWriter->name, article N $j",
                    'body' => 'This is the test body of the article,
                     then the random text is displayed: <br>' . Str::random(500),
                    'policy' => $rubric == 1,
                    'economy' => $rubric == 2,
                    'science' => $rubric == 3,
                    'technologies' => $rubric == 4,
                    'sport' => $rubric == 5,
                    'other' => $rubric == 6,
                    'world' => $location == 1,
                    'local' => $location == 2,
                ]);

                for ($k=1; $k <= 5; $k++) { 
                    //link
                    $objArticle->links()->create([
                        'link' => 'This_is_link_N_' . $k . '.com.ua',
                    ]);
                }
            }
        }
    }
}
