<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use Illuminate\Http\Request;
use App\Http\Resources\ArticlesResource;
use App\Http\Resources\ArticlesCollection;
use Illuminate\Support\Facades\Validator;


class ArticlesController extends Controller
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
        $articles = Articles::paginate(10);
        return new ArticlesCollection($articles);
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
            'title' => ['required', 'string', 'max:255', 'unique:articles'],
            'content' => ['required', 'string', 'max:255'],
            'auther_id' => ['required', 'integer'],
        ]);

        if ($validator->fails()) {
            $response['response'] = $validator->messages();
        }else{
            $article = Articles::create($request->all());
            return response()->json([
                'success' => 'Your Record is created',
                'Your info' => $article,
            ], 200);
        }
        return $response;
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $article = Articles::find($id);
        return new ArticlesResource($article);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Articles  $articles
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
