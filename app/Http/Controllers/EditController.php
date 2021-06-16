<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function edit($id)
    {
        $task = Task::find($id);

        return view('tasks.edit')->with('task', $task);
    }

    public function update(Request $req, $id)
    {
        Task::where('id', $id)
            ->update([
                'title' => $req->title
            ]);

        return redirect('/');
    }
}
