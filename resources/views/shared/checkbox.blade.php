@php
    $class ??= null;
    $label ??= null;
    $class ??=  null;
    $name ??= '';
    $value ??= '';
@endphp

<div @class(['form-check form-switch', $class])>
    
    <label for="{{ $name }}" class="form-check-label"> {{ $label }} </label>
    
    <input type="hidden" value="0" name="{{ $name }}">
    <input 
        class="form-check-input @error($name) is-invalid @enderror" 
        type="checkbox" 
        id="{{ $name }}" 
        name="{{ $name }}"  
        value="1"
        @checked(old($name , $value ?? false))
        role="switch">

    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>