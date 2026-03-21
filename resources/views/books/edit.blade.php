@extends('books.layouts.app')

@section('content')
<div class="container">
    <h1>Edit Book</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach($errors->all() as $error) <li>{{ $error }}</li> @endforeach</ul>
        </div>
    @endif

    <form action="{{ route('book.update', $book->id) }}" method="POST">
        <!-- @csrf -->
        @method('PUT')
        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $book->title) }}">
        </div>
        <div class="mb-3">
            <label>Author</label>
            <input type="text" name="author" class="form-control" value="{{ old('author', $book->author) }}">
        </div>
        <div class="mb-3">
            <label>ISBN</label>
            <input type="text" name="isbn" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Published Year</label>
            <input type="number" name="published_year" class="form-control" value="{{ old('published_year', $book->published_year) }}">
        </div>

        <button type="submit" class="btn btn-success">Update Book</button>
        <a href="{{ route('book.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection 