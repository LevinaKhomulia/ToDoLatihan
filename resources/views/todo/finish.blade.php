@extends('base')

@section('body')
<button ><a href="{{ route('todoNewForm') }}">Add New</a></button>
<a href="{{ route('todoIndex') }}">See unfinish todos</a>
<table>
    <h2>Finished Todo</h2>
    <tr>
        <th>ID</th>
        <th>Description</th>
        <th>Action</th>
    </tr>
    @foreach ($todos as $todo)
    <tr>
        <td><a href="{{ route('todoDetail', ['id' => $todo->id]) }}">{{ $todo->id }}</a></td>
        <td><a href="">{{ $todo->description }}</a></td>
        <td><a href="{{ route('todoDelete', ['id' => $todo->id]) }}"
            onclick="return confirm('Are you sure?')">Delete</a>
            <a href="{{ route('todoEditForm', ['id'=>$todo->id]) }}">Edit</a>
        </td>
    </tr>
    @endforeach
</table>
@endsection  