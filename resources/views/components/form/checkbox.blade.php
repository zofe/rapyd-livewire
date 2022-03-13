
<input type="hidden" name="{{ $name }}" value="0" />

<input {{ $attributes->except(['id','class']) }}
       id="{{ $name }}"
       name="{{ $name }}"
       type="checkbox"
       class="custom-control-input @error($name) is-invalid @enderror"
    {{ old($name) ? 'checked' : '' }}>

@error($name)
<span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
@enderror
