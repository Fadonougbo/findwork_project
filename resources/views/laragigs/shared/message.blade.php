@php
    $msg??='';
    $type??='success';
    $color=$type==='success'?'bg-green-600':'bg-laravel';
@endphp

<section class="flex justify-center cursor-pointer " is='flash-message'  >
    <h1 class="text-center text-white {{$color}} rounded-sm p-2 text-lg inline-block w-1/3" >{{$msg}}</h1>
</section>  