<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ $heading ?? 'My Website' }}</title>
<!-- Tailwind CSS CDN -->
<script src="https://cdn.tailwindcss.com"></script>
</head>
<!--
Choose a background color option by uncommenting one of the lines below
and commenting out the others.
-->
<!-- Soft Gradient Background (Current) -->
<body class="bg-gradient-to-br from-gray-50 to-gray-200 font-sans antialiased">
<!-- Warm Gradient Background -->
<!-- <body class="bg-gradient-to-br from-pink-100 via-orange-100 to-yellow-100 font-sans antialiased"> -->
<!-- Dark Gradient Background -->
<!-- <body class="bg-gradient-to-br from-gray-900 via-slate-800 to-gray-900 text-white font-sans antialiased"> -->

<!-- Header and Navigation -->

<header class="bg-white shadow-md">
<nav class="container mx-auto px-4 py-4 flex justify-between items-center">
<!-- Logo/Site Title -->
<a href="/" class="text-2xl font-bold text-gray-800 tracking-tight hover:text-blue-600 transition duration-300">My Website</a>

    <!-- Desktop Navigation Links -->
    <div class="hidden md:block"> 
        <div class="ml-10 flex items-baseline space-x-4"> 
            <!-- The x-nav-link components are used here -->
            <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link> 
            <x-nav-link href="/jobs" :active="request()->is('jobs') || request()->is('jobs/*')">Jobs</x-nav-link> 
        </div> 
    </div>
</nav>

</header>

<!-- Main Content Section -->

<main class="container mx-auto px-4 py-8">
<section class="bg-white p-8 rounded-xl shadow-lg">
<h1 class="text-4xl font-extrabold text-center text-gray-900 mb-6">
{{ $heading }}
</h1>
</section>

<!-- The main content from the child view will be injected here -->
{{ $slot }}

</main>

<!-- Footer -->

<footer class="bg-gray-800 text-white py-6 mt-12">
<div class="container mx-auto px-4 text-center">
<p>&copy; 2023 My Website. All rights reserved.</p>
</div>
</footer>

</body>
</html>