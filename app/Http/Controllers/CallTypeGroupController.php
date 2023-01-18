<?php

namespace App\Http\Controllers;

use App\Models\CallTypeGroup;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as Codes;

class CallTypeGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->success(CallTypeGroup::all());
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
            'id' => 'unique:call_type_groups,id',
            'name' => 'required|unique:call_type_groups,name',
            'comment' => 'string'
        ]);

        return response()->success(
            CallTypeGroup::create($request->all()),
            Codes::HTTP_CREATED
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CallTypeGroup  $callTypeGroup
     * @return \Illuminate\Http\Response
     */
    public function show(CallTypeGroup $callTypeGroup)
    {
        return response()->success($callTypeGroup);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CallTypeGroup  $callTypeGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(CallTypeGroup $callTypeGroup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CallTypeGroup  $callTypeGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CallTypeGroup $callTypeGroup)
    {
        $request->validate([
            'name' => 'sometimes|required|unique:call_type_groups,name',
            'id' => 'sometimes|required|unique:call_type_groups,id',
        ]);

        $callTypeGroup->update($request->all());
        return response()->success($callTypeGroup);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CallTypeGroup  $callTypeGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(CallTypeGroup $callTypeGroup)
    {
        $callTypeGroup->delete();
        return response()->success("Call Type Group Deleted");
    }
}
