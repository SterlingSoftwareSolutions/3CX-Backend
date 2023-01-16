<?php

namespace App\Http\Controllers;

use App\Models\FollowUp;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as Codes;

class FollowUpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->success(FollowUp::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
            'time' => 'required|date',
            'inquiry_id' => 'required|exists:inquiries,id',
            'user_id' => 'required|exists:users,id',
            'customer_id' => 'required|exists:customers,id',
        ]);

        return response()->success(
            FollowUp::create($request->all()),
            Codes::HTTP_CREATED
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FollowUp  $followUp
     * @return \Illuminate\Http\Response
     */
    public function show(FollowUp $followUp)
    {
        return response()->success($followUp);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FollowUp  $followUp
     * @return \Illuminate\Http\Response
     */
    public function edit(FollowUp $followUp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FollowUp  $followUp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FollowUp $followUp)
    {
        $request->validate([
            'inquiry_id' => 'exists:inquiries,id',
            'user_id' => 'exists:users,id',
            'customer_id' => 'exists:customers,id',
        ]);

        $followUp->update($request->all());
        return response()->success($followUp);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FollowUp  $followUp
     * @return \Illuminate\Http\Response
     */
    public function destroy(FollowUp $followUp)
    {
        $followUp->delete();
        return response()->success("Follow Up Deleted");
    }
}
