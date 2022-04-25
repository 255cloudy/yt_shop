<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMerch_typesRequest;
use App\Http\Requests\UpdateMerch_typesRequest;
use App\Models\Merch_types;

class MerchTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response(200)->json([
            'data'=> [
                'types'=> Merch_types::all()
            ]
        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMerch_typesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMerch_typesRequest $request)
    {
        $validatedData = $request->validate(
            ['data.name'=> ['required']]
        );
        // save the data in the db
        $type = Merch_types::create([
            'name' => $validatedData.data.name
        ]);
        //return the object as json 
        return $response(200)->json([
            'data'=> [
                'type'=> $type
            ]
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Merch_types  $merch_types
     * @return \Illuminate\Http\Response
     */
    public function show(Merch_types $merch_types)
    {
        return response()->json([
            'data'=> [
                'type' => $merch_types
            ]
            ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMerch_typesRequest  $request
     * @param  \App\Models\Merch_types  $merch_types
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMerch_typesRequest $request, Merch_types $merch_types)
    {
        $merch_types->name = $request->name;
        $merch_types->save();
        return response()->json([
            'data' => [
                'type'=> $merch_types
            ]
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Merch_types  $merch_types
     * @return \Illuminate\Http\Response
     */
    public function destroy(Merch_types $merch_types)
    {
        //
    }
}
