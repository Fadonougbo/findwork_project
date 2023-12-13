@php
    
    $name??='';
    $label??='';
@endphp

<section class="w-full my-4" >
    <label for="{{$name}}" class="text-lg my-2 capitalize" >{{$label}}</label>
    <input type="checkbox" name="{{$name}}" id="{{$name}}" value="1" @checked(old($name,'0')) >
    @error($name)
        <span class="text-laravel" >{{$message}}</span>
    @enderror
</section>