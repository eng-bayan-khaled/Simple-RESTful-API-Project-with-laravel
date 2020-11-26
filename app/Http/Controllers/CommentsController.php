<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use Illuminate\Http\Request;
use App\Http\Resources\CommentsResource;
use App\Http\Resources\CommentsCollection;
use Illuminate\Support\Facades\Validator;

class CommentsController extends Controller
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
        $Comments = Comments::paginate(10);
        return new CommentsCollection($Comments);
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
            'title' => ['required', 'string', 'max:255', 'unique:comments'],
            'content' => ['required', 'string', 'max:255'],
            'status' => ['required', 'integer'],
            'article_id' => ['required', 'integer'],
            'user_id' => ['required', 'integer'],
        ]);

        if ($validator->fails()) {
            $response['response'] = $validator->messages();
        }else{
            $Comments = Comments::create($request->all());
            return response()->json([
                'success' => 'Your Record is created',
                'Your data' => $Comments,
            ], 200);
        }
        return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $Comments = Comments::find($id);
        return new CommentsResource($Comments);
    }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Comments::destroy($id);
        return response()->json([
            'Success' => 'The Record is deleted. '
        ], 200);
    }
}
