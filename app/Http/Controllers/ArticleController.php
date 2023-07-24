<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\RubricsCombination;
use App\Models\Article;
use App\Models\SourceLink;
use App\Http\Controllers\Traits\ConverterRubricsCombination;
use App\Http\Controllers\Traits\ArticleSelector;
use App\Http\Controllers\Traits\IdRubricsCombination;

/**
 * This controller is responsible for pages:
 * 
 */
class ArticleController extends Controller
{
    use ArticleSelector, ConverterRubricsCombination, IdRubricsCombination;

    /**
     * Controller settings
     */
    protected $articlesPerPage = 15;
    protected $debuggingStatus = false;

    /**
     * Validation rules and messages
     * now this is an example
     */

    private const VALIDATOR_RULS = ['arrRubricsCombination' => "required_without_all:arrRubricsCombination.*",
                                    'arrLocaleCombination' => "required_without_all:arrLocaleCombination.*",
                                    'header' => 'required|max:65535',
                                    'body' => 'required|max:16777215',
                                    //links are not validated,
                                    ];

    private const VALIDATOR_MESSAGES = ['arrRubricsCombination' => 'Выберете хотябы одну рубрику',
                                        'arrLocaleCombination' => 'Выберете хотябы одну локаль',
                                        'header.required' => 'Заголовок не должно быть пустым',
                                        'header.max' => 'Заголовок не должен содержать больше 65 535 символов',
                                        'body.required' => 'Статья не должна быть пустой',
                                        'body.max' => 'Статья не должен содержать больше 16 777 215 символов',
                                        ];

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show all articles of the user
     */
    public function userArticles(Request $request)
    {
        
        $context = [
            /*because home.blade.php is used in Home and MyArticle Pages,
            sent out 'route' setting for links*/
            'route' => 'articles.userArticles',
            'rubricsCombination' => [],
            'articles' => [],
            'debugging' => [],
        ];

        //repeated request
        if ($request->input() != NULL) {
            
            //Rubrics and locale panel
            $arrRubricsCombination = $this->converterRubricsCombination($request->input());
            $context['rubricsCombination'] = $arrRubricsCombination;

            //news
            if ($arrRubricsCombination['all'] == 1) {
                $objsArticles = Auth::user()->
                                    articles()->
                                    latest()->
                                    paginate($this->articlesPerPage)->
                                    appends($arrRubricsCombination);
                $context['articles'] = $objsArticles;
            } else {
                $objsArticles = Auth::user()->articles();
                $objsArticles = $this->articleSelector($objsArticles, $arrRubricsCombination)->
                                        latest()->
                                        paginate($this->articlesPerPage)->
                                        appends($arrRubricsCombination);
                $context['articles'] = $objsArticles;
            }

            //debugging
            if ($this->debuggingStatus) {
                $context['debugging'] += ['in if' => 'my articles, repeated request'];
                $context['debugging'] += ['pressed' => $request->input()['pressed']];
            }
        }

        //first request
        else{

            //Rubrics and locale panel
            $arrRubricsCombination = $this->converterRubricsCombination(
                                        RubricsCombination::find(1)->toArray()
                                    );
            $context['rubricsCombination'] = $arrRubricsCombination;

            //news
            $objsArticles = Auth::user()->
                                articles()->
                                latest()->
                                paginate($this->articlesPerPage)->
                                appends($arrRubricsCombination);
            $context['articles'] = $objsArticles;

            //debugging
            if ($this->debuggingStatus) {
                $context['debugging'] += ['in if' => 'my articles, first request'];
            }
        }
        return view('home', ['context' => $context]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //article validation
        $validated = $request->validate(self::VALIDATOR_RULS, self::VALIDATOR_MESSAGES);
        
        //define article rubrics combination id
        $idRubricsCombination = $this->idRubricsCombination(
                                            $validated['arrRubricsCombination'],
                                            $validated['arrLocaleCombination'],
                                );
        
        //save article
        $objArticle = Auth::user()->
                            articles()->
                            create(['rubrics_combination_id' => $idRubricsCombination,
                                    'header' => $validated['header'],
                                    'body' => $validated['body'],
                                    ]);

        //save article links
        if ($request->has('links')) {
            foreach ($request['links'] as $value) {
                if ($value != NULL) {
                    $objArticle->links()->create(['link' => $value]);
                }
            }
        }
        
        return redirect()->route('articles.userArticles');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {   
        return view('articles.edit', ['context' => $article]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {   
        //edited data validation
        $validated = $request->validate(self::VALIDATOR_RULS, self::VALIDATOR_MESSAGES);
        
        //define edited article rubrics combination id
        $idRubricsCombination = $this->idRubricsCombination(
                                            $validated['arrRubricsCombination'],
                                            $validated['arrLocaleCombination'],
                                );

        //save edited article
        $article->fill(['rubrics_combination_id' => $idRubricsCombination,
                        'header' => $validated['header'],
                        'body' => $validated['body'],
                        ]);
        $article->save();

        //save added article links
        if ($request->has('links')) {
            foreach ($request['links'] as $value) {
                if ($value != NULL) {
                    $article->links()->create(['link' => $value]);
                }
            }
        }

        //delete selected article links
        if ($request->has('arrDeletedLinks')) {
            foreach ($request['arrDeletedLinks'] as $id => $value) {
                SourceLink::find($id)->delete();
            }
        }

        return redirect()->route('articles.userArticles');
    }

    /**
     * Soft delete link to the source from DB.
     */
    public function deleteSourceLink(SourceLink $sourceLink)
    {
        $sourceLink->delete();
        return redirect()->route('articles.edit', [$sourceLink->article->id]);
    }

    /**
     * Soft delete Article from DB.
     */
    public function destroy(string $id)
    {
        return response('destroy');
    }
}
