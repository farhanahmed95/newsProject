@extends('tnr.master.app')

@section('page-title')
{{ $article->type }}
@stop

@section('page-content')
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
            <div class="">
                <img src="{{ $article->image_url }}" class="img-responsive">
            </div>
            <div class="">
                <div class="caption">
                    <h1>{{ $article->heading }}</h1>
                    <p>{{ $article->sub_heading }}</p>
                    <p>Published {{ $article->getDate() }} | Posted By <a href="#">{{ $article->author }}</a></p>
                </div>
                <hr/>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
                        <article>{{ $article->body }}</article>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
                        <a href="{{ $article->source_url }}">Read More</a>
                        <hr/>
                    </div>

                </div>
                <div class="row">
                    <div class="col-sm-12 col-sm-12 col-md-10 col-lg-10">
                        <h2 id="comment">Comments</h2>
                        <div class="container">
                            <div class="col-sm-12 col-sm-12 col-md-10 col-lg-10">

                                <form class="form" action="{{ URL::route('tnr.commentCreate') }}" method="post">
                                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                    <input type="text" name="article_id" hidden value="{{ $article->id }}"/>
                                    <input type="text" name="type" hidden value="{{ $article->type }}"/>
                                    <input type="text" name="slug" hidden value="{{ $article->slug }}"/>


                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" required placeholder="Name"/>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" required placeholder="Email"/>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" name="body" required placeholder="Write Here"></textarea>
                                    </div>
                                    <input type="submit" class="btn btn-success"/>
                                </form>
                            </div>
                        </div>
                        <hr/>
                        @foreach($comments as $comment)
                        <blockquote class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
                            <h4>{{ $comment->name}} Says...</h4>
                            <q><i>{{ $comment->body }} </i></q>
                        </blockquote>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@stop