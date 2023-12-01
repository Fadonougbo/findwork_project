@extends('laragigs.base')

@section('title','Listings')

@section('main')

    {{$listings->render()}}
        @if ($listings->isNotEmpty())
            <h2 class="text-center text-4xl my-5" >Latest Listing</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3  justify-items-center mt-3 p-3" >
                @foreach ($listings as $listing)
                    <section class="p-3 bg-sectbg " >
                        <h3 class="text-laravel my-1 text-center" >
                            <a href="{{route('listings.show',['listing'=>$listing->id,'slug'=>$listing->slug])}}" class="text-4xl"  >
                                {{$listing->title}}
                            </a>
                        </h3>
                        <h4 class="text-2xl text-center my-2" >{{$listing->company}}</h4>
                        <p class="text-justify my-2" >{{$listing->description}}</p>
                        @include('laragigs.tags')
                        <address class="my-1" >{{$listing->location}}</address>
                    </section>
                @endforeach
            </div>
        @else
        <h2 class="text-center text-4xl my-5" >Empty</h2>
        @endif
    {{$listings->render()}}
    
@endsection
