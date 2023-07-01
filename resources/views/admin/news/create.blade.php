@extends('layouts.admin')

@section('content')

    @if ($errors->any())
        @foreach($errors->all() as $error)
            <x-alert type="danger" :message="$error"></x-alert>
        @endforeach
    @endif
    <form method="POST"
          action="{{ route( $news ? 'admin.news.update' : 'admin.news.store',[ 'news' => $news?:null]) }}"
          enctype="multipart/form-data" style="width: 600px;">
        @csrf
        @if($news)
            @method('put')
        @endif
        <div class="form-group">
            <label class="control-label" for="category_id">Категория:</label>
            <select class="form-control" id="category_id" name="category_id" aria-required="true">
                <option value="0"> -</option>
                @foreach($categories as $cat)
                    <option value="{{$cat->id}}"
                        {{($news && $news->category_id == $cat->id) ? 'selected' :'' }}
                    >{{$cat->category}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label class="control-label" for="status">Заголовок новости</label>
            <input class="form-control" id="title" value=" {{ $news ? $news->title : old('title') }}" name="title"
                   aria-required="true">
        </div>
        <div class="form-group">
            <label class="control-label" for="description">Текст новости</label>
            <textarea class="form-control" id="description" name="description"
                      aria-required="true">{{ $news ? $news->description : old('text') }}</textarea>
        </div>
        <div class="form-group">
            <label class="control-label" for="author">Автор новости</label>
            <input class="form-control" id="author" value=" {{ $news ? $news->author : old('author') }}" name="author"
                   aria-required="true">
        </div>
        <div class="form-group">
            <label class="control-label" for="status">Тип:</label>
            <select class="form-control" id="status" name="status" aria-required="true">
                <option value="draft">draft</option>
                <option value="public">draft</option>
            </select>
        </div>
        <div class="form-group">
            <label class="control-label" for="img">Картинка к новости:</label>
            <input class="form-control" type="file" id="img" name="img">
        </div>
        <button type="submit" class="btn btn-success">Cохранить новость</button>
    </form>
@stop
