<?php

namespace App\Http\Resources;

use App\Models\NewsCategory;
use App\Models\NewsPost;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class PostResource
{
    public function index(Request $request)
    {
        $posts = NewsPost::where([])
            ->orderBy('id', 'desc')
            ->paginate(3)
            ->withQueryString();
        return view('dashboard.posts', [
            'posts' => $posts
        ]);
    }

    public function store(Request $r)
    {
        $p = new NewsPost();
        $p->title =  $r->name;
        $p->body =  $r->body;
        $p->news_category_id =  $r->news_category_id;
        $p->views =  0;
        $u = Auth::user();
        $p->user_id =  $u->id;

        $images = User::file_uploader($_FILES);
        $p->photo = "no_image.jpg";
        if (isset($images[0])) {
            $p->photo = $images[0];
        }
        if ($p->save()) {
            return redirect()->intended(url('dashboard/posts'));
        } else {
            return Redirect::back()
                ->withInput();
        }
    }

    public function create(Request $request)
    {
        $cats = NewsCategory::where([])->orderBy('name', 'asc')->get();
        return view('dashboard.posts-create', [
            'cats' => $cats
        ]);
    }
}
