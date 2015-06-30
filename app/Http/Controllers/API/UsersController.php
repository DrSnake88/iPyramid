<?php

namespace App\Http\Controllers\API;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $digits = 3;

        $last_user = User::orderBy('created_at', 'DESC')->first();

        $code = $last_user ? $last_user->id . rand(pow(10, $digits-1), pow(10, $digits)-1) : 1 . rand(pow(10, $digits-1), pow(10, $digits)-1);

        $user = new User();

        $user->username         = $request->username;
        $user->password         = bcrypt($request->password);
        $user->personalCode     = $code;

        $user->save();

        return response()->json(['result' => 'OK']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show( $username )
    {
        $user = User::where('username', '=', $username)->first();

        if ($user) return response()->json($user);
        else return response()->json(['result' => 'Error']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
