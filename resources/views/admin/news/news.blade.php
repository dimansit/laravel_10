@extends('layouts.admin')
@section('title') Новости @parent  @stop
@section('headcontent') - Новости @parent  @stop
@section('content')
    <div class="btn-toolbar mb-2 mb-md-0">
        <a class="btn btn-success" href="{{ route('admin.news.create') }}">Добавить новость</a>
    </div>
    @foreach ($newsList as $news)
        <div class="item">
            <div class="text-info">

                {{ $news->categories ? $news->categories->category : $news->category_id }}
            </div>
            <h2>
                <a href="{{ route('admin.news.edit',['news'=>$news]) }}">
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
