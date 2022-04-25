<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMerchRequest;
use App\Http\Requests\UpdateMerchRequest;
use App\Models\Merch;
use App\Http\Resources\MerchDetailsResource;

class MerchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'data'=> [
                'merch'=> MerchDetailsResource::collection(Merch::all())
            ]
            ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMerchRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMerchRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Merch  $merch
     * @return \Illuminate\Http\Response
     */
    public function show(Merch $merch)
    {
        return response()->json(([
            'data'=> [
                'merch'=> MerchDetailsResource($merch)
            ]
        ]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMerchRequest  $request
     * @param  \App\Models\Merch  $merch
     * @return \Illuminate\Http\Response
     */
    public function updateStock(UpdateMerchRequest $request, Merch $merch)
    {
        $stock = $request->safe()->only(['stock']);
        $merch = Merch::find($requst->safe()->only(['merch_id']));
        $merch->stock = $stock;
        $merch->save();
        return MerchDetailsResource($merch);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Merch  $merch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Merch $merch)
    {
        //
    }
}
