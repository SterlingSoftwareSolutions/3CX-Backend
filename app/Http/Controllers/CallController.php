<?php

namespace App\Http\Controllers;

use App\Models\Call;
use App\Models\Inquiry;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as Codes;

class CallController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->success(Call::all());
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
    {
        $request->validate([
            'inquiry_id' => 'required|exists:inquiries,id',
            'user_id' => 'required|exists:users,id',
            'customer_id' => 'required|exists:customers,id',
        ]);

        return response()->success(
            Call::create([
                'time' => $request->time,
                'status_remark' => Inquiry::find($request->inquiry_id)
                                   ->status_remark,
                'inquiry_id' => $request->inquiry_id,
                'user_id' => $request->user_id,
                'customer_id' => $request->customer_id,
            ]),
            Codes::HTTP_CREATED
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Call  $call
     * @return \Illuminate\Http\Response
     */
    public function show(Call $call)
    {
        return response()->success($call);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Call  $call
     * @return \Illuminate\Http\Response
     */
    public function edit(Call $call)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Call  $call
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Call $call)
    {
        $request->validate([
            'inquiry_id' => 'exists:inquiries,id',
            'user_id' => 'exists:users,id',
            'customer_id' => 'exists:customers,id',
        ]);

        $call->update($request->all());
        return response()->success($call);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Call  $call
     * @return \Illuminate\Http\Response
     */
    public function destroy(Call $call)
    {
        $call->delete();
        return response()->success("Call Deleted");
    }
}
