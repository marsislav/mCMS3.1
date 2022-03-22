<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pfcategory;
use App\Portfolio;
use Session;

class PortfoliosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.portfolios.index')->with('portfolios', Portfolio::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.portfolios.create')->with('pfcategories', Pfcategory::all());

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

        $portfolio = Portfolio::create([
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
        $portfolio = Portfolio::find($id);

        return view('admin.portfolios.edit')->with('portfolio', $portfolio)
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

        $portfolio = Portfolio::find($id);

        if($request->hasFile('featured'))
        {
            $featured = $request->featured;

            $featured_new_name = time() . $featured->getClientOriginalName();

            $featured->move('uploads/portfolio/', $featured_new_name);

            $portfolio->featured = 'uploads/portfolio/'.$featured_new_name;

        }

        $portfolio->title = $request->title;
        $portfolio->content = $request->content;
        $portfolio->pfcategory_id = $request->pfcategory_id;

        $portfolio->save();


        Session::flash('success', 'Portfolio item updated successfully.');

        return redirect()->route('portfolios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $portfolio = Portfolio::find($id);

        $portfolio->delete();

        Session::flash('success', 'The portfolio item was just trashed.');

        return redirect()->back();
    }

    public function trashed() {
        $portfolios = Portfolio::onlyTrashed()->get();

        return view('admin.portfolios.trashed')->with('portfolios', $portfolios);
    }

    public function kill($id)
    {
        $portfolio = Portfolio::withTrashed()->where('id', $id)->first();

        $portfolio->forceDelete();

        Session::flash('success', 'Portfolio item deleted permanently.');

        return redirect()->back();
    }

    public function restore($id)
    {
        $portfolio = Portfolio::withTrashed()->where('id', $id)->first();

        $portfolio->restore();

        Session::flash('success', 'Portfolio item restored successfully.');

        return redirect()->route('portfolios');
    }
}
