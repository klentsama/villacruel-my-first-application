<x-layout>
    <x-slot:heading>
        Create a New Job
    </x-slot:heading>

    {{-- Back to Job Listings --}}
    <div class="flex justify-end mb-6">
        <a href="/jobs"
           class="inline-block bg-gray-200 text-gray-700 px-5 py-2 rounded-lg shadow hover:bg-gray-300 transition">
            ← Back to Jobs
        </a>
    </div>

    <div class="max-w-2xl mx-auto bg-white p-8 rounded-xl shadow-md border border-gray-200">
        <form method="POST" action="/jobs">
            @csrf

        {{-- Job Title --}}
            <div class="mb-4">
                <label for="title" class="block text-sm font-semibold text-gray-700">Job Title</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                       placeholder="e.g. Software Engineer" required>
                @error('title')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Employer --}}
            <div class="mb-4">
                <label for="employer_id" class="block text-sm font-semibold text-gray-700">Employer</label>
                <select name="employer_id" id="employer_id"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" required>
                    <option value="">-- Select Employer --</option>
                    @foreach ($employers as $employer)
                        <option value="{{ $employer->id }}" {{ old('employer_id') == $employer->id ? 'selected' : '' }}>
                            {{ $employer->name }}
                        </option>
                    @endforeach
                </select>
                @error('employer_id')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Salary --}}
            <div class="mb-4">
                <label for="salary" class="block text-sm font-semibold text-gray-700">Salary (per year)</label>
                <input type="number" name="salary" id="salary" value="{{ old('salary') }}"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                       placeholder="50000" required>
                @error('salary')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Type --}}
            <div class="mb-4">
                <label for="type" class="block text-sm font-semibold text-gray-700">Job Type</label>
                <select name="type" id="type"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
                    <option value="Full-time" {{ old('type') == 'Full-time' ? 'selected' : '' }}>Full-time</option>
                    <option value="Part-time" {{ old('type') == 'Part-time' ? 'selected' : '' }}>Part-time</option>
                    <option value="Contract" {{ old('type') == 'Contract' ? 'selected' : '' }}>Contract</option>
                </select>
            </div>

            {{-- Tags --}}
            <div class="mb-6">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Tags</label>
                <div class="flex flex-wrap gap-3">
                    @foreach ($tags as $tag)
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                                class="rounded border-gray-300 text-blue-600 focus:ring focus:ring-blue-200"
                                {{ (is_array(old('tags')) && in_array($tag->id, old('tags'))) ? 'checked' : '' }}>
                            <span class="text-sm text-gray-700">{{ $tag->name }}</span>
                        </label>
                    @endforeach
                </div>
                @error('tags')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Submit Button --}}
            <div class="flex justify-end">
                <button type="submit"
                        class="bg-blue-600 text-white px-6 py-2 rounded-lg shadow hover:bg-blue-700 transition">
                    Create Job
                </button>
            </div>
        </form>
    </div>
</x-layout>
