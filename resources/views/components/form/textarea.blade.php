<div>
    @if($attributes->get('label'))<label for="{{ $name }}" class="col-form-label">{{$attributes->get('label')}}</label>@endif
    <textarea {{ $attributes->except(['id','class']) }}
           id="{{ $name }}"
           name="{{ $name }}"

           class="form-control @error($name) is-invalid @enderror"
           rows="{{ $attributes->get('rows',3) }}"
           >
        {{ old($name, dot_to_property($model, $name)) }}
    </textarea>
    @error($name)
    <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>


