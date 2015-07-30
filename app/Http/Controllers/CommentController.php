<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Input;
use Illuminate\Support\Facades\Redirect;
use App\Comment;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CommentController extends Controller
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
        $article_id = Input::get('article_id');
        $name = Input::get('name');
        $email = Input::get('email');
        $body = Input::get('body');
        $type = Input::get('type');
        $slug = Input::get('slug');
        $comment = Comment::create(array
            ("article_id" => $article_id,
             "name" =>$name,
            "email"=>$email,
            "body" => $body,
            "created_at"=> \Carbon\Carbon::now()
                
            ));
        $comment->save();
        
        return Redirect::to('/'.$type."/".$slug."#comment");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
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
