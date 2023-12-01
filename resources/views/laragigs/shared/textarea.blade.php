@php
    
    $name??='';
    $label??='';
    $req??=false;
/*     $placeholder??=''; */
@endphp

<section class="flex flex-col w-full my-4" >
    <label for="{{$name}}" class="text-lg my-2 capitalize" >{{$label}}</label>
    <textarea name="{{$name}}" id="{{$name}}" {{$req?'required':''}}>{{old($name,'')}}</textarea>
    @error($name)
        <span class="text-laravel" >{{$message}}</span>
    @enderror
</section>