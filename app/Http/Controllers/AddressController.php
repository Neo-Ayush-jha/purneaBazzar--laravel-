<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use App\Http\Controllers\PublicController;
use Auth;
class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['address'] = Address::all();
        return view('admin.manage.addressManagement',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['user']=User::all();
        $data['address'] =Address::all();
        return view('admin.insert.insertAddress',$data);
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
            'user_id'=>'required',
            'street'=>'required',
            'landmark'=>'required',
            'pincode'=>'required',
            'city'=>'required',
            'state'=>'required',
            'name'=>'required',
            'contact'=>'required',
        ]);
        $data=new Address();
        $data->user_id=$request->user_id;
        $data->user_id=Auth::id();
        $data->street=$request->street;
        $data->landmark=$request->landmark;
        $data->pincode=$request->pincode;
        $data->city=$request->city;
        $data->state=$request->state;
        $data->name=$request->name;
        $data->contact=$request->contact;
        $data->type=$request->type;
        $data->save();
        PublicController::assignAddress($data->id);
        return redirect()->route('checkout');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function show(Address $address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function edit(Address $address)
    {
        $data['user'] = user::all();
        $data['address'] = $address;
        return view('admin.edit.editAddress',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Address $address)
    {
        {
            $request->validate([
                'user_id'=>'required',
                'street'=>'required',
                'landmark'=>'required',
                'pincode'=>'required',
                'city'=>'required',
                'state'=>'required',
                'name'=>'required',
                'contact'=>'required',
            ]);
            $data->user_id=Auth::id();
            $data->street=$request->street;
            $data->landmark=$request->landmark;
            $data->pincode=$request->pincode;
            $data->city=$request->city;
            $data->state=$request->state;
            $data->name=$request->name;
            $data->contact=$request->contact;
            $data->type=$request->type;
            $data->save();
            return redirect()->route('address.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy(Address $address)
    {
        $address->delete();
        return redirect()->route('address.index');

    }
}
