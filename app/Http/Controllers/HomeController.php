<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
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
    public function home()
    {
        $context = [];
        //Статус Панель сортировки статей
        return view('home', ['context' => $context]);
    }
}
