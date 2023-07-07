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
    protected function idRubricsCombination(array $rubricsCombination):int
    {
        $objRubricsCombination = RubricsCombination::where('policy', $rubricsCombination['policy'])->
                                                        where('economy', $rubricsCombination['economy'])->
                                                        where('science', $rubricsCombination['science'])->
                                                        where('technologies', $rubricsCombination['technologies'])->
                                                        where('sport', $rubricsCombination['sport'])->
                                                        where('other', $rubricsCombination['other'])->
                                                        where('world', $rubricsCombination['world'])->
                                                        where('local', $rubricsCombination['local'])->
                                                        get();
        return $objRubricsCombination[0]->id;
    }
}
?>