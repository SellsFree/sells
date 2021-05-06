<?php

namespace App\Http\Controllers\Admin;

use App\Models\Zone;
use App\Models\District;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
class ZoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $zone = Zone::orderBy('name','ASC')->get();
        return view('admin.zone.index')->with('zones', $zone);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $dis= District::all();
       return view('admin.zone.create')->with('dis',$dis);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $zone = new Zone;
        $zone->dist_slug= $request->dis_id;
        $zone->name= $request->name;
        $zone->slug= str::slug($request->name);
        $zone->save();
        return back()->with('success','Zone / Area is Inserted !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Zone  $zone
     * @return \Illuminate\Http\Response
     */
    public function show(Zone $zone)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Zone  $zone
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $dis= District::all();
        $zone= Zone::where('id',$id)->first();
       return view('admin.zone.edit')->with('dis',$dis)->with('zone',$zone);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Zone  $zone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $zone =  Zone::where('id',$request->id)->first();
        $zone->dist_slug= $request->dis_id;
        $zone->name= $request->name;
       
        $zone->save();
        return back()->with('success','Zone / Area is Update !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Zone  $zone
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $zone=Zone::where('id',$id)->delete();
        return back()->with('status','Zone / Area is Deleted !!');
    }
}
