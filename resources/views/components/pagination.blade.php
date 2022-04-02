@props([
'items' => null,
//'perPage' => $__data['_instance']->editRoute,
])

@if($items)
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
@endif
