@extends('layouts.mainLayout')

@section('title', 'Edit Book')

@section('content')
<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
  <div class="bg-white shadow-md rounded-xl p-6">
    <h1 class="text-2xl font-bold text-primary mb-6">Edit Book</h1>

    <form action="{{ route('books.update', $book) }}" method="POST" class="space-y-6">
      @csrf
      @method('PUT')

      <div>
        <label for="title" class="block text-sm font-medium text-gray-700">Book Title</label>
        <input type="text" name="title" id="title" value="{{ old('title', $book->title) }}"
          class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-accent focus:ring-accent" required>
        @error('title')
          <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label for="published_at" class="block text-sm font-medium text-gray-700">Published Date</label>
        <input type="date" name="published_at" id="published_at" value="{{ old('published_at', \Carbon\Carbon::parse($book->published_at)->format('Y-m-d')) }}"
          class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-accent focus:ring-accent" required>
        @error('published_at')
          <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label for="category_id" class="block text-sm font-medium text-gray-700">Category</label>
        <select name="category_id" id="category_id"
          class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-accent focus:ring-accent" required>
          <option disabled selected value="">-- Select Category --</option>
          @foreach ($categories as $category)
            <option value="{{ $category->id }}" @selected(old('category_id', $book->category_id) == $category->id)>
              {{ $category->name }}
            </option>
          @endforeach
        </select>
        @error('category_id')
          <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label for="author_id" class="block text-sm font-medium text-gray-700">Author</label>
        <select name="author_id" id="author_id"
          class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-accent focus:ring-accent" required>
          <option disabled selected value="">-- Select Author --</option>
          @foreach ($authors as $author)
            <option value="{{ $author->id }}" @selected(old('author_id', $book->author_id) == $author->id)>
              {{ $author->name }}
            </option>
          @endforeach
        </select>
        @error('author_id')
          <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div class="flex items-center justify-between pt-4 border-t border-gray-200">
        <a
          href="{{ route('books.show', $book) }}"
          class="text-sm font-medium text-gray-600 hover:text-primary"
        >
          &larr; Back to Author
        </a>
        <button
          type="submit"
          class="px-6 py-2 bg-accent text-gray-800 font-medium rounded-lg hover:bg-accent/90 transition"
        >
          Save Changes
        </button>
      </div>
    </form>
  </div>
</div>
@endsection
