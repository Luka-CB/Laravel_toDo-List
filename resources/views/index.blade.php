@extends('layouts.app')

@section('content')
        <div class="bg-pink-400 border-t-4 border-l-2  w-1/3 mt-5 rounded-lg shadow-lg">
            <div class="p-1 flex justify-between">
                <h1 class="text-lg">{{auth()->user() ? auth()->user()->username. '\'s' . ' ToDo List' : 'ToDo List'}}</h1>
                <div class="m-1">
                    @auth    
                        <form action="{{route('logout')}}" method="POST">
                            @csrf
                            <button class="bg-blue-300 py-1 px-3 hover:bg-white hover:text-pink-400 transition duration-300" type="submit">Logout</button>
                        </form>
                    @endauth
                    
                    @guest
                        <a class="bg-blue-300 py-1 px-3 hover:bg-white hover:text-pink-400 transition duration-300" href="{{route('login')}}">Login</a>
                    @endguest
                </div>
            </div>
            <hr>
            <div class="w-11/12 h-32 mx-auto">
                @auth
                    <form action="{{route('home')}}" method="post" class="h-full flex items-center justify-center">
                        @csrf
                        <div class="w-full text-center">
                            <input type="text" name="title" id="title" placeholder="What's on your mind" class="py-4 pl-2 outline-none w-4/5">
                            <button type="submit" class="bg-blue-300 py-4 w-14 hover:bg-white hover:text-pink-400 transition duration-300">Add</button>
                        </div>
                    </form>
                @endauth
                @guest
                    <div class="h-full flex items-center text-center text-white">
                        <h1>You are not logged in! You must be <span class="text-gray-700 font-bold">LOGGED IN</span> to use this app</h1>
                    </div>
                @endguest
            </div>
        </div> 

        @include('tasks.tasks')

@endsection
