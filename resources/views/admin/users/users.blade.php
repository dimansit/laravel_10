@extends('layouts.admin')
@section('title') Пользователи @parent  @stop
@section('headcontent') - Пользователи @parent  @stop
@section('content')
    @include('components.admin.session')
    <div class="btn-toolbar mb-2 mb-md-0">
        <a class="btn btn-success" href="{{ route('admin.users.create') }}">Добавить пользователя</a>
    </div>
    <table class="table">
        <thead>
        <tr>

            <td>Имя</td>
            <td>email</td>
            <td>email подтвержден</td>
            <td>Админ</td>
            <td></td>
        </tr>
        </thead>
        <tbody>
        @foreach ($usersList as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td> {{ $user->email }}</td>
                <td> {{ $user->email ? : ''}}</td>
                <td>
                    @if($user->isAdmin)
                        <i class="phpdebugbar-fa phpdebugbar-fa-check text-success"></i>
                    @else
                        <i class="phpdebugbar-fa phpdebugbar-fa-times text-danger"></i>
                    @endif
                </td>
                <td>
                    <a class="btn btn-success" href="{{ route('admin.users.edit', ['user'=> $user]) }}">
                        Редкатировать профиль
                    </a>
                </td>
            </tr>
            <hr>
        @endforeach
        </tbody>
    </table>
@stop
