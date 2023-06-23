@extends('layouts.admin')
@section('title') Новости @parent  @stop
@section('headcontent') - Новости @parent  @stop
@section('content')
<div>Здесь Список Новостей!</div>
@foreach ($newsList as $news)
    <div class="item">
        <div class="text-info">
            <a class=""
                {{ $news->category }}


        </div>
        <h2>
            <a href="{{ route('admin.news.create', ['id'=>$news->id]) }}">
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
@stop
