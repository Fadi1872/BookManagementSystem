@extends('layouts.mainLayout')

@section('title', 'All Books')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
  <div class="flex items-center justify-between mb-6">
    <h1 class="text-3xl font-semibold text-primary">All Books</h1>
    <a
      href="{{ route('books.create') }}"
      class="inline-flex items-center px-4 py-2 bg-accent text-gary-800 text-sm font-medium rounded-lg shadow hover:bg-accent/90 transition"
    >
      + Add New Book
    </a>
  </div>

  @if($books->isEmpty())
    <p class="text-gray-600">No books found. <a href="{{ route('books.create') }}" class="text-accent hover:underline">Add your first book</a>!</p>
  @else
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
      @foreach($books as $book)
        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-200">
          <div class="p-4 space-y-2">
            <h2 class="text-xl font-bold">{{ $book->title }}</h2>
            <p class="text-sm text-gray-500">Author: <span class="text-gray-800">{{ $book->author->name }}</span></p>
            <p class="text-sm text-gray-500">Category: <span class="text-gray-800">{{ $book->category->name }}</span></p>
            <p class="text-sm text-gray-500">Published: <span class="text-gray-800">{{ \Carbon\Carbon::parse($book->published_at)->format('M d, Y') }}</span></p>
            <div class="flex justify-between items-center pt-2 border-t">
              <a href="{{ route('books.show', $book) }}" class="text-sm text-accent hover:underline">View</a>
              <a href="{{ route('books.edit', $book) }}" class="text-sm text-gray-600 hover:text-primary">Edit</a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  @endif
</div>
@endsection
