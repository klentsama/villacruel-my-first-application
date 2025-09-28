<x-layout>
    <x-slot:heading>
        {{ $job->title }}
    </x-slot:heading>

    {{-- Back to Jobs --}}
    <div class="flex justify-end mb-6">
        <a href="/jobs"
           class="inline-block bg-gray-200 text-gray-700 px-5 py-2 rounded-lg shadow hover:bg-gray-300 transition">
            ← Back to Jobs
        </a>
    </div>

    {{-- Job Details --}}
    <div class="p-6 bg-white border rounded-xl shadow-md">
        <h2 class="text-2xl font-bold text-gray-800">{{ $job->title }}</h2>
        <p class="text-gray-600 mt-2">
            Employer: {{ $job->employer->name ?? 'No Employer' }}
        </p>
        <p class="text-gray-600">Salary: ${{ number_format((float) $job->salary) }}</p>

        {{-- Tags --}}
        <div class="mt-3 flex flex-wrap gap-2">
            @foreach ($job->tags as $tag)
                <span class="px-3 py-1 text-sm bg-gray-100 text-gray-700 rounded-full">
                    {{ $tag->name }}
                </span>
            @endforeach
        </div>

        {{-- Actions --}}
        <div class="mt-6 flex space-x-4">
            <a href="/jobs/{{ $job->id }}/edit"
               class="bg-blue-600 text-white px-5 py-2 rounded-lg shadow hover:bg-blue-700 transition">
                Edit
            </a>

            <form method="POST" action="/jobs/{{ $job->id }}" onsubmit="return confirm('Are you sure you want to delete this job?');">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="bg-red-600 text-white px-5 py-2 rounded-lg shadow hover:bg-red-700 transition">
                    Delete
                </button>
            </form>
        </div>
    </div>
</x-layout>
