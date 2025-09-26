<x-layout>
    <x-slot:heading>
        Edit Job
    </x-slot:heading>

    <form method="POST" action="/jobs/{{ $job->id }}">
        @csrf
        @method('PATCH')

        <div class="space-y-6">
            <div>
                <label for="title" class="block text-sm font-medium">Title</label>
                <input type="text" name="title" id="title" 
                       value="{{ old('title', $job->title) }}"
                       class="mt-1 block w-full border rounded p-2">

                @error('title')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="salary" class="block text-sm font-medium">Salary</label>
                <input type="text" name="salary" id="salary"
                       value="{{ old('salary', $job->salary) }}"
                       class="mt-1 block w-full border rounded p-2">

                @error('salary')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="mt-6 flex items-center justify-between">
            <button type="submit" 
                    class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-500">
                Save Changes
            </button>

            <!-- Delete button -->
            <button form="delete-form" class="text-red-500">Delete</button>
        </div>
    </form>

    <!-- Hidden Delete Form -->
    <form method="POST" action="/jobs/{{ $job->id }}" id="delete-form" class="hidden">
        @csrf
        @method('DELETE')
    </form>
</x-layout>
