@extends('laragigs.base')

@section('title','Create new account')

@section('main')
    <div class="p-3 ">
        @if (session()->has('errors'))
            @include('laragigs.shared.message',['msg'=>'Please fill all fields','type'=>'error'])
        @endif
        <section class="w-full flex flex-col text-center my-4 text-laravel" >
            <h2 class="font-bold capitalize text-4xl">Sign up</h2>
        </section>
        <section class="flex w-full justify-center" >
            <form action=""  method="POST"  class="p-4 bg-gray-300 rounded-2xl flex flex-col w-full ml:w-3/4 items-center md:w-1/2" >
                @csrf
                @include('laragigs.shared.inpute',['label'=>'user name','labelClasse'=>'text-laravel font-semibold','name'=>'name','placeholder'=>'e.g:Doe'])
                @include('laragigs.shared.inpute',['label'=>'user email','labelClasse'=>'text-laravel font-semibold','type'=>'email','name'=>'email','placeholder'=>"e.g:doe@doe.com"])
                @include('laragigs.shared.inpute',['label'=>'password','labelClasse'=>'text-laravel font-semibold','name'=>'password','type'=>'password'])
                @include('laragigs.shared.inpute',['label'=>'confirm password','labelClasse'=>'text-laravel font-semibold','name'=>'password_confirmation','type'=>'password'])
                <section class="flex w-full my-4 justify-center">
                    <button type="submit" class="capitalize bg-laravel text-white p-2 m-3 rounded-md" >I'm registering</button>
                </section>
            </form>
        </section>
    </div>
@endsection