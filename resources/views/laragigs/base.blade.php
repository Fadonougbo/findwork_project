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
        <h1 class="text-xl capitalize cursor-pointer font-bold" >
            <a href="{{route('listings.index')}}" class="no-underline" >laragigs</a>
        </h1>
        <nav class="w-3/5 flex justify-end" >
            <a href="" class="no-underline mx-3 capitalize transition-all border-2 border-white rounded-md p-1 font-bold  hover:scale-125 " >register</a>
            <a href="" class=" no-underline  mx-3 capitalize  transition-all border-2 border-white rounded-md p-1 font-bold  hover:scale-125 ">login</a> 
        </nav>
    </header>

    <main class="grow-2 " >
        @yield('main')   
    </main>
    <footer class="p-3 flex justify-end bg-laravel" >
        <a href="{{route('listings.create')}}" class=" no-underline  mx-3 capitalize  transition-all border-2 border-white text-white  rounded-md p-1 font-bold  hover:scale-105 " >Post job</a>
    </footer>
</body>
</html>