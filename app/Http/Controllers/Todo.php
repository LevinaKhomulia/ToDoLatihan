<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo as TodoModel;
use App\Repositories\TodoRepository;
use App\Repositories\TodoLogRepository;

class Todo extends Controller
{
    private $todoRepo;

    public function __construct(TodoRepository $repo){
        $this->todoRepo = $repo;
    }

    //list all todos
    public function index(){
        $todos = $this->todoRepo->unfinish();
        return view('todo.index', 
            ['todos' => $todos]);
    }

    public function finish(){
        $todos = $this->todoRepo->finish();
        return view('todo.finish',
            ['todos' => $todos]);
    }

    public function new_form(){
        return view('todo.new');
    }

    public function save(Request $request){
        $description = $request->input('description');
        $status = 0;
        $this->todoRepo->create($description, $status);
        return redirect(route('todoIndex'));
    }

    public function detail(int $id){
        $todo = $this->todoRepo->get($id);
        if($todo == null){
            abort(404);
        }
        return view('todo.detail',
            ['todo' => $todo]);
    }

    public function edit(int $id){
        $todo = TodoModel::findOrFail($id);
        return view('todo.edit', 
            ['todo' => $todo]);
    }

    public function update(Request $request, int $id){
        $todo = TodoModel::findOrFail($id);
        $todo->description = $request->input('description');
        $todo->status = $request->input('status');
        $todo->save();
        return redirect(route('todoIndex'));
    }

    public function delete(int $id) {
        $todo = TodoModel::findOrFail($id);
        $todo->delete();
        return redirect(route('todoIndex'));
    }
}
