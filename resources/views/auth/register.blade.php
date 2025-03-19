<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <!-- Include Tailwind CSS from CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-blue-100  items-center justify-center h-screen">

    <form method="POST" action="{{ route('register') }}"
        class="max-w-lg mx-auto p-6 bg-white shadow-lg rounded-lg mt-10">
        @csrf
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-center text-blue-900">¡El Aguaaaa!</h2>

        </div>
        <!-- Name -->
        <div class="mb-6">
            <label for="name" class="block text-lg font-semibold text-gray-700">Name</label>
            <input id="name"
                class="block mt-2 w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
                type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
            @error('name')
                <div class="mt-2 text-sm text-red-600">{{ $message }}</div>
            @enderror
        </div>

        <!-- Email Address -->
        <div class="mb-6">
            <label for="email" class="block text-lg font-semibold text-gray-700">Email</label>
            <input id="email"
                class="block mt-2 w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
                type="email" name="email" value="{{ old('email') }}" required autocomplete="username">
            @error('email')
                <div class="mt-2 text-sm text-red-600">{{ $message }}</div>
            @enderror
        </div>

        <!-- Password -->
        <div class="mb-6">
            <label for="password" class="block text-lg font-semibold text-gray-700">Password</label>
            <input id="password"
                class="block mt-2 w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
                type="password" name="password" required autocomplete="new-password">
            @error('password')
                <div class="mt-2 text-sm text-red-600">{{ $message }}</div>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div class="mb-6">
            <label for="password_confirmation" class="block text-lg font-semibold text-gray-700">Confirm
                Password</label>
            <input id="password_confirmation"
                class="block mt-2 w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
                type="password" name="password_confirmation" required autocomplete="new-password">
            @error('password_confirmation')
                <div class="mt-2 text-sm text-red-600">{{ $message }}</div>
            @enderror
        </div>

        <!-- Actions -->
        <div class="flex items-center justify-between mt-6">
            <a class="text-sm text-indigo-600 hover:text-indigo-700" href="{{ route('login') }}">
                Already registered?
            </a>

            </a>

            <button type="submit"
                class="px-6 py-3 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                Register
            </button>
        </div>
    </form>

</body>

</html>