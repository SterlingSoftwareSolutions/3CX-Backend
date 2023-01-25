<?php

namespace App\Http\Controllers;

use App\Models\CustomerAddress;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as Codes;

class CustomerAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->success(
                CustomerAddress::with([
                    'customer_location:id,name'
                ])->get()
        );
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
            'customer_id' => 'required|exists:customers,id',
            'customer_location_id' => 'exists:customer_locations,id'
        ]);

        return response()->success(
            CustomerAddress::create($request->all()),
            Codes::HTTP_CREATED
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customerAddress = CustomerAddress::with([
            'customer_location:id,name',
        ])->find($id);

        return response()->success($customerAddress);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CustomerAddress  $customerAddress
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomerAddress $customerAddress)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CustomerAddress  $customerAddress
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CustomerAddress $customerAddress)
    {
        $request->validate([
            'customer_id' => 'exists:customers,id',
            'customer_location_id' => 'exists:customer_locations,id'
        ]);

        $customerAddress->update($request->all());
        return response()->success($customerAddress);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CustomerAddress  $customerAddress
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomerAddress $customerAddress)
    {
        $customerAddress->delete();
        return response()->success('Customer Address Deleted');
    }

    /**
     * find the customer this address is for
     *
     * @param  \App\Models\CustomerAddress  $customerAddress
     * @return \Illuminate\Http\Response
     */
    public function customer(CustomerAddress $customerAddress)
    {
        return response()->success(
            $customerAddress->customer
        );
    }
}
