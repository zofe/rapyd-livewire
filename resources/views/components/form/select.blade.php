<div>
    @if($attributes->get('label'))<label for="{{ $name }}" class="col-form-label">{{$attributes->get('label')}}</label>@endif
    <select {{ $attributes->except(['id','class']) }}
            id="{{ $name }}"
            name="{{ $name }}"
            {{ $attributes->only('class')->merge(['class' => 'form-control'. (($errors->has($name)) ? ' is-invalid' : '') ]) }}
    >

        @if($attributes->get('addempty'))
            <option value="">
                {{ $attributes->get('placeholder') ? $attributes->get('placeholder') : '' }}
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
