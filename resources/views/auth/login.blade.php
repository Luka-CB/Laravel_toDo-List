@extends('layouts.app')

@section('content')
    <div class="bg-pink-400 p-5 w-1/3 border-t-4 border-l-2 border-white rounded-xl shadow-2xl">
        <div class="w-full text-center">
            <h1>LOGIN</h1>
        </div>
        @if (session('status'))
            <div class="w-full py-3 text-center mt-2" >
                <span class="bg-white w-4/5 text-red-600 text-center py-3 px-5 border-t-4 border-l-2 border-blue-400 rounded-xl" >
                    {{session('status')}}
                </span>
            </div>            
        @endif
        <div>
            <form action="{{route('login')}}" method="POST" class="mt-5 flex flex-col">
                @csrf
                <div class="flex flex-col py-3">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="py-3 border-t-4 border-l-2 border-blue-300 rounded-xl pl-2 outline-none text-xl placeholder-red-500" placeholder="@error('email') {{$message}} @enderror" value="{{old('email')}}">
                </div>

                <div class="flex flex-col py-3">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="py-3 border-t-4 border-l-2 border-blue-300 rounded-xl pl-2 outline-none text-xl placeholder-red-500" placeholder="@error('password') {{$message}} @enderror">
                </div>

                <button class="border-2 border-gray-600 mt-3 py-2 rounded-xl font-bold tracking-wider hover:text-gray-600 transition duration-300" type="submit">Login</button>
            </form>
        </div>
        <div class="mt-10 flex text-white">
            <h1>Don't have an account?</h1>
            <a class="ml-2 font-bold tracking-wider underline hover:text-gray-600 transition duration-300" href="{{route('register')}}">Register</a>
        </div>
    </div>
@endsection