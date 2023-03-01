<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as Codes;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('phone')){
            return Customer::where('phone', $request['phone'])
            ->with('customer_address')
            ->firstOrFail();
        }

        if($request->has('email')){
            return Customer::where('email', $request['email'])
            ->with('customer_address')
            ->firstOrFail();
        }

        return response()->success(
            Customer::with('customer_address')->get()
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
            'phone' => 'required|unique:customers'
        ]);
        $customer = Customer::create($request->all());
        return response()->success(
            $customer,
            Codes::HTTP_CREATED
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  str  $phone
     * @return \Illuminate\Http\Response
     */
    public function show($phone)
    {
        return response()->success(
            Customer::where('phone', $phone)
            ->with('customer_address')
            ->firstOrFail()
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Customer $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  str $phone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $phone)
    {

        $customer = Customer::where('phone', $phone)->firstOrFail();

        $request->validate([
            'phone' => 'sometimes|required|unique:customers,phone,' . $customer->id,
            'email' => 'sometimes|required|unique:customers,email,' . $customer->id,
        ]);

        $customer->update($request->all());

        if($request->phone){
            return response()->success(
                Customer::where('phone', $request->phone)
                ->firstOrFail(),
            );
        }
        return response()->success($customer);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  str $phone
     * @return \Illuminate\Http\Response
     */
    public function destroy($phone)
    {
        $customer = Customer::where('phone', $phone)->firstOrFail();
        $customer->delete();
        return response()->success('Customer Deleted');
    }   

    /**
     * Find resources from storage.
     *
     * @param  str  $name
     * @return \Illuminate\Http\Response
     */
    public function search($name)
    {
        return response()->success(Customer::where('name', 'like', '%' . $name . '%')->get());
    }
}
