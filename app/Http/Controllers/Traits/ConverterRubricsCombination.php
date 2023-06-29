<?php
namespace App\Http\Controllers\Traits;

trait ConverterRubricsCombination{

	/**
     * Rubrics Combination for a 'Panel for sorting articles by category and locale'
     *
     * @param array
     * @return array
     */
    protected function converterRubricsCombination(array $rubricsCombination){
        //default value
        $convertedRubricsCombination = [
            'all' => 1,
            'policy' => 0,
            'economy' => 0,
            'science' => 0,
            'technologies' => 0,
            'sport' => 0,
            'other' => 0,
            'world' => 0,
            'local' => 0,
        ];

        //return without conversion
        //user selected 'all'
        if (array_key_exists('pressed', $rubricsCombination) and $rubricsCombination['pressed'] == 'all') {
            return $convertedRubricsCombination;
        }

        //user selected one rubric instead of all
        if (
            array_key_exists('pressed', $rubricsCombination) and
            $rubricsCombination['pressed'] != 'world' and
            $rubricsCombination['pressed'] != 'local' and
            $rubricsCombination['all'] == 1
        ) {
            $convertedRubricsCombination['all'] = 0;
            $convertedRubricsCombination[$rubricsCombination['pressed']] = 1;
            $convertedRubricsCombination['world'] = 1;
            $convertedRubricsCombination['local'] = 1;
            return $convertedRubricsCombination;
        }

        //user selected one locale instead of all
        if (
            array_key_exists('pressed', $rubricsCombination) and
            $rubricsCombination['all'] == 1 and
            (
                $rubricsCombination['pressed'] == 'world' or
                $rubricsCombination['pressed'] == 'local'
            )            
        ) {
            $convertedRubricsCombination['all'] = 0;
            $convertedRubricsCombination['policy'] = 1;
            $convertedRubricsCombination['economy'] = 1;
            $convertedRubricsCombination['science'] = 1;
            $convertedRubricsCombination['technologies'] = 1;
            $convertedRubricsCombination['sport'] = 1;
            $convertedRubricsCombination['other'] = 1;
            $convertedRubricsCombination[$rubricsCombination['pressed']] = 1;
            return $convertedRubricsCombination;
        }

        //writing incoming data in convertedRubricsCombination
        if (array_key_exists('all', $rubricsCombination)) {
            $convertedRubricsCombination['all'] = $rubricsCombination['all'];
        }
        $convertedRubricsCombination['policy'] = $rubricsCombination['policy'];
        $convertedRubricsCombination['economy'] = $rubricsCombination['economy'];
        $convertedRubricsCombination['science'] = $rubricsCombination['science'];
        $convertedRubricsCombination['technologies'] = $rubricsCombination['technologies'];
        $convertedRubricsCombination['sport'] = $rubricsCombination['sport'];
        $convertedRubricsCombination['other'] = $rubricsCombination['other'];
        $convertedRubricsCombination['world'] = $rubricsCombination['world'];
        $convertedRubricsCombination['local'] = $rubricsCombination['local'];

        //click handling
        if (array_key_exists('pressed', $rubricsCombination)) {
            if ($convertedRubricsCombination[$rubricsCombination['pressed']] == 0) {
                $convertedRubricsCombination[$rubricsCombination['pressed']] = 1;
            } else {
                $convertedRubricsCombination[$rubricsCombination['pressed']] = 0;
            }
        }            

        //conversion
        //all rubric buttons disabled
        if (
            $convertedRubricsCombination['all'] == 0 and
            $convertedRubricsCombination['policy'] == 0 and
            $convertedRubricsCombination['economy'] == 0 and
            $convertedRubricsCombination['science'] == 0 and
            $convertedRubricsCombination['technologies'] == 0 and
            $convertedRubricsCombination['sport'] == 0 and
            $convertedRubricsCombination['other'] == 0
        ) {
            $convertedRubricsCombination['all'] = 1;
            $convertedRubricsCombination['world'] = 0;
            $convertedRubricsCombination['local'] = 0;
        }

        //last locale buttons disabled
        if (
            $convertedRubricsCombination['world'] == 0 and
            $convertedRubricsCombination['local'] == 0 and
            array_key_exists('pressed', $rubricsCombination) and
            $rubricsCombination['pressed'] == 'world'
        ) {
            $convertedRubricsCombination['local'] = 1;
        }
        if (
            $convertedRubricsCombination['world'] == 0 and
            $convertedRubricsCombination['local'] == 0 and
            array_key_exists('pressed', $rubricsCombination) and
            $rubricsCombination['pressed'] == 'local'
        ) {
            $convertedRubricsCombination['world'] = 1;
        }

        
        

        //all buttons enable
        if (
            $convertedRubricsCombination['policy'] == 1 and
            $convertedRubricsCombination['economy'] == 1 and
            $convertedRubricsCombination['science'] == 1 and
            $convertedRubricsCombination['technologies'] == 1 and
            $convertedRubricsCombination['sport'] == 1 and
            $convertedRubricsCombination['other'] == 1 and
            $convertedRubricsCombination['world'] == 1 and
            $convertedRubricsCombination['local'] == 1
        ) {
            $convertedRubricsCombination['all'] = 1;
            $convertedRubricsCombination['policy'] = 0;
            $convertedRubricsCombination['economy'] = 0;
            $convertedRubricsCombination['science'] = 0;
            $convertedRubricsCombination['technologies'] = 0;
            $convertedRubricsCombination['sport'] = 0;
            $convertedRubricsCombination['other'] = 0;
            $convertedRubricsCombination['world'] = 0;
            $convertedRubricsCombination['local'] = 0;
        }

        return $convertedRubricsCombination;
    }
}
?>