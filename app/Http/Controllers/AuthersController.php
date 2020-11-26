<?php

namespace App\Http\Controllers;

use App\Models\Authers;
use Illuminate\Http\Request;
use App\Http\Resources\AuthersResource;
use App\Http\Resources\AuthersCollection;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AuthersController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $articles = Authers::paginate(10);
        return new AuthersCollection($articles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $response = array('response' => '', 'success'=>false);
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'string', 'max:255', 'unique:authers'],
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            $response['response'] = $validator->messages();
        }else{
            $request['password'] = Hash::make($request->password);
            $Authers = Authers::create($request->all());
            return response()->json([
                'success' => 'Your Record is created',
                'Your info' => $Authers,
            ], 200);
        }
        return $response;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Authers  $authers
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $Authers = Authers::find($id);
        return new AuthersResource($Authers);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Authers  $authers
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Authers::destroy($id);
        return response()->json([
            'Success' => 'The Record is deleted. '
        ], 200);
    }
}
