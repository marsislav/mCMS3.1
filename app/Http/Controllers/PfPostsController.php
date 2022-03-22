<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PfCategory;
use App\PfPost;
use Session;

class PfPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pfposts.index')->with('pfposts', PfPost::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pfposts.create')->with('pfcategories', Pfcategory::all());
        //return view('admin.pfposts.create')->with('pfcategories', $pfcategories);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request, [
           'title'=>'required',
           'featured'=>'required',
           'content'=>'required',
           'pfcategory_id'=>'required'
       ]);

        $featured = $request->featured;

        $featured_new_name = time().$featured->getClientOriginalName();

        $featured->move('uploads/portfolio', $featured_new_name);

        $pfpost = PfPost::create([
            'title' => $request->title,
            'content' => $request->content,
            'featured' => 'uploads/portfolio/' . $featured_new_name,
            'pfcategory_id' => $request->pfcategory_id,
            'slug' => str_slug($request->title),
        ]);


        Session::flash('success', 'Portfolio item  created successfully.');


        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pfpost = PfPost::find($id);

        return view('admin.pfposts.edit')->with('pfpost', $pfpost)
            ->with('pfcategories', Pfcategory::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'pfcategory_id' => 'required'
        ]);

        $pfpost = PfPost::find($id);

        if($request->hasFile('featured'))
        {
            $featured = $request->featured;

            $featured_new_name = time() . $featured->getClientOriginalName();

            $featured->move('uploads/portfolio/', $featured_new_name);

            $portfolio->featured = 'uploads/portfolio/'.$featured_new_name;

        }

        $pfpost->title = $request->title;
        $pfpost->content = $request->content;
        $pfpost->pfcategory_id = $request->pfcategory_id;

        $pfpost->save();


        Session::flash('success', 'Portfolio item updated successfully.');

        return redirect()->route('pfposts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pfpost = PfPost::find($id);

        $pfpost->delete();

        Session::flash('success', 'The portfolio item was just trashed.');

        return redirect()->back();
    }

    public function trashed() {
        $pfposts = PfPost::onlyTrashed()->get();

        return view('admin.pfposts.trashed')->with('pfposts', $pfposts);
    }

    public function kill($id)
    {
        $pfpost = PfPost::withTrashed()->where('id', $id)->first();

        $pfpost->forceDelete();

        Session::flash('success', 'Portfolio item deleted permanently.');

        return redirect()->back();
    }

    public function restore($id)
    {
        $pfpost = PfPost::withTrashed()->where('id', $id)->first();

        $pfpost->restore();

        Session::flash('success', 'Portfolio item restored successfully.');

        return redirect()->route('pfposts');
    }
}
