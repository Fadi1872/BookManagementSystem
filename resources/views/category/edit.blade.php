@extends('layouts.mainLayout')

@section('title', 'Edit Category - ' . $category->name)

@section('content')
<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
  <h1 class="text-3xl font-semibold text-primary mb-6">Edit Category</h1>

  @if ($errors->any())
    <div class="mb-6 bg-red-50 border border-red-200 text-red-800 p-4 rounded-md">
      <ul class="list-disc list-inside">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('categories.update', $category) }}" method="POST" class="bg-white shadow-md rounded-xl p-6 space-y-6">
    @csrf
    @method('PUT')

    <div>
      <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Category Name</label>
      <input
        type="text"
        name="name"
        id="name"
        value="{{ old('name', $category->name) }}"
        class="w-full px-3 py-2 border border-gray-300 rounded-md text-gray-700 focus:outline-none focus:ring-2 focus:ring-accent"
        placeholder="e.g. Fiction"
        required
      />
    </div>

    <div class="flex items-center justify-between pt-4 border-t border-gray-200">
      <a
        href="{{ route('categories.show', $category) }}"
        class="text-sm font-medium text-gray-600 hover:text-primary"
      >
        &larr; Back to Category
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
@endsection
