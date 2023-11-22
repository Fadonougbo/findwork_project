@extends('laragigs.base')

@section('title',$listing->title)

@section('main')
   <main class="p-3" >
        @php
            $tagList=explode(',',$listing->tags);
        @endphp
        <section class="p-3  " >
            <div>
                <h3 class="text-laravel my-1 text-center text-4xl" > 
                    {{$listing->title}}
                 </h3>
                <h4 class="text-2xl text-center my-2" >{{$listing->company}}</h4>
                <div class="py-2 flex justify-center space-x-3 w-full " >
                    @foreach ($tagList as $tag)
                        <span class="bg-laravel p-1 text-white rounded-md" >{{$tag}}</span>
                    @endforeach
                </div>
                <address class="my-1 text-center" >{{$listing->location}}</address>
            </div>
            <hr>
            <div class="p-2" >
                <h3 class="font-medium text-2xl text-center cursor-pointer  test  " >Job description</h3>
                <p class="text-justify my-2 p-6 text-xl " >{{$listing->description}}</p>
            </div>
            <div class="flex justify-center items-center  flex-wrap " >
                <a href="" class="no-underline bg-laravel text-white p-3 m-3 " >Contact employer</a>
                <a href="" class="no-underline bg-black text-white p-3 m-3 " >Visite website</a>
            </div>
        </section>
   </main>
@endsection