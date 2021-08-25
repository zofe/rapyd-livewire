<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Rapyd Livewire Widgets')</title>
    <meta name="description" content="@yield('description', 'crud widgets for laravel. datatable, grids, forms, in a simple package')" />
    @section('meta', '')

    <link href="//fonts.googleapis.com/css?family=Bitter" rel="stylesheet" type="text/css" />
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

</head>
<body>

<div id="wrap">

    <div class="container">

        <br />

        <div class="row">

            <div class="col-sm-12">
                @yield('content')
            </div>

        </div>


    </div>



</div>

<div id="footer">
</div>

</body>
</html>
