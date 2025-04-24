<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#1E3A8A',
                        accent: '#14B8A6',
                        bg: '#F3F4F6'
                    }
                }
            }
        }
    </script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-bg min-h-screen flex flex-col">

    <nav class="bg-primary shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <a href="{{ route('books.index') }}" class="text-2xl font-bold text-gray-800">📚 MyLibrary</a>
                <div class="space-x-4 flex items-center">
                    <a href="{{ route('books.index') }}"
                        class="px-3 py-2 rounded-md text-sm font-medium text-gray-800 hover:bg-accent">Books</a>
                    <a href="{{ route('authors.index') }}"
                        class="px-3 py-2 rounded-md text-sm font-medium text-gray-800 hover:bg-accent">Authors</a>
                    <a href="{{ route('categories.index') }}"
                        class="px-3 py-2 rounded-md text-sm font-medium text-gray-800 hover:bg-accent">Categories</a>
                </div>
            </div>
        </div>
    </nav>

    <main class="flex-1">
        @if (session('success'))
            <div class="mb-6 bg-green-50 border-l-4 border-green-400 text-green-800 p-4 rounded-md">
                <p class="font-semibold">Success!</p>
                <p>{{ session('success') }}</p>
            </div>
        @endif

        @if (session('error'))
            <div class="mb-6 bg-red-50 border-l-4 border-red-400 text-red-800 p-4 rounded-md">
                <p class="font-semibold">Error!</p>
                <p>{{ session('error') }}</p>
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="bg-white text-center text-gray-500 text-sm py-4 shadow-inner">
        &copy; {{ date('Y') }} MyLibrary.
    </footer>
</body>

</html>
