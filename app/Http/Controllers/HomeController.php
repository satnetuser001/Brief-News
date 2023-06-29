<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\RubricsCombination;
use App\Http\Controllers\Traits\ConverterRubricsCombination;

class HomeController extends Controller
{
    use ConverterRubricsCombination;

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
        $context = [
            'rubricsCombination' => [],
            'news' => [],
            'debugging' => [],
        ];
        
        //Forming 'rubrics combination' for different users
        //auth repeated request
        if (array_key_exists('pressed', $request->input()) and Auth::check()) {
            $arrUserRubricsCombination = $this->converterRubricsCombination($request->input());
            $context['rubricsCombination'] = $arrUserRubricsCombination;

            $context['debugging'] += ['in if' => 'auth repeated request'];
            $context['debugging'] += ['pressed' => $request->input()['pressed']];
        }

        //auth first request
        elseif (Auth::check()) {
            $arrUserRubricsCombination = Auth::user()->rubricsCombination()->get()->toArray()[0];
            $arrUserRubricsCombination = $this->converterRubricsCombination($arrUserRubricsCombination);
            $context['rubricsCombination'] = $arrUserRubricsCombination;

            $context['debugging'] += ['in if' => 'auth first request'];
        }

        //guest repeated request
        elseif ($request->input() != NULL) {
            $arrGuestRubricsCombination = $this->converterRubricsCombination($request->input());
            $context['rubricsCombination'] = $arrGuestRubricsCombination;

            $context['debugging'] += ['in if' => 'guest repeated request'];
            $context['debugging'] += ['pressed' => $request->input()['pressed']];
        }

        //guest first request
        else{
            $arrGuestRubricsCombination = $this->converterRubricsCombination(RubricsCombination::find(1)->toArray());
            $context['rubricsCombination'] = $arrGuestRubricsCombination;

            $context['debugging'] += ['in if' => 'guest first request'];
        }    

        return view('home', ['context' => $context]);
    }
}
