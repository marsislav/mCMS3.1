<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PfCategory;

class PfcategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pfcategories.index')->with('pfcategories', PfCategory::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pfcategories.create');
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
            'name'=>'required'
        ]);
        $pfcategory=new PfCategory;
        $pfcategory->name=$request->name;
        $pfcategory->save();
        Session::flash('success', 'You successfully create the portfolio category.');
        return redirect()->route('pfcategories');
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
        $pfcategory = PfCategory::find($id);

        return view('admin.pfcategories.edit')->with('pfcategory', $pfcategory);
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
        $pfcategory = PfCategory::find($id);

        $pfcategory->name = $request->name;

        $pfcategory->save();

        Session::flash('success', 'You successfully updated the portfolio category.');

        return redirect()->route('pfcategories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $pfcategory = PfCategory::find($id);

        if ($pfcategory->pfcategories->count()>0) {
            Session::flash('info', 'ERROR! Category cannot be deleted because it has some portfolio items!!!.');
            return redirect()->back();
        }

        foreach($pfcategory->pfposts as $pfpost){
            $portfolio->forceDelete();
        }

        $pfcategory->delete();

        Session::flash('success', 'You succesfully deleted the portfolio category.');

        return redirect()->route('pfcategories');
    }
}
