@extends('layouts.public')
@section('content')
    <form class="form-horizontal" id="login_form" method="POST" action="/login/auth/" role="form">
        <h1 class="main_subhead ">
            <span class="header">Выполнить вход на сайт</span>
            <span></span>
        </h1>
        <input type="hidden" id="redirect" name="redirect" value="" style="">
        <div class="form-group">
            <label class="control-label col-xs-3" for="login">Учетная запись:</label>
            <div class="col-xs-9">
                <input type="text" class="form-control" id="login_login" placeholder="введите login, телефон или email"
                       name="login" aria-required="true" aria-describedby="firstname-error" aria-invalid="true">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-xs-3" for="password_login">Пароль:</label>
            <div class="col-xs-9">
                <input type="password" aria-required="true" class="form-control" id="password_login" name="password"
                       aria-invalid="true" placeholder="Введите пароль">
            </div>
        </div>
        <div class="form-group">
            <input type="checkbox" name="savemy"> Запомнить меня
        </div>
        <div class="form-group">
            <div class="col-xs-offset-3 col-xs-9">
                <input type="submit" class="btn btn-primary" value="Войти">
                <a href="/main/passrecovery/" class="btn btn-danger">Забыли пароль</a>
            </div>
        </div>
    </form>
@stop
