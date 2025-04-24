@extends('layouts.mainLayout')

@section('title', 'Add New Book')

@section('content')
<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
  <h1 class="text-3xl font-semibold text-primary mb-6">Add New Book</h1>

  @if ($errors->any())
    <div class="mb-6 bg-red-50 border border-red-200 text-red-800 p-4 rounded-md">
      <ul class="list-disc list-inside">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('books.store') }}" method="POST" class="bg-white shadow-md rounded-xl p-6 space-y-6">
    @csrf

    <div>
      <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Book Title</label>
      <input
        type="text"
        name="title"
        id="title"
        value="{{ old('title') }}"
        class="w-full px-3 py-2 border border-gray-300 rounded-md text-gray-700 focus:outline-none focus:ring-2 focus:ring-accent"
        placeholder="e.g. The Great Gatsby"
        required
      />
    </div>

    <div>
      <label for="category_id" class="block text-sm font-medium text-gray-700 mb-1">Category</label>
      <select
        name="category_id"
        id="category_id"
        class="w-full px-3 py-2 border border-gray-300 rounded-md text-gray-700 focus:outline-none focus:ring-2 focus:ring-accent"
        required
      >
        <option value="">Select a Category</option>
        @foreach ($categories as $category)
          <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
            {{ $category->name }}
          </option>
        @endforeach
      </select>
    </div>

    <div>
      <label for="author_id" class="block text-sm font-medium text-gray-700 mb-1">Author</label>
      <select
        name="author_id"
        id="author_id"
        class="w-full px-3 py-2 border border-gray-300 rounded-md text-gray-700 focus:outline-none focus:ring-2 focus:ring-accent"
        required
      >
        <option value="">Select an Author</option>
        @foreach ($authors as $author)
          <option value="{{ $author->id }}" {{ old('author_id') == $author->id ? 'selected' : '' }}>
            {{ $author->name }}
          </option>
        @endforeach
      </select>
    </div>
    
    <div>
      <label for="published_at" class="block text-sm font-medium text-gray-700 mb-1">Published Date</label>
      <input
        type="date"
        name="published_at"
        id="published_at"
        value="{{ old('published_at') }}"
        class="w-full px-3 py-2 border border-gray-300 rounded-md text-gray-700 focus:outline-none focus:ring-2 focus:ring-accent"
        required
      />
    </div>

    <div class="flex items-center justify-between pt-4 border-t border-gray-200">
      <a
        href="{{ route('books.index') }}"
        class="text-sm font-medium text-gray-600 hover:text-primary"
      >
        &larr; Back to Books
      </a>
      <button
        type="submit"
        class="px-6 py-2 bg-accent text-gray-800 font-medium rounded-lg hover:bg-accent/90 transition"
      >
        Add Book
      </button>
    </div>
  </form>
</div>
@endsection
