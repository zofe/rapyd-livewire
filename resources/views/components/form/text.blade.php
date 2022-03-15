
<div>
        @if($attributes->get('label'))<label for="{{ $name }}" class="col-form-label">{{$attributes->get('label')}}</label>@endif
        <div @if($attributes->get('append')) class="input-group" @endif>
            <input {{ $attributes->except(['id','class','div-class']) }}
                   id="{{ $name }}"
                   name="{{ $name }}"
                   type="text"

                   {{ $attributes->only('class')->merge(['class' => 'form-control'. (($errors->has($name)) ? ' is-invalid' : '') ]) }}
                   value="{{ old($name) }}">

            @if($attributes->get('append'))
                <div class="input-group-append">
                    <span class="input-group-text">{{ $attributes->get('append') }}</span>
                </div>
            @endif

            @error($name)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
</div>



