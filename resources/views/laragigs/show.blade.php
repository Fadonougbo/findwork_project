@extends('laragigs.base')

@section('title',$listing->title)

@section('main')
   <div class="p-3" >
        @if (session()->has('success'))
            @include('laragigs.shared.message',['msg'=>'Job created succesfully','type'=>'success'])
        @endif
        <section class="p-3" >
            <div>
                <h3 class="text-laravel my-1 text-center text-4xl" > 
                    {{$listing->title}}
                 </h3>
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