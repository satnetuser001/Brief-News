<?php
namespace App\Http\Controllers\Traits;

use App\Models\Article;

trait ArticleSelector{

	/**
     * Selects articles from the database under the selected rubrics.
     * 
     * The method generates a query to the database of the form:
     * 
     * simplified:
     * SELECT * FROM rubrics_combinations WHERE (policy = 1 OR economy = 1) AND (world = 1 OR local = 1);
     * 
     * real:
     * select * from `articles` where exists (select * from `rubrics_combinations` where 
     * `articles`.`rubrics_combination_id` = `rubrics_combinations`.`id` and `policy` = 1) and exists (select * from 
     * `rubrics_combinations` where `articles`.`rubrics_combination_id` = `rubrics_combinations`.`id`) order by 
     * `created_at` desc
     *
     * @param array
     * @return object
     */
    protected function articleSelector($objsArticles, array $rubricsCombination)
    {
        return $objsArticles->
                    //WHERE (policy = 1 OR economy = 1)
                    whereHas(
                        'rubricsCombination',
                        function($query) use ($rubricsCombination) {
                            $firstRubricWhere = 0;
                            foreach ($rubricsCombination as $rubric => $value) {
                                if (
                                    $firstRubricWhere == 0 and
                                    $rubric != 'all' and
                                    $rubric != 'world' and
                                    $rubric != 'local' and
                                    $value == 1
                                ) {
                                    $firstRubricWhere = 1;
                                    $query->where($rubric, 1);
                                }
                                elseif (
                                    $firstRubricWhere == 1 and
                                    $rubric != 'all' and
                                    $rubric != 'world' and
                                    $rubric != 'local' and
                                    $value == 1
                                ) {
                                    $query->orWhere($rubric, 1);
                                }
                            }
                        }
                    )->
                    //AND (world = 1 OR local = 1)
                    whereHas(
                        'rubricsCombination',
                        function($query) use ($rubricsCombination){
                            if (
                                $rubricsCombination['world'] == 1 and
                                $rubricsCombination['local'] == 0
                            ) {
                                $query->where('world', 1);
                            }
                            elseif (
                                $rubricsCombination['world'] == 0 and
                                $rubricsCombination['local'] == 1
                            ) {
                                $query->where('local', 1);
                            }
                            elseif (
                                $rubricsCombination['world'] == 1 and
                                $rubricsCombination['local'] == 1
                            ) {
                                $query->where('world', 1)->orWhere('local', 1);
                            }
                        }
                    )
                ;
    }
}
?>