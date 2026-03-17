@extends('books.layouts.app')

@section('content')
<div class="mb-3">
    <h1>Book Details</h1>
    <a href="{{ route('book.index') }}" class="btn btn-secondary">Back to List</a>
</div>

<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <td>{{ $book->id }}</td>
    </tr>
    <tr>
        <th>Title</th>
        <td>{{ $book->title }}</td>
    </tr>
    <tr>
        <th>Author</th>
        <td>{{ $book->author }}</td>
    </tr>
    <tr>
        <th>Year</th>
        <td>{{ $book->year }}</td>
    </tr>
</table>
@endsection