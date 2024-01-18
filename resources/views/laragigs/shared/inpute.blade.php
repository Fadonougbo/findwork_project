@php
    
    $name??='';
    $type??='text';
    $label??='';
    $labelClasse??='';
    $inputClasse??='';
    $placeholder??='';
    $req??=false;
    $defaultValue??='';
@endphp

<section class="flex flex-col w-full my-3" >
    <label for="{{$name}}" class="{{$labelClasse}} text-lg my-2 capitalize" >{{$label}}  {{!$req?'(optionnel)':''}}</label>
    <input type="{{$type}}" class="{{$inputClasse}}" name="{{$name}}" id="{{$name}}" value="{{old($name,$defaultValue)}}" placeholder="{{$placeholder}}" {{$req?'required':''}}>
    @error($name)
        <span class="text-laravel" >{{$message}}</span>
    @enderror
</section>