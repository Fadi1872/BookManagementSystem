@extends('layouts.mainLayout')

@section('title', $book->title)

@section('content')
<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
  <div class="bg-white shadow-md rounded-xl p-6">
    <div class="mb-6">
      <h1 class="text-3xl font-bold text-primary mb-1">{{ $book->title }}</h1>
      <p class="text-gray-600 text-sm">Book Details</p>
    </div>

    <div class="space-y-6">
      <div>
        <h2 class="text-sm font-medium text-gray-500 uppercase tracking-wide">Author</h2>
        <a href="{{ route('authors.show', $book->author) }}" class="text-lg text-accent hover:underline">
          {{ $book->author->name }}
        </a>
        <p class="text-sm text-gray-500 mt-1">Nationality: {{ $book->author->nationality }}<br>
          Born: {{ \Carbon\Carbon::parse($book->author->date_of_birth)->format('F j, Y') }}
        </p>
      </div>

      <div>
        <h2 class="text-sm font-medium text-gray-500 uppercase tracking-wide">Category</h2>
        <a href="{{ route('categories.show', $book->category) }}" class="text-lg text-accent hover:underline">
          {{ $book->category->name }}
        </a>
      </div>

      <div>
        <h2 class="text-sm font-medium text-gray-500 uppercase tracking-wide">Published Date</h2>
        <p class="text-lg text-gray-800">{{ \Carbon\Carbon::parse($book->published_at)->format('F j, Y') }}</p>
      </div>
    </div>

    <div class="mt-8 flex justify-between items-center border-t pt-4">
      <a href="{{ route('books.index') }}" class="text-sm text-gray-600 hover:text-primary">
        &larr; Back to Books
      </a>
      <div class="space-x-2">
        <a
          href="{{ route('books.edit', $book) }}"
          class="inline-block px-4 py-2 text-sm bg-accent text-gray-800 rounded-lg hover:bg-accent/90"
        >
          Edit
        </a>
        <form action="{{ route('books.destroy', $book) }}" method="POST" class="inline-block"
              onsubmit="return confirm('Are you sure you want to delete this book?');">
          @csrf
          @method('DELETE')
          <button type="submit" class="px-4 py-2 text-sm bg-red-500 text-white rounded-lg hover:bg-red-600">
            Delete
          </button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
