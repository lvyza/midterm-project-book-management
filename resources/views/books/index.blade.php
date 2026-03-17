@extends('books.layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Book Management</h1>
    <a href="{{ route('book.create') }}" class="btn btn-primary">Add Book</a>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Author</th>
            <th>Year</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($books as $book)
        <tr>
            <td>{{ $book->id }}</td>
            <td>{{ $book->title }}</td>
            <td>{{ $book->author }}</td>
            <td>{{ $book->published_year }}</td>
            <td>
                <a href="{{ route('book.show', $book->id) }}" class="btn btn-info btn-sm">View</a>
                <a href="{{ route('book.edit', $book->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('book.destroy', $book->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this book?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $books->links() }}
@endsection