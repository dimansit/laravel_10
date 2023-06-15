@extends('layouts.public')

@section('content')

    @if ($errors->any())
        @foreach($errors->all() as $error)
            <x-alert type="danger" :message="$error"></x-alert>
        @endforeach
    @endif
    @if($info)
        <div class="alert alert-info">{{$info}}</div>
    @endif
    <h1>Форму заказа на получение выгрузки данных</h1>
    <form method="POST" action="{{ route('source.store') }}" enctype="multipart/form-data" style="width: 600px;">
        @csrf
        <div class="form-group">
            <label class="control-label" for="name">Имя заказчика</label>
            <input class="form-control" id="name" value=" {{ old('name') }}" aria-required="true">
        </div>
        <div class="form-group">
            <label class="control-label" for="phone">Телефон</label>
            <input class="form-control" placeholder="номер телефона" id="phone" name="phone" value="{{ old('phone') }}"
                   aria-required="true">
        </div>
        <div class="form-group">
            <label class="control-label" for="email">Ваш email</label>
            <input class="form-control" placeholder="укажите ваш email" type="email1" name="email" id="email"
                   value="{{ old('email') }}" aria-required="true">
        </div>
        <div class="form-group">
            <label class="control-label" for="info">Какую информацию Вы хотели бы получить?</label>
            <textarea class="form-control" id="info" name="info">{{ old('info') }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Cохранить новость</button>
    </form>
@stop
