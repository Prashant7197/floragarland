<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use App\Http\Requests\StoreVendorRequest;
use App\Http\Requests\UpdateVendorRequest;
use Illuminate\Support\Facades\Hash;

class VendorController extends Controller
{
   
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vendors = Vendor::all();
        return view('admin.vendor.index', compact('vendors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.vendor.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVendorRequest $request)
    {
        $vendor = new Vendor();
        $vendor->name = $request->name;
        $vendor->contact = $request->contact;
        $vendor->address = $request->address;
        $vendor->password = Hash::make($request->password);
        $vendor->email = $request->email;
        $vendor->profile = $request->profile;
        if (isset($request->status)) {
            if ($request->status == "on") {
                $vendor->status = true;
            } else {
                $vendor->status = false;
            }
        } else {
            $vendor->status = false;
        }
        $imageName = rand(1000, 9999) . time() . '.' . $request->profile->extension();

        $request->profile->move('images/vendor', $imageName);
        $vendor->profile = $imageName;

        $vendor->save();
        $vendors = Vendor::all();
        // App('App\Htt p\Controllers\backendController')->sendsms(['name' => 'dad', 'subject' => 'dadsa', 'massege' => 'fsdffsfsdfsfer']);
        return view('admin.vendor.index', compact('vendors'))->with('msg', 'Vendore successfully added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vendor $vendor)
    {
        return view('admin.vendor.view', compact($vendor));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vendor $vendor)
    {
        // return $vendor;

        return view('admin.vendor.edit', compact('vendor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVendorRequest $request, Vendor $vendor)
    {
        $vendor->name = $request->name;
        $vendor->contact = $request->contact;
        $vendor->email = $request->email;
        $vendor->address = $request->address;
        $vendor->status = 1;
        if (isset($request->status)) {
            if ($request->status == "on") {
                $vendor->status = true;
            } else {
                $vendor->status = false;
            }
        }else{
            
            $vendor->status = false;
        }
        if (isset($request->profile)) {
            unlink('images/vendor/' . $vendor->profile);
            $profileName = rand(1000, 9999) . time() . '.' . $request->profile->extension();

            $request->profile->move('images/vendor', $profileName);
            $vendor->profile = $profileName;
        }
        $vendor->update();
        $vendors = Vendor::all();
        // App('App\Http\Controllers\backendController')->sendsms(['name' => 'dad', 'subject' => 'dadsa', 'massege' => 'fsdffsfsdfsfer']);
        return view('admin.vendor.index', compact('vendors'))->with('msg', 'Vendore successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vendor $vendor)
    {
        $vendor->delete();
        $vendors = Vendor::all();
        return view('admin.vendor.index', compact('vendors'))->with('msg', 'Vendore successfully deleted');
    }
}
