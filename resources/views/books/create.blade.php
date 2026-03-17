@extends('books.layouts.app')

@section('content')
<div class="mb-3">
    <h1>Add New Book</h1>
    <a href="{{ route('book.index') }}" class="btn btn-secondary">Back</a>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('book.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" name="title" class="form-control" value="{{ old('title') }}">
    </div>

    <div class="mb-3">
        <label for="author" class="form-label">Author</label>
        <input type="text" name="author" class="form-control" value="{{ old('author') }}">
    </div>

    <div class="mb-3">
        <label for="year" class="form-label">Year</label>
        <input type="number" name="year" class="form-control" value="{{ old('year') }}">
    </div>

    <button type="submit" class="btn btn-primary">Save Book</button>
</form>
@endsection