<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item @if(request()->routeIs('admin.news.index')) active @endif">
                <a class="nav-link " href="{{ route('admin.news.index') }}">
                    <span data-feather="home"></span>
                    Ноаости <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item @if(request()->routeIs('admin.categories.index')) active @endif">
                <a class="nav-link " href="{{ route('admin.categories.index') }}">
                    <span data-feather="file"></span>
                    Категории
                </a>
            </li>
            <li class="nav-item @if(request()->routeIs('admin.sources.index')) active @endif">
                <a class="nav-link " href="{{ route('admin.sources.index') }}">
                    <span data-feather="file"></span>
                    Источники
                </a>
            </li>
        </ul>
    </div>
</nav>
