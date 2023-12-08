@extends('laragigs.base')

@section('title','Create new gig')

@section('main')
    <div class="p-3">
        @if (session()->has('errors'))
            @include('laragigs.shared.message',['msg'=>'Please register required field','type'=>'error'])
        @endif
        <section class="w-full flex flex-col text-center my-2" >
            <h2 class="font-bold capitalize text-2xl">create a gigs</h2>
            <p class="text-lg font-semibold " >Post a gig to find developer</p>
        </section>
        <section class="flex w-full justify-center" >
            <form action="" method="POST" enctype="multipart/form-data"  class="p-2 flex flex-col w-full ml:w-3/4 items-center md:w-1/2" >
                @csrf
                @include('laragigs.shared.inpute',['label'=>'company name','name'=>'company'])
                @include('laragigs.shared.inpute',['label'=>'job title','name'=>'title','placeholder'=>"Exemple: Full-Stack Developer"])
                @include('laragigs.shared.inpute',['label'=>'job location','name'=>'location','placeholder'=>"Exemple:Cotonou"])
                @include('laragigs.shared.inpute',['label'=>'website','name'=>'website','placeholder'=>""])
                @include('laragigs.shared.inpute',['label'=>'post slug','name'=>'slug','req'=>false])
                @include('laragigs.shared.inpute',['label'=>'contact email','name'=>'email','type'=>'email'])
                @include('laragigs.shared.inpute',['label'=>'Tag (comma separated)','name'=>'tags','placeholder'=>"Laravel,adonisJS,nodejs,php"])
                @include('laragigs.shared.textarea',['name'=>'description','label'=>'job description'])
                @include('laragigs.shared.inpute',['label'=>'company logo','name'=>'logo','type'=>'file'])
                
                <section class="flex w-full my-4 justify-center">
                    <button type="submit" class="capitalize bg-laravel text-white p-2 m-3 rounded-md" >create gigs</button>
                    <a href="#" class="no-underline bg-black text-white p-2 m-3 rounded-md " >Back</a>
                </section>
            </form>
        </section>
    </div>
@endsection