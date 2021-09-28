<?php

namespace App\Http\Controllers;

use App\Http\Requests\DestrictRequest;
use App\Models\District;
use App\Models\Gouverne;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    public function __construct()   
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $districts=District::withTrashed()->get();
        return view('districts.index',compact('districts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $gouvernes = Gouverne::get();
        return view('districts.create',compact('gouvernes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DestrictRequest $request)
    {
        $district=new District();
        $district->name=$request->name;
        $district->gouverne_id=$request->gouverne_id;
        $district->save();
        return redirect()->action([DistrictController::class,'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\District  $district
     * @return \Illuminate\Http\Response
     */
    public function show(District $district)
    {
        return view('districts.show',compact('district'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\District  $district
     * @return \Illuminate\Http\Response
     */
    public function edit(District $district)
    {
        $gouvernes=Gouverne::get();
        return view('districts.edit',compact('district','gouvernes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\District  $district
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, District $district)
    {
        $data = $request->all();
        $district->update($data);
        return redirect()->action([DistrictController::class,'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\District  $district
     * @return \Illuminate\Http\Response
     */
    public function destroy(District $district)
    {
        $district->delete();
        return redirect()->route('districts.index');
    }

    public function restore(District $district)
    {
        $district->onlyTrashed()->restore();
        return redirect()->back();
    }
}
