@extends('layouts.mainLayout')

@section('title', $author->name)

@section('content')
<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
  <div class="bg-white shadow-md rounded-xl p-6">
    <div class="mb-6">
      <h1 class="text-3xl font-bold text-primary mb-1">{{ $author->name }}</h1>
      <p class="text-gray-600 text-sm">Author Profile</p>
    </div>

    <div class="space-y-4">
      <div>
        <h2 class="text-sm font-medium text-gray-500 uppercase tracking-wide">Nationality</h2>
        <p class="text-lg text-gray-800">{{ $author->nationality }}</p>
      </div>

      <div>
        <h2 class="text-sm font-medium text-gray-500 uppercase tracking-wide">Date of Birth</h2>
        <p class="text-lg text-gray-800">
          {{ \Carbon\Carbon::parse($author->date_of_birth)->format('F j, Y') }}
        </p>
      </div>
    </div>

    <div class="mt-8 flex justify-between items-center border-t pt-4">
      <a
        href="{{ route('authors.index') }}"
        class="text-sm text-gray-600 hover:text-primary"
      >
        &larr; Back to Authors
      </a>
      <div class="space-x-2">
        <a
          href="{{ route('authors.edit', $author) }}"
          class="inline-block px-4 py-2 text-sm bg-accent text-white rounded-lg hover:bg-accent/90"
        >
          Edit
        </a>
        <form action="{{ route('authors.destroy', $author) }}" method="POST" class="inline-block"
              onsubmit="return confirm('Are you sure you want to delete this author?');">
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
