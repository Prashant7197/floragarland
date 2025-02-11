<?php

namespace App\Http\Controllers;

use App\Models\lawn;
use App\Models\Vendor;
use Illuminate\Http\Request;

class LawnController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lawns = lawn::all();
        return view('admin.lawn.index', compact('lawns'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $vendors = Vendor::all();
        return view('admin.lawn.new',compact('vendors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $lawn = new Lawn();
        $lawn->name = $request->name;
        $lawn->contact = $request->contact;
        $lawn->vendor_id = $request->vender;
        $lawn->address = $request->address;
        $lawn->desription = $request->description;
        $lawn->specification = $request->specification;
        $lawn->locality = $request->locality;
        $lawn->price = $request->price;
        $lawn->email = $request->email;
        if (isset($request->status)) {
            if ($request->status == "on") {
                $lawn->status = true;
            } else {
                $lawn->status = false;
            }
        } else {
            $lawn->status = false;
        }

        

        $images = [];

        foreach ($request->profile as $image) {
            $fileName = uniqid(rand(1000, 9999) . time() ) . '.' . $image->getClientOriginalExtension();
            $image_path =  $image->move('images/lawn', $fileName);

            array_push($images,"images/lawn/".$fileName);
        }
        
        $lawn->images = implode(',',$images);

        $lawn->save();
        // return $lawn;
        $lawns = lawn::all();
        // App('App\Htt p\Controllers\backendController')->sendsms(['name' => 'dad', 'subject' => 'dadsa', 'massege' => 'fsdffsfsdfsfer']);
        return view('admin.lawn.index', compact('lawns'))->with('msg', 'lawn successfully added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lawn $lawn)
    { 
        $vendors = Vendor::all();
        return view('admin.lawn.view', compact('lawn','vendors'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lawn $lawn)
    {
        // return $vendor;

        $vendors = Vendor::all();
        return view('admin.lawn.edit', compact('lawn','vendors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lawn $lawn)
    {
        $lawn->name = $request->name;
        $lawn->contact = $request->contact;
        $lawn->vendor_id = $request->vender;
        $lawn->address = $request->address;
        $lawn->desription = $request->description;
        $lawn->specification = $request->specification;
        $lawn->locality = $request->locality;
        $lawn->price = $request->price;
        $lawn->email = $request->email;
        if (isset($request->status)) {
            if ($request->status == "on") {
                $lawn->status = true;
            } else {
                $lawn->status = false;
            }
        } else {
            $lawn->status = false;
        }

        

        // $images = [];

        // foreach ($request->profile as $image) {
        //     $fileName = uniqid(rand(1000, 9999) . time() ) . '.' . $image->getClientOriginalExtension();
        //     $image_path =  $image->move('images/lawn', $fileName);

        //     array_push($images, $image_path);
        // }
        
        // $lawn->images = implode(',',$images);

        $lawn->update();
        // return $lawn;
        $lawns = lawn::all();
        $vendors = Vendor::all();
        // App('App\Http\Controllers\backendController')->sendsms(['name' => 'dad', 'subject' => 'dadsa', 'massege' => 'fsdffsfsdfsfer']);
        return view('admin.vendor.index', compact('lawns','vendors'))->with('msg', 'Vendore successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lawn $lawn)
    {
        $lawn->delete();
        $lawns = Vendor::all();
        return view('admin.lawn.index', compact('lawns'))->with('msg', 'Vendore successfully deleted');
    }
}
