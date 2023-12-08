@php
    $tagList=explode(',',$listing->tags);
    $newClass??='space-x-2';
   
@endphp

<div class="py-2 {{$newClass}}" >
    @foreach ($tagList as $tag)
        <span class="bg-laravel p-1 text-white rounded-md" >
            <a href="{{route('listings.index')}}?tag={{$tag}}" class="no-underline" >{{$tag}}</a>   
        </span>
    @endforeach
</div>