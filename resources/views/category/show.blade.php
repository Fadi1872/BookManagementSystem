@extends('layouts.mainLayout')

@section('title', $category->name)

@section('content')
<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
  <div class="bg-white shadow-md rounded-xl p-6">
    <div class="mb-6">
      <h1 class="text-3xl font-bold text-primary mb-1">{{ $category->name }}</h1>
    </div>

    <div class="mt-8 flex justify-between items-center border-t pt-4">
      <a
        href="{{ route('categories.index') }}"
        class="text-sm text-gray-600 hover:text-primary"
      >
        &larr; Back to Categories
      </a>
      <div class="space-x-2">
        <a
          href="{{ route('categories.edit', $category) }}"
          class="inline-block px-4 py-2 text-sm bg-accent text-gray-800 rounded-lg hover:bg-accent/90"
        >
          Edit
        </a>
        <form action="{{ route('categories.destroy', $category) }}" method="POST" class="inline-block"
              onsubmit="return confirm('Are you sure you want to delete this category?');">
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
