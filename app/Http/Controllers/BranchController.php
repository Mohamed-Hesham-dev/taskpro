<?php

namespace App\Http\Controllers;

use App\Http\Requests\BranchRequest;
use App\Models\Branch;
use App\Models\District;
use App\Models\Gouverne;
use Illuminate\Http\Request;

class BranchController extends Controller
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
        $branches=Branch::withTrashed()->get();
        return view('branches.index',compact('branches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gouvernes = Gouverne::get();
        $districts=District::get();
        return view('branches.create',compact('gouvernes','districts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BranchRequest $request)
    {
        $branch=new Branch();
        $branch->name=$request->name;
        $branch->gouverne_id=$request->gouverne_id;
        $branch->district_id=$request->district_id;
        $branch->save();
        return redirect()->action([BranchController::class,'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function show(Branch $branch)
    {
        return view('branches.show',compact('branch'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function edit(Branch $branch)
    {
        $gouvernes=Gouverne::get();
        $districts=District::get();
        return view('branches.edit',compact('branch','gouvernes','districts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Branch $branch)
    {

        $data = $request->all();
        $branch->update($data);
        return redirect()->action([BranchController::class,'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Branch $branch)
    {
        $branch->delete();
        return redirect()->route('branches.index');
    }

    public function restore(Branch $branch)
    {
        $branch->onlyTrashed()->restore();
        return redirect()->route('branches.index');
    }

    public function fetchDistrict(Request $request)
    {
        $data['districts'] = District::where("gouverne_id", $request->gouverne_id)->get();

        return response()->json($data);
    }
}
