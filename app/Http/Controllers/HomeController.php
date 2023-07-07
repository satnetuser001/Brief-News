<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\RubricsCombination;
use App\Models\Article;
use App\Models\SourceLink;
use App\Http\Controllers\Traits\ConverterRubricsCombination;
use App\Http\Controllers\Traits\ArticleSelector;

class HomeController extends Controller
{
    use ConverterRubricsCombination, ArticleSelector;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show Home page
     *
     */
    public function home(Request $request)
    {
        //settings
        $debugging = true;

        $context = [
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
                $arrArticles = Article::latest()->get()->toArray();
                $context['articles'] = $arrArticles;
            } else {
                $arrArticles = $this->articleSelector($arrRubricsCombination);
                $context['articles'] = $arrArticles;
            }
            
            //debugging
            if ($debugging) {
                $context['debugging'] += ['in if' => 'guest repeated request'];
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
                $arrArticles = Article::latest()->get()->toArray();
                $context['articles'] = $arrArticles;
            } else {
                $arrArticles = $this->articleSelector($arrRubricsCombination);
                $context['articles'] = $arrArticles;
            }

            //debugging
            if ($debugging) {
                $context['debugging'] += ['in if' => 'auth first request'];
            }
        }

        //guest first request
        else{
            //Rubrics and locale panel
            $arrRubricsCombination = $this->converterRubricsCombination(RubricsCombination::find(1)->toArray());
            $context['rubricsCombination'] = $arrRubricsCombination;

            //news
            $arrArticles = Article::latest()->get()->toArray();
            $context['articles'] = $arrArticles;

            //debugging
            if ($debugging) {
                $context['debugging'] += ['in if' => 'guest first request'];
            }
        }    

        return view('home', ['context' => $context]);
    }
}
