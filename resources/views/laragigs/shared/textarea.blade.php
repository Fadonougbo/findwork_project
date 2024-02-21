@php
    
    $name??='';
    $label??='';
    $req??=false;
/*     $placeholder??=''; */
    $defaultValue??='';
@endphp

<section class="flex flex-col w-full my-4" >
    <label for="{{$name}}" class="text-lg my-2 capitalize text-laravel font-semibold" >{{$label}}</label>
    <textarea name="{{$name}}" id="{{$name}}" {{$req?'required':''}}>{{old($name,$defaultValue)}}</textarea>
    @error($name)
        <span class="text-laravel" >{{$message}}</span>
    @enderror
</section>