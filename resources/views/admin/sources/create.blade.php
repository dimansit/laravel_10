@extends('layouts.admin')

@section('content')

    <h1>Форму заказа на получение выгрузки данных</h1>
    <form method="POST" action="{{ $source ?  route('admin.sources.update',[ 'source' => $source?:null]) : route('admin.sources.store') }}"
          enctype="multipart/form-data" style="width: 600px;">
        @csrf
        @if($source)
            @method('put')
        @endif
        <div class="form-group">
            <label class="control-label" for="name">Имя источника</label>
            <input class="form-control" id="name" name="name" value=" {{ $source ? $source->name: old('name') }}"
                   aria-required="true">
            @error('name')
            <div style="color:red; font-weight: bold;">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label class="control-label" for="phone">Ссылка на ситочник</label>
            <input class="form-control" placeholder="url" id="url" name="url"
                   value="{{  $source ? $source->url: old('url') }}"
                   aria-required="true">
            @error('url')
            <div style="color:red; font-weight: bold;">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label class="control-label" for="description">Описание источника?</label>
            <textarea class="form-control" id="description"
                      name="description">{{ $source ? $source->description: old('description') }}</textarea>
            @error('description')
            <div style="color:red; font-weight: bold;">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Cохранить источник</button>
    </form>
@stop
