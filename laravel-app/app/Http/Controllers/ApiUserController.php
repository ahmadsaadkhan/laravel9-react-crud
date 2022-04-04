<?php

namespace App\Http\Controllers;

use App\Models\ApiUsers;
use Illuminate\Http\Request;

class ApiUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->search) {
            $apiUsers = ApiUsers::where('name', 'like', '%'.$request->search.'%')->get();
        } else {
            $apiUsers = ApiUsers::all();
        }
        return response()->json([
            'status' => 200,
            'search' => $request->search,
            'apiUsers' => $apiUsers
        ]);
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
        $apiUsers = new ApiUsers;
        $apiUsers->name = $request->name;
        $apiUsers->job = $request->job;
        $apiUsers->save();
    //    $apiUsers = ApiUsers::all();

        return response()->json([
            'status' => 200,
        //    'apiUsers' => $apiUsers
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $apiUser = ApiUsers::find($id);
        return response()->json([
            'status' => 200,
            'apiUser' => $apiUser
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $apiUsers = ApiUsers::find($id);
        $apiUsers->name = $request->name;
        $apiUsers->job = $request->job;
        $apiUsers->save();

        return response()->json([
            'status' => 200,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $apiUser = ApiUsers::find($id);
        $apiUser->delete();

        return response()->json([
            'status' => 200,
        ]);
    }
}
