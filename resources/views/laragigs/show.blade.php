@extends('laragigs.base')

@section('title',$listing->title)

@section('main')
   <div class="p-3" >
        @if (session()->has('success'))
            @include('laragigs.shared.message',['msg'=>session('success'),'type'=>'success'])
        @endif
        @if (session()->has('update_error'))
            @include('laragigs.shared.message',['msg'=>session('update_error'),'type'=>'error'])
        @endif
        <section class="p-3" >
            <div class="flex flex-col items-center" >
                <section class="flex my-4" >
                     <h3 class="text-laravel flex items-center text-center text-4xl align-middle" > 
                        {{$listing->title}}
                    </h3>
                    @auth 
                    <div class="flex items-center" >
                        <a href="{{route('listings.update',['listing'=>$listing->id])}}" class="mx-2  no-underline text-sm capitalize bg-blue-700 p-2 text-white rounded" >update</a>
                        <form method="POST" action="{{route('listings.destroy',['listing'=>$listing->id])}}">
                            @csrf
                            @method('delete') 
                            <button class="mx-2  no-underline text-sm capitalize bg-red-700 p-2 text-white rounded" >delete</button>
                        </form>
                    </div>
                    @endauth
                </section>
              
                @if($listing->logo)
                    <img src="{{$listing->getLogoPath()}}" alt="logo_image" class="w-56 h-56" >
                @else
                    
                <img src="/pic.jpeg" alt="logo_image" class="w-56 h-56" >
                @endif
                <h4 class="text-2xl text-center my-2" >{{$listing->company}}</h4>
                 @include('laragigs.tags',['newClass'=>'flex justify-center space-x-3 w-full'])
                <address class="my-1 text-center" >{{$listing->location}}</address>
            </div>
            <hr>
            <div class="p-2" >
                <h3 class="font-medium text-2xl text-center cursor-pointer  test  " >Job description</h3>
                @include('laragigs.description',['addLimite'=>false,'newClass'=>'p-6 text-xl'])
            </div>
            <div class="flex justify-center items-center  flex-wrap " >
                <a href="" class="no-underline bg-laravel text-white p-3 m-3 rounded-md  " >Contact employer</a>
                <a href="" class="no-underline bg-black text-white p-3 m-3 rounded-md  " >Visite website</a>
            </div>
        </section>
    </div>
@endsection