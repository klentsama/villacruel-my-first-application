<x-layout>
    <x-slot:heading>
        {{ $job->title }}
    </x-slot:heading>

    <section class="bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold">{{ $job->title }}</h1>
        <p class="mt-2 text-gray-700">Salary: {{ $job->salary }}</p>
        <p class="mt-2 text-gray-500">Employer: {{ $job->employer->name ?? 'Unknown' }}</p>
    </section>

    <div class="mt-6">
        <!-- Edit Job button -->
        <a href="/jobs/{{ $job->id }}/edit"
           class="inline-block px-4 py-2 rounded bg-indigo-600 text-white font-semibold hover:bg-indigo-500">
            Edit Job
        </a>
    </div>
</x-layout>
