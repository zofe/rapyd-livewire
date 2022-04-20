@props([
'title' => null,
'buttons' => null,
'items'=> null,
'pagination'=> null,
])
<div class="rpd-table">
    <form autocomplete="off">
        <div class="d-flex mb-4">
            <div class="flex-grow-1">
                <div class="row g-2">
                    @if($filters ?? '')
                        {{ $filters ?? '' }}
                    @else
                        <div class="col">
                            <x-rpd::input name="search" wire:model="search" placeholder="search..." />
                        </div>
                    @endif
                </div>
            </div>

            <div class="d-flex justify-content-end px-2">
                <div class="mr-2">
                    <div class="btn-group">
                        @if($buttons)
                            {{ $buttons }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="table-small row">
        <div class="table-responsive">

            {{ $slot }}

        </div>
    </div>

    @if($pagination)
        {{ $pagination }}
    @else
        <x-rpd::pagination :items="$items" />
    @endif


</div>
