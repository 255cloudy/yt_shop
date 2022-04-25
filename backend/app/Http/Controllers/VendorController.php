<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVendorRequest;
use App\Http\Requests\UpdateVendorRequest;
use App\Models\Vendor;
use App\Http\Resources\VendorResource;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->json([
            'data'=> [
                'vendors'=> VendorResource::collection(Vendor::all())
            ]
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreVendorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVendorRequest $request)
    {
        $validatedData = $request->validate([
            'data.name'=> ['required'],
            'data.photo'=> ['required', 'mimes:png,jpg,jpeg', 'bail']
        ]);
        // handle file uploads
        $filePath = $request->file('photo')->store('images');
        $vendor = Vendor::create([
            'name'=> $validatedData->data->name,
            'photo'=> $filePath,
            'user_id'=> $request->input('user_id')
        ]);
        return response()->json([
            'data'=> [
                'vendor'=> VendorDetailResouce($vendor)
            ]
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function show(Vendor $vendor)
    {
        return response()->json([
            'data'=> ['vendor'=> VendorResource($vendor)]
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVendorRequest  $request
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function updateName(UpdateVendorRequest $request, Vendor $vendor)
    {
        $validate_name = $request->validate([
            'data.name'=> ['required']
        ]);
        $vendor->name = $validate_name->data->name;
        $vendor->save();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVendorRequest  $request
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function updateImage(UpdateVendorRequest $request, Vendor $vendor)
    {
        $request->validate([
            'data.photo'=> ['required', 'mimes:png,jpeg,jpg', 'bail']
        ]);
        $filePath = $request->file('data.photo')->store('images');
        $vendor->photo = $filePath;
        $vendor->save();
        return response()->json([
            'data' => [
                'vendor' => VendorResource::collection($vendor)
            ]
            ]);
    }
}
