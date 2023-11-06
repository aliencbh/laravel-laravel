@extends('layouts.app')
@section('content')
<h1>Todos</h1>
@if(count($todos) > 0)
    @foreach($todos as $todo)
<div class="card m-2 p-2">
    <h2><a href="todo/{{ $todo->id }}" type="button" class="btn btn-outline-info">{{ $todo->title }}</a></h2>
    <span class="badge text-bg-danger">{{ $todo->due }}</span>
</div>
    @endforeach
@endif
@endsection