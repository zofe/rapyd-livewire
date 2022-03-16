<div class="rpd-edit">
    <form autocomplete="off">
        <div class="d-flex mb-4">
            <div class="flex-grow-1">
                <div class="row g-2">
                    <h4>@yield('heading',$heading)</h4>
                </div>
            </div>
            <div class="d-flex justify-content-end px-2">
                <div class="mr-2">
                    @section('buttons')
                        <div class="btn-group">
                        @if($viewRoute && $model->exists)
                            <a href="{{ route($viewRoute,$model->getKey()) }}" class="btn btn-outline-primary">undo</a>
                        @elseif($listRoute)
                            <a href="{{ route($listRoute) }}" class="btn btn-outline-primary">undo</a>
                        @endif
                        </div>
                    @show
                </div>
            </div>
        </div>
    </form>

    <div>
        <form wire:submit.prevent="{{ $action }}">

            @yield('edit')

            <div class="row">
                <div class="form-group col-md-8 text-center">
                    <button type="submit" class="btn btn-primary">{{ $action }}</button>
                </div>
            </div>
        </form>
    </div>

</div>

<script type="application/javascript">
</script>
