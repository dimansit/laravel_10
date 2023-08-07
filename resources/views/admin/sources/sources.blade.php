@extends('layouts.admin')
@section('title') Источники новостей @parent  @stop
@section('headcontent') -  Источники новостей @parent  @stop
@section('content')
    @include('components.admin.session')
    <div class="btn-toolbar mb-2 mb-md-0">
        <a class="btn btn-success" href="{{ route('admin.sources.create') }}">Добавить источник</a>
    </div>
    @csrf
    @foreach ($sourcesList as $source)
        <div class="item" id="{{ $source->id }}">

            <div class="text-danger">
                Новостей из данного источника {{$source->news->count() }}
            </div>
            <h5>
                {{ $source->name }}
            </h5>
            <div>
                <a class="btn btn-sm btn-primary" href="{{ route('admin.sources.edit',['source'=>$source]) }}">
                    Редкатировать
                </a>
                <a class="btn btn-sm btn-danger"
                   href="#"
                   onclick="delSource( {{$source->id}})" style="margin-bottom: 10px;">
                    Удалить источник
                </a>
                <a class="btn btn-sm btn-danger"
                   href="#"
                   onclick="parseSource( {{$source->id}})" style="margin-bottom: 10px;">
                    Загрузить новости с источника в базу
                </a>
            </div>
            <div><strong>{{$source->url}}</strong></div>
        </div>
        <div>
            {!! $source->description  !!}
        </div>
        <div class="text-right">
            {{ $source->author }}
        </div>
        <hr>
    @endforeach
@stop
<script>

    let parseSource = (sourceId) => {
        let data = new FormData();
        data.append('id', sourceId);

        data.append('_token', document.getElementsByName('_token')[0].value);
        fetch(`/admin/sources/parse`, {

        })
            .then(res => res.json())
            .then(res => {
                if (res.err == 0) {
                    document.getElementById(sourceId).remove();
                }
            })
            .catch(e => alert(e.message));
    }

    let delSource = (sourceId) => {
        if (confirm('Вы точно хотите удалить источник информации!')) {
            let data = new FormData();
            data.append('id', sourceId);
            data.append('_method', 'DELETE');
            data.append('_token', document.getElementsByName('_token')[0].value);
            fetch(`/admin/sources/${sourceId}`, {
                method: 'POST',
                body: data
            })
                .then(res => res.json())
                .then(res => {
                    if (res.err == 0) {
                        document.getElementById(sourceId).remove();
                    }
                })
                .catch(e => alert(e.message));
        }
    }
</script>
