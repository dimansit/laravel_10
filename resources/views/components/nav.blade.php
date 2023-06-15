<nav class="container navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Laravel</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="/">Главная</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('news') }}">Новости</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('newscategoryes') }}">Категории новостей</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('source.create') }}">Загрузка данных</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/about">О проекте</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">Вход</a>
            </li>
        </ul>

    </div>
</nav>
