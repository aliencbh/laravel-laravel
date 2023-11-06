@extends('layouts.app')
@section('content')
<a href="javascript:history.back()" class="btn btn-secondary mt-2">Go Back</a>
<h1>{{ $todo->title }}</h1>
<div class="badge text-bg-danger">{{ $todo->due }}</div>
<hr>
<p>{{ $todo->content }}</p>
<form method="post" action="/todo/{{ $todo->id }}">
        @csrf
        @method('DELETE')
    <button type="submit" class="btn btn-danger mt-2 float-end">Delete</button>
</form>
<a href="/todo/{{ $todo->id }}/edit" class="btn btn-primary mt-2">Edit</a>
@endsection