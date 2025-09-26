<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $heading ?? 'My Website' }}</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="bg-gradient-to-br from-gray-50 to-gray-200 font-sans antialiased">


<header class="bg-white shadow-md">
<nav class="container mx-auto px-4 py-4 flex justify-between items-center">
    <a href="/" class="text-2xl font-bold text-gray-800 tracking-tight hover:text-blue-600 transition duration-300">My Website</a>
    <div class="hidden md:flex items-center space-x-6"> 
        <div class="flex items-baseline space-x-4"> 
            <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link> 
            <x-nav-link href="/jobs" :active="request()->is('jobs') || request()->is('jobs/*')">Jobs</x-nav-link>  
            <x-nav-link href="/jobs/create"> Create Job</x-nav-link> 
        </div>
    </div>

</nav>

</header>


    <main class="container mx-auto px-4 py-8">
        <section class="bg-white p-8 rounded-xl shadow-lg">
            <h1 class="text-4xl font-extrabold text-center text-gray-900 mb-6">
                {{ $heading }}
            </h1>
        </section>

        {{ $slot }}
        </main>


        <footer class="bg-gray-800 text-white py-6 mt-12">
            <div class="container mx-auto px-4 text-center">
                <p>&copy; 2023 My Website. All rights reserved.</p>
            </div>
        </footer>

    </body>
</html>
