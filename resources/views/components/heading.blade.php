@props([
'title' => null,
])
@if($title)
<div class="col heading">
    <h4>{{ __($title) }}</h4>
</div>
@endif
