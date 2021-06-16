@extends('layouts.app')

@section('content')
    <div class="bg-pink-400 border-t-4 border-l-2  w-1/3 mt-10 rounded-lg shadow-lg">
        <div class="p-1 flex justify-between">
            <a class="underline hover:text-gray-200 transition duration-300" href="{{route('home')}}">Go Back</a>
            <h1 class="text-lg">Update Item</h1>
        </div>
        <hr>
        <div class="w-11/12 h-32 mx-auto">
            <form action="{{route('edit', $task->id)}}" method="post" class="h-full flex items-center justify-center">
                @csrf
                @method('PUT')
                <div class="w-full text-center">
                    <input type="text" name="title" id="title" value="{{$task->title}}" class="py-4 pl-2 outline-none w-4/5">
                    <button type="submit" class="bg-blue-300 py-4 px-3 hover:bg-white hover:text-pink-400 transition duration-300">Update</button>
                </div>
            </form>
        </div>
    </div> 
@endsection