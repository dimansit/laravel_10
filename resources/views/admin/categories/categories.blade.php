@extends('layouts.admin')
@section('title') Категории! @parent  @stop
@section('headcontent') - Категории @parent  @stop
@section('content')
    @foreach ($categories as $cat)
        <a class="btn btn-sm btn-success"
           href="#">
            {{$cat->category}}
        </a>
    @endforeach
@stop
