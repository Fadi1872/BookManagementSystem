@extends('layouts.mainLayout')

@section('content')
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h1 class="text-3xl font-semibold text-primary mb-6">Create New Category</h1>

        <form action="{{ route('categories.store') }}" method="POST" class="bg-white shadow-md rounded-xl p-6 space-y-6">
            @csrf

            <div class="form-group">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Category Name</label>
                <input type="text" name="name" id="name"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md text-gray-700 focus:outline-none focus:ring-2 focus:ring-accent"
                    value="{{ old('name') }}" required>

                @error('name')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex items-center justify-between pt-4 border-t border-gray-200">
                <a
                  href="{{ route('categories.index') }}"
                  class="text-sm font-medium text-gray-600 hover:text-primary"
                >
                  &larr; Back to Categories
                </a>
                <button
                  type="submit"
                  class="px-6 py-2 bg-accent text-gray-800 font-medium rounded-lg hover:bg-accent/90 transition"
                >
                  Save Category
                </button>
              </div>
        </form>
    </div>
@endsection
