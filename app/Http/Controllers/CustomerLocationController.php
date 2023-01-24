<?php

namespace App\Http\Controllers;

use App\Models\CustomerLocation;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as Codes;

class CustomerLocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->success(CustomerLocation::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name' => 'required|unique:customer_locations'
        ]);

        return response()->success(
            CustomerLocation::create($request->all()),
            Codes::HTTP_CREATED
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CustomerLocation  $customerLocation
     * @return \Illuminate\Http\Response
     */
    public function show(CustomerLocation $customerLocation)
    {
        return response()->success($customerLocation);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CustomerLocation  $customerLocation
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomerLocation $customerLocation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CustomerLocation  $customerLocation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CustomerLocation $customerLocation)
    {
        $request->validate([
            'name' => 'sometimes|required|unique:customer_locations'
        ]);

        $customerLocation->update($request->all());
        return response()->success($customerLocation);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CustomerLocation  $customerLocation
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomerLocation $customerLocation)
    {
        $customerLocation->delete();
        return response()->success("Customer Location Deleted");
    }
}
