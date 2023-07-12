<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\RubricsCombination;
use App\Models\Article;
use App\Http\Controllers\Traits\ConverterRubricsCombination;
use App\Http\Controllers\Traits\ArticleSelector;

/**
 * This controller is responsible for pages:
 * Home
 */
class HomeController extends Controller
{
    use ConverterRubricsCombination, ArticleSelector;

    /**
     * Controller settings
     */
    protected $articlesPerPage = 15;
    protected $debuggingStatus = false;

    public function __construct()
    {
        $this->middleware('auth')->except('home');
    }

    /**
     * Show Home page
     */
    public function home(Request $request)
    {
        $context = [
            'route' => 'home',
            'rubricsCombination' => [],
            'articles' => [],
            'debugging' => [],
        ];

        //repeated request auth or guest
        if ($request->input() != NULL) {
            //Rubrics and locale panel
            $arrRubricsCombination = $this->converterRubricsCombination($request->input());
            $context['rubricsCombination'] = $arrRubricsCombination;

            //news
            if ($arrRubricsCombination['all'] == 1) {
                $objsArticles = Article::latest()->
                                        paginate($this->articlesPerPage)->
                                        appends($arrRubricsCombination);
                $context['articles'] = $objsArticles;
            } else {
                $objsArticles = Article::latest();
                $objsArticles = $this->articleSelector($objsArticles, $arrRubricsCombination)->
                                        paginate($this->articlesPerPage)->
                                        appends($arrRubricsCombination);
                $context['articles'] = $objsArticles;
            }
            
            //debugging
            if ($this->debuggingStatus) {
                $context['debugging'] += ['in if' => 'home, repeated request'];
                $context['debugging'] += ['pressed' => $request->input()['pressed']];
            }
        }

        //auth first request
        elseif (Auth::check()) {
            //Rubrics and locale panel, the key [0] because it is an array of arrays
            $arrRubricsCombination = Auth::user()->rubricsCombination()->get()->toArray()[0];
            $arrRubricsCombination = $this->converterRubricsCombination($arrRubricsCombination);
            $context['rubricsCombination'] = $arrRubricsCombination;

            //news
            if ($arrRubricsCombination['all'] == 1) {
                $objsArticles = Article::latest()->
                                        paginate($this->articlesPerPage)->
                                        appends($arrRubricsCombination);
                $context['articles'] = $objsArticles;
            } else {
                $objsArticles = Article::latest();
                $objsArticles = $this->articleSelector($objsArticles, $arrRubricsCombination)->
                                        paginate($this->articlesPerPage)->
                                        appends($arrRubricsCombination);
                $context['articles'] = $objsArticles;
            }

            //debugging
            if ($this->debuggingStatus) {
                $context['debugging'] += ['in if' => 'home, auth first request'];
            }
        }

        //guest first request
        else{
            //Rubrics and locale panel
            $arrRubricsCombination = $this->converterRubricsCombination(
                                        RubricsCombination::find(1)->toArray()
                                    );
            $context['rubricsCombination'] = $arrRubricsCombination;

            //news
            $objsArticles = Article::latest()->
                                    paginate($this->articlesPerPage)->
                                    appends($arrRubricsCombination);
            $context['articles'] = $objsArticles;

            //debugging
            if ($this->debuggingStatus) {
                $context['debugging'] += ['in if' => 'home, guest first request'];
            }
        }    

        return view('home', ['context' => $context]);
    }
}
