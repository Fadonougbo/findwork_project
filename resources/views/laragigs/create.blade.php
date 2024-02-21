@extends('laragigs.base')

@section('title','Create new gig')

@section('main')
    <div class="p-3">
        @if (session()->has('errors'))
            @include('laragigs.shared.message',['msg'=>'Please register required field','type'=>'error'])
        @endif
        <section class="w-full flex flex-col text-center my-2" >
            <h2 class="font-bold capitalize text-6xl text-laravel">create a job</h2>
            <p class="text-2xl font-semibold " >Post a job to find developer</p>
        </section>
        <section class="flex w-full justify-center my-10" >
            <form action="" method="POST" enctype="multipart/form-data"  class="bg-gray-300 p-4 rounded-2xl flex flex-col w-full ml:w-3/4 items-center md:w-1/2" >
                @csrf
                @include('laragigs.shared.inpute',['label'=>'company name','labelClasse'=>'text-laravel font-semibold','name'=>'company'])
                @include('laragigs.shared.inpute',['label'=>'job title','labelClasse'=>'text-laravel font-semibold','name'=>'title','placeholder'=>"Exemple: Full-Stack Developer"])
                @include('laragigs.shared.inpute',['label'=>'job location','labelClasse'=>'text-laravel font-semibold','name'=>'location','placeholder'=>"Exemple:Cotonou"])
                @include('laragigs.shared.inpute',['label'=>'website','labelClasse'=>'text-laravel font-semibold','name'=>'website','placeholder'=>""])
                @include('laragigs.shared.inpute',['label'=>'post slug','labelClasse'=>'text-laravel font-semibold','name'=>'slug','req'=>false])
                @include('laragigs.shared.inpute',['label'=>'contact email','labelClasse'=>'text-laravel font-semibold','name'=>'email','type'=>'email'])
                @include('laragigs.shared.inpute',['label'=>'Tag (comma separated)','labelClasse'=>'text-laravel font-semibold','name'=>'tags','placeholder'=>"Laravel,adonisJS,nodejs,php"])
                @include('laragigs.shared.textarea',['name'=>'description','labelClasse'=>'text-laravel font-semibold','label'=>'job description'])
                @include('laragigs.shared.inpute',['label'=>'company logo','labelClasse'=>'text-laravel font-semibold','name'=>'logo','type'=>'file'])
                
                <section class="flex w-full my-4 justify-center">
                    <button type="submit" class="capitalize bg-laravel text-white p-2 m-3 rounded-md" >create job</button>
                    <a href="#" class="no-underline bg-black text-white p-2 m-3 rounded-md " >Back</a>
                </section>
            </form>
        </section>
    </div>
@endsection