<div class="rpd-view">
    <form autocomplete="off">
        <div class="d-flex mb-4">
            <div class="flex-grow-1">
                <div class="row g-2">
                </div>
            </div>

            <div class="d-flex justify-content-end px-2">
                <div class="mr-2">
                    @section('buttons')
                        <div class="btn-group">
                            @if($listRoute)
                                <a href="{{ route($listRoute) }}" class="btn btn-outline-primary">list</a>
                            @endif
                            @if($editRoute)
                            <a href="{{ route($editRoute,$model->getKey()) }}" class="btn btn-outline-primary">edit</a>
                            @endif
                        </div>
                    @show
                </div>
            </div>
        </div>
    </form>
    <div class="row">
        @yield('view')
   </div>

</div>


<script type="application/javascript">
</script>
