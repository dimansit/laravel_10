@extends('layouts.admin')

@section('content')
    @include('components.admin.session')
    @if ($errors->any())
        @foreach($errors->all() as $error)
            <x-alert type="danger" :message="$error"></x-alert>
        @endforeach
    @endif

    @if(session('error'))
        <div style="color:red; font-weight: bold;">{{ $message }}</div>
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
                        {{($news && $news->category_id == $cat->id || (!$news && old('category_id') == $cat->id))  ? 'selected' :'' }}
                    >{{$cat->category}}</option>
                @endforeach
            </select>
            @error('category_id')
            <div style="color:red; font-weight: bold;">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label class="control-label" for="status">Заголовок новости</label>
            <input class="form-control" id="title" value=" {{ $news ? $news->title : old('title') }}" name="title"
                   aria-required="true">
            @error('title')
            <div style="color:red; font-weight: bold;">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label class="control-label" for="description">Текст новости</label>
            <textarea class="form-control" id="description" name="description"
                      aria-required="true">{{ $news ? $news->description : old('text') }}</textarea>
            @error('description')
            <div style="color:red; font-weight: bold;">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label class="control-label" for="author">Автор новости</label>
            <input class="form-control" id="author" value=" {{ $news ? $news->author : old('author') }}" name="author"
                   aria-required="true">
            @error('author')
            <div style="color:red; font-weight: bold;">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label class="control-label" for="status">Тип:</label>
            <select class="form-control" id="status" name="status" aria-required="true">
                @foreach($status as $value)
                    <option
                        {{($news && $news->status == $value || (!$news && old('status') == $value))  ? 'selected' :'' }}
                        value="{{$value}}">{{$value}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label class="control-label" for="img">Картинка к новости:</label>
            <img style="width: 100px;" src="{{ Storage::disk('public')->url($news->image) }}" alt="Изображение к новости">
            <input class="form-control" type="file" id="img" name="img">
        </div>
        <button type="submit" class="btn btn-success">Cохранить новость</button>
    </form>
    @push('js')
        <script>
            ClassicEditor
                .create(document.querySelector('#description'))
                .catch(error => {
                    console.error(error);
                });
        </script>
    @endpush
@stop
