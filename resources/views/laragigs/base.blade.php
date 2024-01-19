<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css','resources/ts/Message.ts'])
</head>
<body class="w-full flex flex-col min-h-screen">
    <header class="flex items-center justify-between p-4 bg-laravel text-white" >
        <h1 class="text-xl capitalize cursor-pointer font-bold grow-0 " >
            <a href="{{route('listings.index')}}" class="no-underline capitalize" >findwork</a>
        </h1>
        <div class="grow-2 flex justify-end" >
            <nav class="w-3/5 flex justify-end" >
                @guest 
                    <a href="{{route('auth.register')}}" class="no-underline mx-3 capitalize transition-all border-2 border-white rounded-md p-1 font-bold  hover:scale-125 " >register</a>
                    <a href="{{route('auth.login')}}" class=" no-underline  mx-3 capitalize  transition-all border-2 border-white rounded-md p-1 font-bold  hover:scale-125 ">login</a> 
                @endguest
                @auth 
                    <a href="{{route('listings.dashboard')}}" class=" no-underline  mx-3 capitalize  transition-all border-2 border-white rounded-md p-1 font-bold  hover:scale-125 ">dashboard</a> 
                    <a href="{{route('listings.create')}}" class=" no-underline  mx-3 capitalize  transition-all border-2 border-white rounded-md p-1 font-bold  hover:scale-125 ">Post job</a>
                    <form action="{{route('auth.logout')}}" method="POST" >
                        @csrf
                        <button class="no-underline  mx-3 capitalize  transition-all border-2 border-white rounded-md p-1 font-bold  hover:scale-125" >logout</button>
                    </form> 
                @endauth
            </nav>
            @auth 
            <div class="flex items-center" >
                <span class="w-10 h-10 bg-blue-700 block mx-2 rounded-full" ></span>
                <span class="capitalize text-lg" >{{Auth::user()->name}}</span>
            </div>
            @endauth
        </div>
    </header>

    <main class="grow-2" >
        @yield('main')   
    </main>
    <footer class="p-3 flex justify-center text-white bg-laravel" >
        <p>Copyright © Gautier Fadonougbo 2024,All rights reseved </p>
    </footer>
</body>
</html>