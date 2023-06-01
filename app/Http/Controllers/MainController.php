<?php

namespace App\Http\Controllers;

use App\Models\NewsCategory;
use App\Models\NewsPost;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class MainController extends Controller
{

    public function login(Request $r)
    {
        if ($r->login_password == null) {
            return Redirect::back()
                ->withErrors(['login_password' => ['Passwords is required']])
                ->withInput();
        }
        $u = User::where('email', $r->login_email)->first();
        if ($u == null) {
            return Redirect::back()
                ->withErrors(['login_email' => ['User with provided email does not exist on our database.']])
                ->withInput();
        }

        $credentials = [
            'id' => $u->id,
            'password' => $r->login_password,
        ];

        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard');
        } else {
            return Redirect::back()
                ->withErrors(['login_password' => ['Wrong password.']])
                ->withInput();
        }
    }

    public function register(Request $r)
    {
        if ($r->password != $r->password_2) {
            return Redirect::back()
                ->withErrors(['password' => ['Passwords did not match']])
                ->withInput();
        }
        $u = User::where('email', $r->email)->first();

        if ($u != null) {
            return Redirect::back()
                ->withErrors(['email' => ['User with same email address already exist on our database.']])
                ->withInput();
        }

        $u = new User();
        $u->name = $r->name;
        $u->email = $r->email;
        $u->user_type = 'default';
        $u->password = password_hash($r->password, PASSWORD_DEFAULT);

        try {
            $u->save();
            $credentials = [
                'email' => $u->email,
                'password' => $r->password,
            ];

            if (Auth::attempt($credentials)) {
                return redirect()->intended('dashboard');
            } else {
                return Redirect::back()
                    ->withErrors(['email' => ['Failed to log you in.']])
                    ->withInput();
            }
        } catch (\Throwable $th) {
            return Redirect::back()
                ->withErrors(['email' => ['Failed to create eacount because ' . $th]])
                ->withInput();
        }
    }



    public function model_relationships()
    {
        $cats = NewsCategory::all();

        foreach ($cats as $key => $c) {
            echo "{$c->id}.  {$c->name} - (<b>" . $c->posts->count() . "</b>)<br>";
        }

        echo '<hr>';

        $posts = NewsPost::all();

        foreach ($posts as $key => $p) {
            echo "{$p->id}. <b>{$p->cat->name}</b>: {$p->title}<br>";
        }
        die();

        dd(($posts->count()));
        dd(($cats->count()));
        die("Relationship");

        /* 
        $p = new NewsPost();
        $p->title = 'MTN Uganda, Stanbic Bank ranked among Africa’s Top 250 Companies';
        $p->body = $p->title . " " . $p->title;
        $p->photo = 'no_image.jpg';
        $p->views = 0;
        $p->user_id = 1;
        $p->news_category_id = rand(1, 5);
        $p->save();
        */
    }
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
        $m->name  = 'Celebrity';
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
        $cats = NewsCategory::where('name', 'like', '%i%')
            ->get();
        echo '<h2>Like</h2>';
        foreach ($cats as $key => $cat) {
            echo "{$cat->id}. {$cat->name}<br>";
        }
        //Query
        $cats = NewsCategory::where('id', '!=', 3)
            ->get();
        echo '<h2>Query Scope</h2>';
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
