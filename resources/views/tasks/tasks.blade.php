<div class="bg-white w-1/3 mt-2 rounded-lg p-2 pb-8 shadow-lg border-t-4 border-l-2 border-pink-400">
    @if (count($tasks) === 0)
        <p class="text-center mt-3">No Tasks!</p>
    @else      
        @foreach ($tasks as $task)
            @auth
            @if ($task->user_id === auth()->user()->id)
                @if ($task->status === 'done')
                    <div class="flex justify-around items-center">
                        <i class="fas fa-check text-5xl mt-4 text-green-500"></i>
                        <div class="border-2 border-gray-300 rounded-2xl flex items-center py-1 pb-3 mt-5 w-4/5">
                            <div class="w-3/4 text-xl pl-1 text-gray-300 line-through">
                                <h1>{{$loop->iteration}}. {{$task->title}}</h1>
                            </div>
                            <div class="w-2/5 flex justify-around items-center">
                                <div class="w-3/5 text-xl flex justify-around items-center">
                                    <i class="fas fa-pencil-alt text-gray-300"></i>
                                    <form class="mt-5" action="{{route('home.delete', $task->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">
                                            <i class="fas fa-trash-alt text-red-800 hover:text-red-500 transition duration-300 cursor-pointer"></i>
                                        </button>
                                    </form>
                                </div>
                                <div>
                                    <form class="mt-4" action="{{route('home.check', $task->id)}}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <button class="border-2 border-gray-600 w-6 h-6" type="submit"><i class="fas fa-check"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                @else
                    <div class="border-2 border-pink-400 rounded-2xl flex items-center ml-4 py-1 pb-3 mt-5 w-11/12">
                        <div class="w-3/4 text-xl pl-1">
                            <h1>{{$loop->iteration}}. {{$task->title}}</h1>
                        </div>
                        <div class="w-2/5 flex justify-around items-center">
                            <div class="w-3/5 text-xl">
                                <div class='flex justify-around items-center'>
                                    <a href="{{$task->id}}/edit">
                                        <i class="fas fa-pencil-alt text-yellow-700 hover:text-yellow-500 transition duration-300 cursor-pointer"></i>
                                    </a>
                                    <form class="mt-5" action="{{route('home.delete', $task->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">
                                            <i class="fas fa-trash-alt text-red-800 hover:text-red-500 transition duration-300 cursor-pointer"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div>                         
                                <form class="mt-4" action="{{route('home.check', $task->id)}}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <button class="border-2 border-green-600 hover:border-green-400 transition duration-300 w-6 h-6" type="submit"></button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endif
            @endif  
            @endauth
        @endforeach
    @endif
</div>
