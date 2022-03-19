<div class="rpd-table">
    <form autocomplete="off">
        <div class="d-flex mb-4">
            <div class="flex-grow-1">
                <div class="row g-2">
                    @section('filters')
                        <div class="col">
                            <x-rpd::input name="search" wire:model="search" placeholder="search..." />
                        </div>
                    @show
                </div>
            </div>

            <div class="d-flex justify-content-end px-2">
                <div class="mr-2">
                    @yield('buttons')
                </div>
            </div>
        </div>
    </form>
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
