<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $main_heading = DB::table('articles')->where('importance','=',1)->orderBy('id','desc')->take(1)->get();
        
        $hot_news = DB::table('articles')->where('importance','=',1)->where('id','<>',$main_heading[0]->id)->orderBy('id','desc')->take(5)->get();
        
        $world = DB::table('articles')->where('type','=','World')->orderBy('id','desc')->take(5)->get();
        $sports = DB::table('articles')->where('type','=','Sports')->orderBy('id','desc')->take(5)->get();
        $health = DB::table('articles')->where('type','=','Health')->orderBy('id','desc')->take(5)->get();
        $business = DB::table('articles')->where('type','=','Business')->orderBy('id','desc')->take(5)->get();
        $entertainment = DB::table('articles')->where('type','=','Entertainment')->orderBy('id','desc')->take(5)->get();
        $food = DB::table('articles')->where('type','=','Food')->orderBy('id','desc')->take(5)->get();
        $lifestyle = DB::table('articles')->where('type','=','LifeStyle')->orderBy('id','desc')->take(5)->get();
        $tech = DB::table('articles')->where('type','=','Tech')->orderBy('id','desc')->take(5)->get();

        $data = array(
            "main_heading"=>$main_heading,
            "hot_news"=>$hot_news,
            "featured_section"=>array(
                $world,
                $sports,
                $entertainment,
                $business,
                $health,
                $food,
                $lifestyle,
                $tech
                ));
        //return Response::json(array($world,$sports));
        return view('tnr.index')->with($data);
        //return $hot_news;
    }

    public function type($type)
    {
        $articles = DB::table('articles')->where('type','=',$type)->orderBy('id','desc')
        ->get();
        return view('tnr.article',['type'=>$type])->with('articles',$articles);
    }
    public function articleByJson($type)
    {
        $articles = DB::table('articles')->where('type','=',$type)->orderBy('id','desc')
        ->get();
        return $articles;
    }
    public function show($type,$slug)
    {
       $article = \App\Article::whereRaw('slug = ? and type = ?',array($slug,$type))->firstOrFail();
       $comments =  \App\Comment::where('article_id','=',$article->id)->latest()->take(10)->get();
       
       $data = ["article"=>$article,"comments"=>$comments];
       return view('tnr.show')->with($data);
    }
}
