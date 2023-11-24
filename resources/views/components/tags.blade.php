@php
    $tagList=explode(',',$listing->tags);
    $x="essai{$test}";
@endphp

<div {{ $attributes->merge(['test'=>$x]) }}   >
    @foreach ($tagList as $tag)
        <span class="bg-laravel p-1 text-white rounded-md" >{{$tag}}</span>
    @endforeach
</div>