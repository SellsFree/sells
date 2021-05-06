<?php

namespace App\Http\Controllers\Admin;

use App\Models\District;
use App\Models\Division;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $district= District::orderBy('name','ASC')->get();
        return view('admin.district.index')->with('districts',$district);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $div= Division::all();
        return view('admin.district.create')->with('divi',$div);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $district= new District;
     
        $district->name=$request->name;
        $district->slug=str::slug($request->name);
        $district->divi_slug=$request->divi_id;
        
  
        $district->save();
        return back()->with('success','District is Inserted !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\District  $district
     * @return \Illuminate\Http\Response
     */
    public function show(District $district)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\District  $district
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $div= Division::all();
        $district= District::where('id',$id)->first();
        return view('admin.district.edit')->with('divi',$div)->with('district',$district);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\District  $district
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $district=  District::where('id',$request->id)->first();

        $district->name=$request->name;
        
        $district->divi_slug=$request->divi_id;
        
  
        $district->save();
        return back()->with('success','District is Update !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\District  $district
     * @return \Illuminate\Http\Response
     */
    public function delete( $id)
    {
        $district=  District::where('id',$id)->delete();
        return back()->with('status','District is delete !!');
    }
}
