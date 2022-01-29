<div class="">
    <div class="row mb-4">

        <div class="row g-2">
            @section('filters')
                <div class="col">

{{--                    <input wire:model.debounce.250ms="search" class="form-control" type="text" placeholder="search...">--}}
                    <input-component model="search" placeholder="search..." />
                </div>
            @show
        </div>


        <div class="d-flex justify-content-end ml-4">

            <div class="mr-2">
                @yield('buttons')
            </div>
        </div>
    </div>

    <div class="table-small row">
        <div class="table-responsive">
            @yield('table')
        </div>
    </div>

    @section('pagination')
        @if(method_exists($items,'links'))
            <div class="d-flex justify-content-between">
                <div class="form-inline">
                    {{ $items->links() }}
                </div>

                <div class="form-inline">
                    <select wire:model="perPage" class="form-control">
                        <option>5</option>
                        <option>10</option>
                        <option>20</option>
                    </select>
                </div>

                <div class="form-inline d-flex justify-content-end text-right text-muted">
                     tot.{{ $items->total() }}
                </div>
            </div>
        @endif
    @show
</div>


<script type="application/javascript">
</script>
