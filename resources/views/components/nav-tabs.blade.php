@props([
'title' => null,
'class' => [],
])
@php
    $attributes = $attributes->class([
        'navbar navbar-expand-lg',
    ])->merge([
    ]);
@endphp

<nav {{ $attributes }}>
    <div class="container-fluid">
        @if($title)
            <a class="navbar-brand" href="/">{{ $title }}</a>
        @endif
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="bi bi-grip-horizontal"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="nav nav-tabs">
                {{ $slot }}
            </ul>
        </div>
    </div>
</nav>
