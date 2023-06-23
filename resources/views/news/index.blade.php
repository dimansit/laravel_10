@extends('layouts.public')
@section('content')
    <div>Новости</div>
    @if($newsList->count())
        @foreach ($newsList as $news)
            <div class="item">
                <div class="text-info">
                    <a class=""
                       href="{{ route('news.category', $news->category_id) }}">
                        {{ $news->category }}
                    </a>

                </div>
                <h2>
                    <a href="{{ route('news.show', $news->id) }}">
                        {{ $news->title }}
                    </a>
                </h2>
            </div>
            <div>
                {!! $news->description  !!}
            </div>
            <div class="text-right">
                {{ $news->author }}
            </div>
            <hr>
        @endforeach
    @else
        <div class="alert alert-danger">Нет новостей в выбранной категории</div>
    @endif
@stop
