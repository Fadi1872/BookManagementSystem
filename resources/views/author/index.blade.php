@extends('layouts.mainLayout')

@section('title', 'All Authors')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
  <div class="flex items-center justify-between mb-6">
    <h1 class="text-3xl font-semibold text-primary">All Authors</h1>
    <a
      href="{{ route('authors.create') }}"
      class="inline-flex items-center px-4 py-2 bg-accent text-gray-800 text-sm font-medium rounded-lg shadow hover:bg-accent/90 transition"
    >
      + Add New Author
    </a>
  </div>

  @if($authors->isEmpty())
    <p class="text-gray-600">No authors found. <a href="{{ route('authors.create') }}" class="text-accent hover:underline">Add your first author</a>!</p>
  @else
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
      @foreach($authors as $author)
        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-200">
          <div class="p-4">
            <h2 class="text-xl font-bold mb-2">{{ $author->name }}</h2>
            <p class="text-sm text-gray-600 mb-1"><strong>Nationality:</strong> {{ $author->nationality }}</p>
            <p class="text-sm text-gray-600 mb-4"><strong>DOB:</strong> {{ \Carbon\Carbon::parse($author->date_of_birth)->format('F j, Y') }}</p>
            <div class="flex justify-between items-center">
              <a
                href="{{ route('authors.show', $author) }}"
                class="text-sm font-medium hover:text-accent"
              >View</a>
              <a
                href="{{ route('authors.edit', $author) }}"
                class="text-sm font-medium text-gray-600 hover:text-primary"
              >Edit</a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  @endif
</div>
@endsection
