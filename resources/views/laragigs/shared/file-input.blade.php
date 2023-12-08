@php
    
    $name??='';
    $type??='text';
    $label??='';
    $placeholder??='';
    $req??=false;
@endphp

<section class="flex flex-col w-full my-4" >
    <label for="{{$name}}" class="text-lg my-2 capitalize" >{{$label}}  {{!$req?'(optionnel)':''}}</label>
    <input type="{{$type}}" name="{{$name}}" id="{{$name}}" value="{{old($name,'')}}" placeholder="{{$placeholder}}" {{$req?'required':''}}>
    @error($name)
        <span class="text-laravel" >{{$message}}</span>
    @enderror
</section>