@extends('layouts.mainLayout')

@section('title', 'All Categories')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
  <div class="flex items-center justify-between mb-6">
    <h1 class="text-3xl font-semibold text-primary">All Categories</h1>
    <a
      href="{{ route('categories.create') }}"
      class="inline-flex items-center px-4 py-2 bg-accent text-gray-800 text-sm font-medium rounded-lg shadow hover:bg-accent/90 transition"
    >
      + Add New Category
    </a>
  </div>

  @if($categories->isEmpty())
    <p class="text-gray-600">No categories found. <a href="{{ route('categories.create') }}" class="text-accent hover:underline">Add your first category</a>!</p>
  @else
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
      @foreach($categories as $category)
        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-200">
          <div class="p-4">
            <h2 class="text-xl font-bold mb-2">{{ $category->name }}</h2>
            <p class="text-sm text-gray-600 mb-4">{{ $category->description }}</p>
            <div class="flex justify-between items-center">
              <a
                href="{{ route('categories.show', $category) }}"
                class="text-sm font-medium hover:text-accent"
              >View</a>
              <a
                href="{{ route('categories.edit', $category) }}"
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
