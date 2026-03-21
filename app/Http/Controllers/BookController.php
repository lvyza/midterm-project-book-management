<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::paginate(10);
        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            // 'isbn' => 'required|unique:books,isbn,' . ($id ?? 'NULL') . ',id',
            'published_year' => 'required|integer|min:1000|max:' . date('Y'),
        ]);

        Book::create($request->all());

        return redirect()->route('books.index')->with('success', 'Book created successfully.');
    }

    public function show(string $id)
    {
        $book = Book::findOrFail($id);
        return view('books.show', compact('book'));
    }

    public function edit(string $id)
    {
        $book = Book::findOrFail($id);
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            // 'isbn' => 'required|unique:books,isbn,' . ($id ?? 'NULL') . ',id',
            'published_year' => 'required|integer|min:1000|max:' . date('Y'),
        ]);

        $book = Book::findOrFail($id);
        $book->update($request->all());

        return redirect()->route('book.index')->with('success', 'Book updated successfully.');
    }

    public function destroy(string $id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->route('book.index')->with('success', 'Book deleted successfully.');
    }
}