<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        //our logic
        return view('index');
    }

    public function about_us()
    {
        //
        return ("this is about us from main controller");
    }

    public function contact_us()
    {
        //
        return ("this is contact us from main controller");
    }
}
