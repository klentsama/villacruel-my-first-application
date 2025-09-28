<x-layout>
<x-slot:heading>
Job
</x-slot:heading>


<p class="text-sm text-gray-500">{{ $job->employer->name }}</p> 
<h2 class="font-bold text-lg">{{ $job['title'] }}</h2> 
<p> 
This job pays {{ $job['salary'] }} per year. 
</p>

<div class="flex justify-end mb-6">
    <a href="{{ route('jobs.edit', $job->id) }}"
       class="inline-block bg-yellow-500 text-white px-5 py-2 rounded-lg shadow hover:bg-yellow-600 transition">
        ✏️ Edit Job
    </a>

    <form method="POST" action="{{ route('jobs.delete', $job->id) }}">
    @csrf
    @method('DELETE')
    <button type="submit"
            class="bg-red-600 text-white px-4 py-2 rounded-lg shadow hover:bg-red-700 transition">
        Delete Job
    </button>
</form>

</div>


</x-layout>
