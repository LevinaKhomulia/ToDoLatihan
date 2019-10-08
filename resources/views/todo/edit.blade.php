@extends('base')

@section('body')
<form method="post" action="{{ route('todoUpdate', ['id'=>$todo->id]) }}">
    @csrf
    <div>
        <label>Description:</label>
        <input type="text" name="description" value="{{ $todo->description }}">
    </div>
    <div>
        <label>Status:</label>
        <input type='hidden' value='0' name='status'/>
        @if ($todo->status == 1)
        <input type="checkbox" name="status" value="1" checked>Finish
        @else
        <input type="checkbox" name="status" value="1">Finish
        @endif
    </div>
    <div>
        <input type="submit">
    </div>
</form>
@endsection