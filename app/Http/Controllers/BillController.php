<?php

namespace App\Http\Controllers;

use App\Http\Requests\BillRequest;
use App\Models\Bill;
use App\Models\Branch;
use App\Models\District;
use App\Models\Gouverne;
use App\Models\Product;
use Illuminate\Http\Request;

class BillController extends Controller
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
        $bills=Bill::withTrashed()->get();
        return view('bills.index',compact('bills'));
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
        $products=Product::get();
        return view('bills.create',compact('gouvernes','districts','products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BillRequest $request)
    {
     
        $bill=new Bill();
        $bill->quantity=$request->quantity;
        $bill->gouverne_id=$request->gouverne_id;
        $bill->district_id=$request->district_id;
        $bill->branch_id=$request->branch_id;
        $bill->product_id=$request->product_id;
        $product=Product::findOrFail($bill->product_id);
        $product->quantity=$product->quantity- $bill->quantity;
        if($product->quantity>=0){
            $product->update( ['quantity',$product->quantity]);
        }else{
            return redirect()->back() ->with('danger', 'yo can not edit quantity becouse product quantity equal 0! ');

        }
       
        $bill->save();
       
        

        return redirect()->action([BillController::class,'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function show(Bill $bill)
    {
        return view('bills.show',compact('bill'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function edit(Bill $bill)
    {
        $gouvernes=Gouverne::get();
        $districts=District::get();
        $branches=Branch::get();
        $products=Product::get();
        return view('bills.edit',compact('bill','gouvernes','districts','products','branches'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function update(BillRequest $request, Bill $bill)
    {
        $data = $request->all();
        //dd($data);
        $bill->update($data);
        $product=Product::findOrFail($bill->product_id);
        $product->quantity=$product->quantity- $bill->quantity;
        if($product->quantity>=0){
            $product->update( ['quantity',$product->quantity]);
        }else{
            return redirect()->back() ->with('danger', 'yo can not edit quantity becouse product quantity equal 0! ');

        }
        return redirect()->action([BillController::class,'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bill $bill)
    {
        $bill->delete();
        return redirect()->route('bills.index');
    }

    public function restore(Bill $bill)
    {
        $bill->onlyTrashed()->restore();
        return redirect()->route('bills.index');
    }

    public function fetchDistrict(Request $request)
    {
        $data['districts'] = District::where("gouverne_id", $request->gouverne_id)->get();

        return response()->json($data);
    }

    public function fetchBranch(Request $request)
    {
       
        $data['branches'] = Branch::where("district_id", $request->district_id)->get();

        return response()->json($data);
    }

}
