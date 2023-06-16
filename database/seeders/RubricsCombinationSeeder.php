<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\RubricsCombination;

class RubricsCombinationSeeder extends Seeder
{
    /**
     * Filling the table 'rubrics_cambinations' with all possible combinations.
     */
    public function run(): void
    {
        /*settings*/
        $columnsCount = 8;

        $dec = 0;
        while ($dec < pow( 2, $columnsCount)) {
            $binStr = sprintf("%0" . $columnsCount . "b",   $dec);
            $arr = str_split($binStr);
            RubricsCombination::create([
                'policy' => $arr[0],
                'economy' => $arr[1],
                'science' => $arr[2],
                'technologies' => $arr[3],
                'sport' => $arr[4],
                'other' => $arr[5],
                'world' => $arr[6],
                'local' => $arr[7],
            ]);
            $dec ++;
        }
    }
}
