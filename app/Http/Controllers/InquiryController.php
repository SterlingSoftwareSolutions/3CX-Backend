<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Inquiry;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as Codes;

class InquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inquiries = Inquiry::with([
            'call_type:id,name',
            'customer:id,name,phone',
            'user:id,name',
            'feedback'
        ])->get();

        return response()->success($inquiries);
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
            'user_id' => 'required|exists:users,id',
            'customer_id' => 'required|exists:customers,id',
            'call_type_id' => 'required|exists:call_types,id'
        ]);

        return response()->success(
            Inquiry::create($request->all()),
            Codes::HTTP_CREATED
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $inquiry_with_relations = Inquiry::with([
            'call_type:id,name',
            'customer:id,name',
            'user:id,name',
            'feedback'
        ])->find($id);

        return response()->success([$inquiry_with_relations]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inquiry  $inquiry
     * @return \Illuminate\Http\Response
     */
    public function edit(Inquiry $inquiry)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inquiry  $inquiry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inquiry  $inquiry)
    {
        $request->validate([
            'user_id' => 'exists:users,id',
            'customer_id' => 'exists:customers,id',
            'call_type_id' => 'exists:call_types,id'
        ]);

        $inquiry->update($request->all());
        return response()->success($inquiry);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inquiry $inquiry)
    {
        $inquiry->delete();
        return response()->success("Inquiry Deleted");
    }

    /**
     * Number of open inquiries
     *
     * @return \Illuminate\Http\Response
     */
    public function count()
    {
        return response()->success([
            'total' => Inquiry::count(),
            'open' => Inquiry::where('open', true)->count(),
            'closed' => Inquiry::where('open', false)->count()
        ]);
    }

}
