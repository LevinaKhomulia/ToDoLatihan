@extends('base')

@section('body')
<dl>
    <dt>Description</dt>
    <dd>{{ $todo->description }}</dd>
    <dt>Status</dt>
    @if($todo->status == 1)
    <dd>Finish</dd>
    @else
    <dd>Unfinish</dd>
    @endif
</dl>
@endsection