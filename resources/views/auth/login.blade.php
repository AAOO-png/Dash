<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Include Alpine.js -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs" defer></script>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-r from-blue-400 to-indigo-600 p-6">
        <div class="w-full max-w-md bg-white rounded-lg shadow-lg p-8 space-y-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-gray-900">Welcome Back!</h2>
                <p class="text-sm text-gray-500">Please sign in to your account</p>
            </div>
            <form class="space-y-6" action="{{ route('login') }}" method="POST">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label for="email" class="sr-only">Email address</label>
                        <input id="email" name="email" type="email" required class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 placeholder-gray-400 text-gray-900 sm:text-sm" placeholder="Email address">
                    </div>
                    <div>
                        <label for="password" class="sr-only">Password</label>
                        <input id="password" name="password" type="password" required class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 placeholder-gray-400 text-gray-900 sm:text-sm" placeholder="Password">
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember_me" name="remember" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                        <label for="remember_me" class="ml-2 block text-sm text-gray-900">Remember me</label>
                    </div>
                    <div class="text-sm">
                        <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">Lupa Password?</a>
                    </div>
                </div>

                <div>
                    <button type="submit" class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-lg text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Sign in
                    </button>
                </div>
            </form>

            <div class="text-center mt-6">
                <p class="text-sm text-gray-600">Belum Terdaftar? 
                    <a href="{{ route('register') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                        Daftar Disini
                    </a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>
