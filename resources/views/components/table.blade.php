@props([
'title' => null,
'buttons' => null,
'items'=> null,
'pagination'=> null,
'filters'=>null,
'actions'=>null
])
<div class="rpd-table">
    <form autocomplete="off">
        <div><x-rpd::heading :title="$title" /></div>
        <div class="d-flex mb-4">
            <div class="flex-grow-1">
                <div class="row g-2">
                    {{ $filters }}
                    <x-rpd::button-group :buttons="$buttons" />
                </div>
            </div>
        </div>
    </form>
    <div class="table-small row">
        <div class="table-responsive">
            {{ $slot }}
        </div>
    </div>

    <div class="d-flex">
        <div class="flex-grow-1">
            <div class="row g-2">
                <x-rpd::pagination :items="$items" />
                <x-rpd::button-group :buttons="$actions" position="center" />
            </div>
        </div>
    </div>

</div>
