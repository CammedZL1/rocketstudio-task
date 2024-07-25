<nav class="bg-blue-600 p-4">
    <div class="container mx-auto flex justify-between items-center">
        <!-- Logo or Brand Name -->
        <a href="{{ route('index') }}" class="text-white text-2xl font-bold">MySite</a>

        <!-- Navbar Links -->
        <div class="space-x-4">
            <a href="{{ route('index') }}" class="text-white hover:text-gray-300 text-lg">Home</a>
            <a href="{{ route('sort') }}" class="text-white hover:text-gray-300 text-lg">Sort</a>
        </div>
    </div>
</nav>
