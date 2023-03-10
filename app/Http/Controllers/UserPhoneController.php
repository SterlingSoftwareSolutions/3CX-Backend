<?php

namespace App\Http\Controllers;

use App\Models\UserPhone;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as Codes;

class UserPhoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->success(UserPhone::all());
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
            'phone' => 'required|unique:user_phones',
            'user_id' => 'required|exists:users,id'
        ]);

        return response()->success(
            UserPhone::create($request->all()),
            Codes::HTTP_CREATED
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserPhone  $userPhone
     * @return \Illuminate\Http\Response
     */
    public function show(UserPhone $userPhone)
    {
        return response()->success($userPhone);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserPhone  $userPhone
     * @return \Illuminate\Http\Response
     */
    public function edit(UserPhone $userPhone)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserPhone  $userPhone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserPhone  $userPhone)
    {
        $request->validate([
            'phone' => 'sometimes|required|unique:user_phones',
            'user_id' => 'sometimes|required|exists:users,id'
        ]);
        $userPhone->update($request->all());
        return response()->success($userPhone);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserPhone  $userPhone
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserPhone $userPhone)
    {
        $userPhone->delete();
        return response()->success('User Phone Deleted');
    }

    /**
     * Get the specified phone's user
     *
     * @param  \App\Models\UserPhone  $userPhone
     * @return \Illuminate\Http\Response
     */
    public function user(UserPhone $userPhone)
    {
        return response()->success($userPhone->user);
    }
}
