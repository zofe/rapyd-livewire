<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Rapyd Livewire Widgets')</title>
    <meta name="description" content="@yield('description', 'crud widgets for laravel. datatable, grids, forms, in a simple package')" />
    @section('meta', '')

    <link href="//fonts.googleapis.com/css?family=Bitter" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.1/css/bootstrap.min.css" integrity="sha512-6KY5s6UI5J7SVYuZB4S/CZMyPylqyyNZco376NM2Z8Sb8OxEdp02e1jkKk/wZxIEmjQ6DRCEBhni+gpr9c4tvA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @livewireStyles
    @rapydStyles
</head>
<body>
<div id="app">


    <div class="container py-3">
        <header>
            @include('rpd-demo::menu')


            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <x-rpd-breadcrumbs class="breadcrumb-item" active="active" />
                </ol>
            </nav>



        </header>

        <main>
            @section('main-content')
                <div class="row">
                    <div class="col-sm-12 gx-5">
                        @yield('content')
                    </div>
                </div>
            @show
        </main>
    </div>
</div>


<div id="footer">
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.1/js/bootstrap.min.js" integrity="sha512-ewfXo9Gq53e1q1+WDTjaHAGZ8UvCWq0eXONhwDuIoaH8xz2r96uoAYaQCm1oQhnBfRXrvJztNXFsTloJfgbL5Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
@livewireScripts
@rapydScripts

</body>
</html>
