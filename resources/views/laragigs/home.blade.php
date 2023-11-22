@extends('laragigs.base')

@section('title','Listings')

@section('main')

   <main>
        {{$listings->render()}}
        <h2 class="text-center text-4xl my-5" >Latest Listing</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3  justify-items-center mt-3 p-3" >
            @foreach ($listings as $listing)
            @php
                $tagList=explode(',',$listing->tags);
            @endphp
            
            <section class="p-3 bg-sectbg " >
                <h3 class="text-laravel my-1 text-center" >
                    <a href="{{route('listings.show',['listing'=>$listing->id])}}" >
                        {{$listing->title}}
                    </a>
                </h3>
                <h4 class="text-2xl text-center my-2" >{{$listing->company}}</h4>
                <p class="text-justify my-2" >{{$listing->description}}</p>
                <div class="py-2" >
                    @foreach ($tagList as $tag)
                        <span class="bg-laravel p-1 text-white rounded-md" >{{$tag}}</span>
                    @endforeach
                </div>
                <address class="my-1" >{{$listing->location}}</address>
            </section>
            @endforeach
        </div>
        {{$listings->render()}}
   </main>
@endsection
