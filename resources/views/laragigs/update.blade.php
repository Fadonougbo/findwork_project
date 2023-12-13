@extends('laragigs.base')

@section('title','Update Gig')

@section('main')
    <div class="p-3">
        @if (session()->has('errors'))
            @include('laragigs.shared.message',['msg'=>'Please register required field','type'=>'error'])
        @endif
        <section class="w-full flex flex-col text-center my-2" >
            <h2 class="font-bold capitalize text-2xl">Update a gigs</h2>
        </section>
        <section class="flex w-full justify-center" >
            <form action="" method="POST" enctype="multipart/form-data"  class="p-2 flex flex-col w-full ml:w-3/4 items-center md:w-1/2" >

                @csrf
                @method('put')

                @include('laragigs.shared.inpute',['label'=>'company name','name'=>'company','defaultValue'=>$listing->company])
                @include('laragigs.shared.inpute',['label'=>'job title','name'=>'title','placeholder'=>"Exemple: Full-Stack Developer",'defaultValue'=>$listing->title])
                @include('laragigs.shared.inpute',['label'=>'job location','name'=>'location','placeholder'=>"Exemple:Cotonou",'defaultValue'=>$listing->location])
                @include('laragigs.shared.inpute',['label'=>'website','name'=>'website','defaultValue'=>$listing->website])
                @include('laragigs.shared.inpute',['label'=>'post slug','name'=>'slug','req'=>false,'defaultValue'=>$listing->slug])
                @include('laragigs.shared.inpute',['label'=>'contact email','name'=>'email','type'=>'email','defaultValue'=>$listing->email])
                @include('laragigs.shared.inpute',['label'=>'Tag (comma separated)','name'=>'tags','placeholder'=>"Laravel,adonisJS,nodejs,php",'defaultValue'=>$listing->tags])
                @include('laragigs.shared.textarea',['name'=>'description','label'=>'job description','defaultValue'=>$listing->description])
                @if ($listing->logo)
                        @include('laragigs.shared.checkbox',['label'=>'Delete old image?','name'=>'delete_status'])
                        <div>
                            <img src="{{$listing->getLogoPath()}}" alt="logo">
                        </div>
                @endif
                @include('laragigs.shared.inpute',['label'=>'company logo','name'=>'logo','type'=>'file'])
                
                
                <section class="flex w-full my-4 justify-center">
                    <button type="submit" class="capitalize bg-laravel text-white p-2 m-3 rounded-md" >Update gigs</button>
                    <a href="#" class="no-underline bg-black text-white p-2 m-3 rounded-md " >Back</a>
                </section>
            </form>
        </section>
    </div>
@endsection