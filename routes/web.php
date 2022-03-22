<?php

// Public routes
Route::get('/', [
    'uses' => 'FrontEndController@index',
    'as' => 'index'
]);

Route::get('/login', [
    'uses' => 'FrontEndController@index',
    'as' => 'index'
]);

Route::get('/register', [
    'uses' => 'FrontEndController@index',
    'as' => 'index'
]);

// Route::post('/logout', function () {
//     return \App\Http\Controllers\UsersController::logout();
// });

// In case guest tries to directly open logout route.
Route::group(['middleware' => 'auth'], function(){
    Route::get('/logout', "\App\Http\Controllers\UsersController@logout");
});

Route::get('/results', function(){
    $posts = \App\Post::where('title','like',  '%' . request('query') . '%')->get();

    return view('results')->with('posts', $posts)
        ->with('title', 'Search results : ' . request('query'))
        ->with('settings', \App\Setting::first())
        ->with('categories', \App\Category::take(5)->get())
        ->with('pages', \App\Page::take(5)->get())
        ->with('query', request('query'));
});

Route::get('/post/{slug}', [
    'uses' => 'FrontEndController@singlePost',
    'as' => 'post.single'
]);
Route::get('/portfolio/{slug}', [
    'uses' => 'FrontEndController@singlePortfolio',
    'as' => 'portfolio.single'
]);

Route::get('/category/{id}', [
    'uses' => 'FrontEndController@category',
    'as' => 'category.single'
]);

Route::get('/portfolio/{id}', [
    'uses' => 'FrontEndController@pfcategory',
    'as' => 'pfcategory.single'
]);

Route::get('/page/{id}', [
    'uses' => 'FrontEndController@page',
    'as' => 'page.single'
]);

Route::get('/tag/{id}', [
    'uses' => 'FrontEndController@tag',
    'as' => 'tag.single'
]);

Route::post('/contact/submit', 'MessagesController@submit');

Auth::routes();

// Admin routes
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){

    Route::get('/', function () {
        return redirect()->intended('/admin/dashboard');
    });

    Route::get('/dashboard', [
        'uses' => 'HomeController@index',
        'as' => 'home'
    ]);

    Route::get('/post/create', [
        'uses' => 'PostsController@create',
        'as' => 'post.create'
    ]);

    Route::post('/post/store', [
        'uses' => 'PostsController@store',
        'as' => 'post.store'
    ]);

    Route::get('/post/delete/{id}', [
        'uses' => 'PostsController@destroy',
        'as' => 'post.delete'
    ]);

    Route::get('/posts', [
        'uses' => 'PostsController@index',
        'as' => 'posts'
    ]);

    Route::get('/posts/trashed', [
        'uses' => 'PostsController@trashed',
        'as' => 'posts.trashed'
    ]);

    Route::get('/posts/kill/{id}', [
        'uses' => 'PostsController@kill',
        'as' => 'post.kill'
    ]);

    Route::get('/posts/restore/{id}', [
        'uses' => 'PostsController@restore',
        'as' => 'post.restore'
    ]);

    Route::get('/posts/edit/{id}', [
        'uses' => 'PostsController@edit',
        'as' => 'post.edit'
    ]);

    Route::post('/post/update/{id}', [
        'uses' => 'PostsController@update',
        'as' => 'post.update'
    ]);

    /*Portfolio*/
    Route::get('/pfpost/create', [
        'uses' => 'PfPostsController@create',
        'as' => 'pfpost.create'
    ]);

    Route::post('/pfpost/store', [
        'uses' => 'PfPostsController@store',
        'as' => 'pfpost.store'
    ]);

    Route::get('/pfpost/delete/{id}', [
        'uses' => 'PfPostsController@destroy',
        'as' => 'pfpost.delete'
    ]);

    Route::get('/pfposts', [
        'uses' => 'PfPostsController@index',
        'as' => 'pfposts'
    ]);

    Route::get('/pfposts/trashed', [
        'uses' => 'PfPostsController@trashed',
        'as' => 'pfposts.trashed'
    ]);

    Route::get('/pfposts/kill/{id}', [
        'uses' => 'PfPostsController@kill',
        'as' => 'pfpost.kill'
    ]);

    Route::get('/pfposts/restore/{id}', [
        'uses' => 'PfPostsController@restore',
        'as' => 'pfpost.restore'
    ]);

    Route::get('/pfposts/edit/{id}', [
        'uses' => 'PfPostsController@edit',
        'as' => 'pfpost.edit'
    ]);

    Route::post('/pfpost/update/{id}', [
        'uses' => 'PfPostsController@update',
        'as' => 'pfpost.update'
    ]);

    /*End of Portfolio*/

    /*Portfolio categories*/

    Route::get('/pfcategory/create', [
        'uses' => 'PfcategoriesController@create',
        'as' => 'pfcategory.create'
    ]);

    Route::get('/pfcategories', [
        'uses' => 'PfcategoriesController@index',
        'as' => 'pfcategories'
    ]);

    Route::post('/pfcategory/store', [
        'uses' => 'PfcategoriesController@store',
        'as' => 'pfcategory.store'
    ]);

    Route::get('/pfcategory/edit/{id}', [
        'uses' => "PfcategoriesController@edit",
        'as' => 'pfcategory.edit'
    ]);

    Route::get('/pfcategory/delete/{id}', [
        'uses' => "PfcategoriesController@destroy",
        'as' => 'pfcategory.delete'
    ]);

    Route::post('/pfcategory/update/{id}', [
        'uses' => 'PfcategoriesController@update',
        'as' => 'pfcategory.update'
    ]);

    /*End of portfolio categories*/

    Route::get('/category/create', [
        'uses' => 'CategoriesController@create',
        'as' => 'category.create'
    ]);

    Route::get('/categories', [
        'uses' => 'CategoriesController@index',
        'as' => 'categories'
    ]);

    Route::post('/category/store', [
        'uses' => 'CategoriesController@store',
        'as' => 'category.store'
    ]);

    Route::get('/category/edit/{id}', [
        'uses' => "CategoriesController@edit",
        'as' => 'category.edit'
    ]);

    Route::get('/category/delete/{id}', [
        'uses' => "CategoriesController@destroy",
        'as' => 'category.delete'
    ]);

    Route::post('/category/update/{id}', [
        'uses' => 'CategoriesController@update',
        'as' => 'category.update'
    ]);

    Route::get('/page/create', [
        'uses' => 'PagesController@create',
        'as' => 'page.create'
    ]);

    Route::get('/page', [
        'uses' => 'PagesController@index',
        'as' => 'pages'
    ]);

    Route::post('/page/store', [
        'uses' => 'PagesController@store',
        'as' => 'page.store'
    ]);

    Route::get('/page/edit/{id}', [
        'uses' => "PagesController@edit",
        'as' => 'page.edit'
    ]);

    Route::get('/page/delete/{id}', [
        'uses' => "PagesController@destroy",
        'as' => 'page.delete'
    ]);

    Route::post('/page/update/{id}', [
        'uses' => 'PagesController@update',
        'as' => 'page.update'
    ]);

    Route::get('/tags', [
        'uses' => 'TagsController@index',
        'as' => 'tags'
    ]);

    Route::get('/tag/edit/{id}', [
        'uses' => 'TagsController@edit',
        'as' => 'tag.edit'
    ]);

    Route::get('/tag/create', [
        'uses' => 'TagsController@create',
        'as' => 'tag.create'
    ]);

    Route::post('/tag/store', [
        'uses' => 'TagsController@store',
        'as' => 'tag.store'
    ]);

    Route::post('/tag/update/{id}', [
        'uses' => 'TagsController@update',
        'as' => 'tag.update'
    ]);

    Route::get('/tag/delete/{id}', [
        'uses' => 'TagsController@destroy',
        'as' => 'tag.delete'
    ]);

    Route::get('/users', [
        'uses' => 'UsersController@index',
        'as' => 'users'
    ]);

    Route::get('/user/create', [
        'uses' => 'UsersController@create',
        'as' => 'user.create'
    ]);

    Route::post('/user/store', [
        'uses' => 'UsersController@store',
        'as' => 'user.store'
    ]);

    Route::get('user/admin/{id}', [
        'uses' => 'UsersController@admin',
        'as' => 'user.admin'
    ]);

    Route::get('user/not-admin/{id}', [
        'uses' => 'UsersController@not_admin',
        'as' => 'user.not.admin'
    ]);

    Route::get('user/profile', [
        'uses' => 'ProfilesController@index',
        'as' => 'user.profile'
    ]);

    Route::get('user/delete/{id}', [
        'uses' => 'UsersController@destroy',
        'as' => 'user.delete'
    ]);

    Route::post('/user/profile/update', [
        'uses' => 'ProfilesController@update',
        'as' => 'user.profile.update'
    ]);

    Route::get('/settings', [
        'uses' => 'SettingsController@index',
        'as' => 'settings'
    ]);

    Route::post('/settings/update', [
        'uses' => 'SettingsController@update',
        'as' => 'settings.update'
    ]);

    Route::get('/messages', [
        'uses' => 'MessagesController@getMessages',
        'as' => 'get.messages'
    ]);

});
