@extends('laragigs.base')

@section('title','Sign in')

@section('main')
    <div class="p-3 w-full h-full my-3 flex  flex-col justify-center items-center">
        @if (session()->has('errors'))
            <div class="my-2 w-full" >
                @include('laragigs.shared.message',['msg'=>'Please fill all fields','type'=>'error'])
            </div>
        @endif
        @if (session('success'))
            <div class="my-2 w-full" >
                @include('laragigs.shared.message',['msg'=>session('success'),'type'=>'success'])
            </div>
        @endif

        @if (session('error'))
            <div class="my-2 w-full" >
                @include('laragigs.shared.message',['msg'=>session('error'),'type'=>'error'])
            </div>
        @endif
        <div class="w-3/5 bg-gray-300 rounded-2xl my-2" >
            <section class="w-full flex flex-col text-center my-2" >
                <h2 class="font-bold capitalize text-2xl text-laravel">LOGIN</h2>
            </section>
            <section class="flex w-full justify-center" >
                <form action="" method="POST"  class="p-2 flex flex-col w-full ml:w-3/4 items-center md:w-1/2" >
                    @csrf
                    @include('laragigs.shared.inpute',['label'=>'user email','type'=>'email','name'=>'email','placeholder'=>"Exemple:doe@doe.com",'labelClasse'=>'text-laravel font-medium'])
                    @include('laragigs.shared.inpute',['label'=>'password','labelClasse'=>'text-laravel font-medium','name'=>'password','type'=>'password'])
                    <section class="flex w-full my-1 justify-center">
                        <button type="submit" class="capitalize bg-laravel text-white p-2 m-3 rounded-md w-1/3" >Sign in</button>
                    </section>
                    <p>Don't have an account?<a href="{{route('auth.register')}}" class="text-laravel" >register</a> </p>
                </form>
            </section>
        </div>
    </div>
@endsection