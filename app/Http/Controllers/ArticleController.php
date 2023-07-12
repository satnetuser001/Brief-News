<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\RubricsCombination;
//use App\Models\Article;
use App\Http\Controllers\Traits\ConverterRubricsCombination;
use App\Http\Controllers\Traits\ArticleSelector;

/**
 * This controller is responsible for pages:
 * 
 */
class ArticleController extends Controller
{
    use ConverterRubricsCombination, ArticleSelector;

    /**
     * Controller settings
     */
    protected $articlesPerPage = 15;
    protected $debuggingStatus = false;

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show all articles of the user
     */
    public function index(Request $request)
    {
        
        $context = [
            'route' => 'articles.index',
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
                                    paginate($this->articlesPerPage)->
                                    appends($arrRubricsCombination);
                $context['articles'] = $objsArticles;
            } else {
                $objsArticles = Auth::user()->articles();
                $objsArticles = $this->articleSelector($objsArticles, $arrRubricsCombination)->
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
        return response('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return response('store');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response('show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return response('edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return response('update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return response('destroy');
    }
}
