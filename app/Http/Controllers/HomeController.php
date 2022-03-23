<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Category;
use App\Page;
use App\PfPost;
use App\PfCategory;
use App\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard')
                    ->with('posts_count', Post::all()->count())
                    ->with('pfposts_count', PfPost::all()->count())
                    ->with('trashed_count', Post::onlyTrashed()->get()->count())
                    ->with('pftrashed_count', PfPost::onlyTrashed()->get()->count())
                    ->with('users_count', User::all()->count())
                    ->with('pages_count', Page::all()->count())
                    ->with('categories_count', Category::all()->count())
                    ->with('tags_count', Tag::all()->count())
                    ->with('pfcategories_count', PfCategory::all()->count());
                   
    }
}
