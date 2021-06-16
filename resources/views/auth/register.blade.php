@extends('layouts.app')

@section('content')
    <div class="bg-pink-400 p-5 w-1/3 border-t-4 border-l-2 border-white rounded-xl shadow-2xl">
        <div>
            <h1>Register</h1>
        </div>
        <div>
            <form action="{{route('register')}}" method="POST" class="mt-5 flex flex-col">
                @csrf
                <div class="flex flex-col py-3">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="py-3 border-t-4 border-l-2 border-blue-300 rounded-xl pl-2 outline-none text-xl placeholder-red-500" placeholder="@error('username') {{$message}} @enderror" value="{{old('username')}}">
                </div>

                <div class="flex flex-col py-3">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="py-3 border-t-4 border-l-2 border-blue-300 rounded-xl pl-2 outline-none text-xl placeholder-red-500" placeholder="@error('email') {{$message}} @enderror" value="{{old('email')}}">
                </div>

                <div class="flex flex-col py-3">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="py-3 border-t-4 border-l-2 border-blue-300 rounded-xl pl-2 outline-none text-xl placeholder-red-500" placeholder="@error('password') {{$message}} @enderror">
                </div>

                <div class="flex flex-col py-3">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="py-3 border-t-4 border-l-2 border-blue-300 rounded-xl pl-2 outline-none text-xl">
                </div>

                <button class="border-2 border-gray-600 mt-3 py-2 rounded-xl font-bold tracking-wider hover:text-gray-600 transition duration-300" type="submit">Register</button>
            </form>
        </div>
        <div class="mt-10 flex text-white">
            <h1>Already have an account?</h1>
            <a class="ml-2 font-bold tracking-wider underline hover:text-gray-600 transition duration-300" href="{{route('login')}}">Login</a>
        </div>
    </div>
@endsection