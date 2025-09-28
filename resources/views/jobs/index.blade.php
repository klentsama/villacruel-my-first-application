<x-layout>
    <x-slot:heading>
        Job Listings
    </x-slot:heading>

    {{-- Create Job Button --}}
    <div class="flex justify-end mb-6">
        <a href="/jobs/create"
           class="inline-block bg-blue-600 text-white px-5 py-2 rounded-lg shadow hover:bg-blue-700 transition">
            + Create Job
        </a>
    </div>

    {{-- Jobs List --}}
    <div class="space-y-6">
        @foreach ($jobs as $job)
            <div class="p-6 bg-white border rounded-xl shadow-md">
                <h2 class="text-xl font-semibold text-gray-800">
                    <a href="/jobs/{{ $job->id }}" class="hover:underline">
                        {{ $job->title }}
                    </a>
                </h2>
                <p class="text-gray-600">
                    {{ $job->employer->name ?? 'No Employer' }} — ${{ number_format((float) $job->salary) }}

                </p>

                {{-- Tags --}}
                <div class="mt-2 flex flex-wrap gap-2">
                    @foreach ($job->tags as $tag)
                        <span class="px-3 py-1 text-sm bg-gray-100 text-gray-700 rounded-full">
                            {{ $tag->name }}
                        </span>
                    @endforeach
                </div>

                {{-- Actions --}}
                <div class="mt-4 flex space-x-4">
                    <a href="/jobs/{{ $job->id }}/edit" class="text-blue-600 hover:underline">Edit</a>
                    
                    <form method="POST" action="/jobs/{{ $job->id }}" onsubmit="return confirm('Are you sure?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Pagination --}}
    <div class="mt-6">
        {{ $jobs->links() }}
    </div>
</x-layout>
