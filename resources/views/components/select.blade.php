<div>


    <select {{ $attributes->except(['id','class']) }}
            id="{{ $name }}"
            class="form-control  @error($name) is-invalid @enderror"
    >


        @if($attributes->get('addempty'))
            <option value="">
                {{ $attributes->get('placeholder') ? $attributes->get('placeholder') : __('global.select') }}
            </option>
        @endif
        @foreach($options as $key=>$value)
            <option value="{{ $key }}" @if(old($name) == $key) selected="selected" @endif>
                    {{ $value }}
            </option>
        @endforeach
    </select>

    @error($name)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror


</div>
