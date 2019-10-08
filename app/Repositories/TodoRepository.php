<?php

namespace App\Repositories;

use App\Todo;

class TodoRepository implements TodoInterface{
    public function create(string $description, $status){
        $newTodo = new Todo;
        $newTodo->description = $description;
        $newTodo->status = $status;
        $newTodo->save();
    } 

    public function all(){
        return Todo::all();
    }

    function finish(){
        return Todo::all()->where('status',1);
    }
    function unfinish(){
        return Todo::all()->where('status',0);
    }

    public function get(int $id){
        return Todo::findOrFail($id);
    }

    public function update(int $id, string $description,  $status){
        $todo = Todo::findOrFail($id);
        $todo->$description;
        $todo->$status;
        $todo->save();
    }


    public function delete(int $id){
        $todo = Todo::findOrFail($id);
        $todo->delete();
    }
}