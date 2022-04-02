
<nav class="navbar navbar-expand-lg navbar-light pb-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Rapyd demo</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="nav nav-tabs">
                <li class="nav-item"><a class="nav-link {{ Request::is('test') ? 'active' : '' }}" href="{{ route("test", "Home") }}"> Home </a></li>
                <li class="nav-item"><a class="nav-link {{ Request::is('test-demo/articles*') ? 'active' : '' }}" href="{{ route("test.articles") }}"> DataTable </a></li>
                <li class="nav-item"><a class="nav-link {{ Request::is('test-demo/article/view*') ? 'active' : '' }}" href="{{ route("test.articles.view", 1) }}"> DataView </a></li>
                <li class="nav-item"><a class="nav-link {{ Request::is('test-demo/article/edit*') ? 'active' : '' }}" href="{{ route("test.articles.edit") }}"> DataEdit </a></li>

            </ul>


        </div>
    </div>
</nav>
