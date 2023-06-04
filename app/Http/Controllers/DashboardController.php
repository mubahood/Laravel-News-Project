<?php

namespace App\Http\Controllers;

use App\Models\NewsCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Utils;

class DashboardController extends Controller
{
    //
    public function index()
    {
        return view('dashboard.index');
    }
    public function categories()
    {
        $cats = NewsCategory::where([])->orderBy('name', 'asc')->get();
        return view('dashboard.categories', [
            'categories' => $cats,
        ]);
    }
    public function categories_create()
    {
        return view('dashboard.categories-create');
    }
    public function categories_store(Request $r)
    {

        $images = User::file_uploader($_FILES);

        $thumb = "no_image.jpg";
        if (isset($images[0])) {
            $thumb = $images[0];
        }

        $cat = new NewsCategory();
        $cat->name = $_POST['name'];
        $cat->details = $_POST['details'];
        $cat->photo = $thumb;

        if ($cat->save()) {
            return redirect()->intended(route('categories'));
        } else {
            return Redirect::back()
                ->withInput();
        }

        die("time to create acateroye");
    }
}
