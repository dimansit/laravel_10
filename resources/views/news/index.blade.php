@extends('layouts.public')
@section('content')
    <div>Новости</div>
    @foreach ($newsList as $id=>$news)
        <div class="item">
            <div class="text-info">
                <a class=""
                   href="{{ route('news.category', $news['category']) }}">
                    {{ $categories[$news['category']] }}
                </a>

            </div>
            <h2>
                <a href="{{ route('news.show', $id) }}">
                    {{ $news['title'] }}
                </a>
            </h2>
        </div>
        <div>
            {!! $news['description']  !!}
        </div>
        <div class="text-right">
            {{ $news['author'] }}
        </div>
        <hr>
    @endforeach
@stop
