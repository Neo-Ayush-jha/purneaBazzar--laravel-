<?php

namespace App\Http\Controllers;

use App\Models\Coupons;
use Illuminate\Http\Request;

class CouponsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['coupon'] = Coupons::all();
        return view('admin.manage.manageCoupons',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.insert.insertCoupon');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
           'code'=>'required', 
           'amount'=>'required', 
           'status'=>'required', 
        ]);
        $coupon = new Coupons();
        $coupon->code = $request->code;
        $coupon->amount = $request->amount;
        $coupon->status = $request->status;
        $coupon->save();

        return redirect()->route('coupon.index')->with('success','Wow! data is inserted successfulley');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Coupons  $coupons
     * @return \Illuminate\Http\Response
     */
    public function show(Coupons $coupons)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Coupons  $coupons
     * @return \Illuminate\Http\Response
     */
    public function edit(Coupons $coupons)
    {
        $data['coupon'] = $coupons;
        return view('admin.edit.editCoupon',$data);
    }
    public function update(Request $request, Coupons $coupons)
    {
        $request->validate([
            'code'=>'required', 
           'amount'=>'required', 
           'status'=>'required', 
        ]);
        $coupons->code = $request->code;
        $coupons->amount = $request->amount;
        $coupons->status = $request->status;
        $coupons->save();
        return redirect()->route('coupon.index')->with('success','Wow! data updated is inserted successfulley');
    }
    public function destroy(Coupons $coupons)
    {
//dd($coupons);;die;

        $coupons->delete();
        return redirect()->route('coupon.index')->with('error','Ho! data is delete successfulley');
    }
}
