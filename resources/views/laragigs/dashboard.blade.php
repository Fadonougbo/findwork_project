@extends('laragigs.base')

@section('title','Dashboard')

@section('main')
    <div class="p-3 w-full flex flex-col items-center" >
        <div>
            <h1 class="text-6xl text-laravel font-bold my-3" >Dashboard</h1>
        </div>
        <table class="w-2/3 my-3 p-2 " >
            <thead>
                <tr class=" text-2xl" >
                    <th class="border-solid border-2 border-gray-700" >Post title</th>
                    <th class="border-solid border-2 border-gray-700" >Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($listings as $listing)
                    <tr class="" >
                        <td class="border-solid border-2 border-gray-700 text-2xl" >{{$listing->title}}</td>
                        <td class="border-solid border-2 border-gray-700 flex items-center" >
                            <a href="{{route('listings.update',['listing'=>$listing])}}" class="mx-2  no-underline text-sm capitalize bg-blue-700 p-2 text-white rounded" >Update</a>
                            <form method="POST" action="{{route('listings.destroy',['listing'=>$listing])}}">
                            @csrf
                            @method('delete') 
                                <button class="mx-2  no-underline text-sm capitalize bg-red-700 p-2 text-white rounded" >delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="border-solid border-2 text-2xl text-center border-gray-700" colspan="2" >Empty</td>
                    </tr>
                @endforelse
                
            </tbody>
        </table>
    </div>
@endsection