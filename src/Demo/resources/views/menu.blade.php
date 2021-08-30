
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="nav nav-tabs">
                <li class="nav-item"><a class="nav-link" href="{{ route("rapyd.demo", "Home") }}"> Home </a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route("rapyd.demo.users", "Users") }}"> Users </a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route("rapyd.demo.articles", "Articles") }}"> Articles </a></li>
            </ul>
        </div>
    </div>
</nav>
