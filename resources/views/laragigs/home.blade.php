@extends('laragigs.base')

@section('title','Listings')

@section('main')

    {{$listings->render()}}
        @if ($listings->isNotEmpty())
            @if (session()->has('success'))
                @include('laragigs.shared.message',['msg'=>session('success'),'type'=>'success'])
            @endif
            <h2 class="text-center text-6xl font-bold my-10 text-laravel" >Last posts</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4  justify-items-center mt-4 p-3" >
                @foreach ($listings as $listing)
                    <section class="p-3 bg-sectbg w-full " >
                        <h3 class="text-laravel my-1 text-center" >
                            <a href="{{route('listings.show',['listing'=>$listing->id,'slug'=>$listing->slug])}}" class="text-4xl" >
                                {{$listing->title}}
                            </a>
                        </h3>
                        <h4 class="text-2xl text-center my-2" >{{$listing->company}}</h4>
                        @include('laragigs.description')
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
