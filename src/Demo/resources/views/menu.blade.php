
<nav class="navbar navbar-expand-lg navbar-light pb-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Rapyd demo</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="nav nav-tabs">
                <li class="nav-item"><a class="nav-link {{ Request::is('rapyd-demo') ? 'active' : '' }}" href="{{ route("rapyd.demo", "Home") }}"> Home </a></li>
{{--                <li class="nav-item"><a class="nav-link {{ Request::is('rapyd-demo/users*') ? 'active' : '' }}" href="{{ route("rapyd.demo.users", "Users") }}"> Users </a></li>--}}
                <li class="nav-item"><a class="nav-link {{ Request::is('rapyd-demo/articles*') ? 'active' : '' }}" href="{{ route("rapyd.demo.articles") }}"> DataTable </a></li>
                <li class="nav-item"><a class="nav-link {{ Request::is('rapyd-demo/article/*') ? 'active' : '' }}" href="{{ route("rapyd.demo.articles.edit", ['article'=>1]) }}"> DataEdit </a></li>
            </ul>


        </div>
    </div>
</nav>
