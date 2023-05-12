<?php

namespace App\Http\Controllers;

use App\Models\NewsCategory;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view('index');
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
        return view('others/contact-us');
    }


    public function model_saving()
    {
        $m = new NewsCategory();
        $m->name  = 'Education';
        $m->photo  = 'no_image.jpg';
        $m->details  = 'News details about politcs';
        //$m->save();

        die('Done processing.');
    }

    public function model_querying()
    {

        echo '<h2>Hooks</h2>';
        $m = new NewsCategory();
        $m->name  = 'International';
        $m->photo  = 'no_image.jpg';
        $m->details  = 'News details about politcs';
        $m->save();


        //Order By
        $cats = NewsCategory::where([])
            ->orderBy('id', 'desc')
            ->get(); 
        foreach ($cats as $key => $cat) {
            echo "{$cat->id}. {$cat->name}<br>";
        }

        die("");


        //Appends
        $cats = NewsCategory::where([])
            ->get();
        echo '<h2>Append</h2>';
        foreach ($cats as $key => $cat) {
            echo "{$cat->id}. {$cat->short_name}<br>";
        }



        //like
        $cats = NewsCategory::where('name', 'like', '%t%')
            ->get();
        echo '<h2>Like</h2>';
        foreach ($cats as $key => $cat) {
            echo "{$cat->id}. {$cat->name}<br>";
        }

        //Average
        $cats = NewsCategory::where('id', '<3', 1)
            ->get();
        echo '<h2>Query Schope</h2>';
        foreach ($cats as $key => $cat) {
            echo "{$cat->id}. {$cat->name}<br>";
        }


        //Average
        $avg = NewsCategory::where([])
            ->avg('id');
        echo '<h2>Average</h2>';
        echo " $avg <br>";

        //Find
        $sum = NewsCategory::where([])
            ->sum('id');
        echo '<h2>Sum</h2>';
        echo " $sum <br>";

        //Find
        $cat = NewsCategory::find(1);
        echo '<h2>Find</h2>';
        if ($cat != null) {
            echo "{$cat->id}. {$cat->name}<br>";
        }


        //Limit
        $cats = NewsCategory::where([])
            ->limit(4)
            ->get();
        echo '<h2>Limit</h2>';
        foreach ($cats as $key => $cat) {
            echo "{$cat->id}. {$cat->name}<br>";
        }


        //Order By
        $cats = NewsCategory::where([])
            ->orderBy('id', 'asc')
            ->get();
        echo '<h2>Order</h2>';
        foreach ($cats as $key => $cat) {
            echo "{$cat->id}. {$cat->name}<br>";
        }



        //WhereIn
        $cats = NewsCategory::whereIn('id', [1, 5, 4])->get();
        echo '<h2>WhereIn</h2>';
        foreach ($cats as $key => $cat) {
            echo "{$cat->id}. {$cat->name}<br>";
        }



        //Single Where
        $cats = NewsCategory::where('name', 'Entertainment')->get();
        echo '<h2>Single Where</h2>';
        foreach ($cats as $key => $cat) {
            echo "{$cat->id}. {$cat->name}<br>";
        }



        //OrWhere
        $cats = NewsCategory::where([
            'name' => 'Entertainment',
        ])
            ->orWhere([
                'id' => 4
            ])
            ->orWhere([
                'id' => 1
            ])
            ->get();

        echo '<h2>Single Where</h2>';
        foreach ($cats as $key => $cat) {
            echo "{$cat->id}. {$cat->name}<br>";
        }


        //Where
        $cats = NewsCategory::where([
            'name' => 'Entertainment',
            'id' => 2
        ])->get();

        echo '<h2>WHERE</h2>';
        foreach ($cats as $key => $cat) {
            echo "{$cat->id}. {$cat->name}<br>";
        }

        //All
        $categories = NewsCategory::all();
        echo '<h2>ALL</h2>';
        foreach ($categories as $key => $cat) {
            echo "{$cat->id}. {$cat->name}<br>";
        }
        die('.');
    }
}
