@php
    $label ??= null;
    $type ??= 'text';
    $class ??=  null;
    $name ??= '';
    $value ??= '';
@endphp

<div @class(['form-group', $class])>
    <label for="{{ $name }}" class="form-label"> {{ $label }} </label>

    @if ($type === 'textarea')
        <textarea 
            class="form-control my-3 @error($name) is-invalid @enderror" 
            type="{{ $type }}"  
            name="{{ $name }}" 
            id="{{ $name }}"
            >{{ old($name, $value) }}</textarea>
    @else
        <input 
            class="form-control my-3 @error($name) is-invalid @enderror" 
            type="{{ $type }}" 
            id="{{ $name }}" 
            name="{{ $name }}"  
            value="{{ old($name, $value) }}">
    @endif

    @error($name)
        <div class="invalid-feedback text-end my-3">
            {{ $message }}
        </div>
    @enderror
</div>