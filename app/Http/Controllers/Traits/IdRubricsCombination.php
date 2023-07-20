<?php
namespace App\Http\Controllers\Traits;

use App\Models\RubricsCombination;

trait IdRubricsCombination{

	/**
     * Defines the ID of Rubrics Combination
     *
     * @param array
     * @return int
     */
    protected function idRubricsCombination(array $rubrics, array $locales):int
    {   
        //default value
        $arrRubricsCombination = ['policy' => 0,
                                    'economy' => 0,
                                    'science' => 0,
                                    'technologies' => 0,
                                    'sport' => 0,
                                    'other' => 0,
                                    'world' => 0,
                                    'local' => 0,
                                ];

        //writing incoming data in arrRubricsCombination
        foreach ($rubrics as $rubric => $value) {
            $arrRubricsCombination[$rubric] = $value;
        }

        foreach ($locales as $locale => $value) {
            $arrRubricsCombination[$locale] = $value;
        }

        //define id
        $objRubricsCombination = RubricsCombination::where('policy', $arrRubricsCombination['policy'])->
                                                        where('economy', $arrRubricsCombination['economy'])->
                                                        where('science', $arrRubricsCombination['science'])->
                                                        where('technologies', $arrRubricsCombination['technologies'])->
                                                        where('sport', $arrRubricsCombination['sport'])->
                                                        where('other', $arrRubricsCombination['other'])->
                                                        where('world', $arrRubricsCombination['world'])->
                                                        where('local', $arrRubricsCombination['local'])->
                                                        get();

        return $objRubricsCombination[0]->id;
    }
}
?>