<x-layout>
    <x-slot:heading>
        Jobs
    </x-slot:heading>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($jobs as $job)
            <a href="/jobs/{{ $job['id'] }}" 
               class="block p-6 bg-white border border-gray-200 rounded-xl shadow-md hover:shadow-xl transition-transform duration-300 hover:-translate-y-1">
                
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-xl font-bold text-gray-900">
                        {{ $job['title'] }}
                    </h2>
                    <span class="text-sm bg-blue-100 text-blue-600 font-semibold px-3 py-1 rounded-full">
                        {{ $job['type'] ?? 'Full-time' }}
                    </span>
                </div>

                <p class="text-gray-700 mb-4">
                    {{ $job['description'] ?? 'Exciting opportunity awaits!' }}
                </p>

                <div class="flex justify-between items-center text-sm text-gray-500">
                    <span class="font-medium text-gray-800">
                        💰 ${{ $job['salary'] }} / year
                    </span>
                    <span class="text-blue-600 font-semibold hover:underline">
                        View Details →
                    </span>
                </div>
            </a>
        @endforeach
    </div>
</x-layout>
