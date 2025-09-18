<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Homepage</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

    <header class="bg-white shadow-md">
        <nav class="container mx-auto px-4 py-4 flex justify-between items-center">
            <a href="#" class="text-xl font-bold text-gray-800">My Website</a>
            
            <div class="hidden md:block"> 
        <div class="ml-10 flex items-baseline space-x-4"> 
        <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link> 
        <x-nav-link href="/about" :active="request()->is('about')">About</x-nav-link> 
        <x-nav-link href="/contact" :active="request()->is('contact')">Contact</x-nav-link> 
        <x-nav-link href="/users" :active="request()->is('users')">Users</x-nav-link> 
    </div> 
</div> 
        </nav>
    </header>

    <main class="container mx-auto px-4 py-8">
        <section class="bg-white p-8 rounded-lg shadow-md">
            <h1 class="text-4xl font-bold text-center text-gray-800 mb-4">
                {{$heading}} 
            </h1>

        </section>
        {{  $slot  }}
    </main>

    <footer class="bg-gray-800 text-white py-6 mt-8">
        <div class="container mx-auto px-4 text-center">
            <p>&copy; 2023 My Website. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>