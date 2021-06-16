<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{


    public function index()
    {
        $tasks = Task::all();

        return view('index', [
            'tasks' => $tasks
        ]);
    }

    public function store(Request $req)
    {
        $id = auth()->user()->id;
        Task::create([
            'title' => $req->input('title'),
            'user_id' => $id
        ]);

        return back();
    }

    public function check($id) 
    {

        $status = Task::find($id, 'status');

        if ($status->status === 'active') {
            $checkStatus = 'done';
        } else {
            $checkStatus = 'active';
        }

        Task::where('id', $id)
            ->update([
                'status' => $checkStatus
            ]);
        
        return back();
    }

    public function delete($id)
    {
        Task::destroy($id);

        return back();
    }
}
