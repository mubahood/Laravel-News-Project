<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        //logic...
        $name = 'John Black';
        $sex = 'Male';
        $colors = [
            'Black',
            'Yellow',
            'Red',
            'Pink',
            'Blue',
            'Green',
        ];
        return view('home', [
            'name' => $name,
            'sex' => $sex,
            'colors' => $colors
        ]);
    }

    public function about_us()
    {
        //
        return view('others\about-us');
    }

    public function contact_us()
    {
        //
        return view('other\contact-us');
    }
}
