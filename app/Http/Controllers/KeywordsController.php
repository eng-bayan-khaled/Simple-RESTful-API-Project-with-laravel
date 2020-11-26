<?php

namespace App\Http\Controllers;

use App\Models\Keywords;
use Illuminate\Http\Request;
use App\Http\Resources\KeywordsResource;
use App\Http\Resources\KeywordsCollection;
use Illuminate\Support\Facades\Validator;


class KeywordsController extends Controller
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
        $Keywords = Keywords::paginate(10);
        return new KeywordsCollection($Keywords);
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
            'name' => ['required', 'string', 'max:255', 'unique:keywords'],
        ]);

        if ($validator->fails()) {
            $response['response'] = $validator->messages();
        }else{
            $Keywords = Keywords::create($request->all());
            return response()->json([
                'success' => 'Your Record is created',
                'Your info' => $Keywords,
            ], 200);
        }
        return $response;
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Keywords  $keywords
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $Keywords = Keywords::find($id);
        return new KeywordsResource($Keywords);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Keywords  $keywords
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Articles::destroy($id);
        return response()->json([
            'Success' => 'The Record is deleted. '
        ], 200);
    }
}
