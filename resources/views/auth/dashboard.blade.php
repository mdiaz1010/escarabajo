@extends('layouts.app') @section('title','') @section('content')

<h3 class="title-from left">Ultimos articulos</h3>
<div class="row" class="col-md-12">
    <div class="col-md-9">
        <div class="row">
            @foreach($articles as $article)
            <div class="col-md-6">
                <div class="panel-body">
                    <a href="{{route('view.article',$article->slug)}}" class="thumbnail">
                        @foreach($article->images as $image)
                        <img class="img-responsive img-article" src="/images/articles/{{$image->name}}" alt="..."> @endforeach
                    </a>
                    <a href="{{route('view.article',$article->slug)}}">
                            <h3 class="text-center">{{$article->title}}</h3>
                    </a>

                    <hr>
                    <i class="fa fa-folder-open-o"></i>
                    <a href="{{ route('search.category',$article->category->name) }}">{{$article->category->name}}</a>
                    <div class="pull-right">
                        <i class="fa fa-clock-o"></i>{{$article->created_at->diffForHumans()}}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center">
            {!! $articles->render() !!}
        </div>
    </div>
        <div class="col-md-3 aside">
            @include('admin.templates.partials.aside')
        </div>


</div>

@endsection