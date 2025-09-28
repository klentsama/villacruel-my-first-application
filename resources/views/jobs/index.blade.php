<x-layout>
 <x-slot:heading>
        Job Listings
 </x-slot:heading>

 {{-- Create Job Button --}}
 <div class="flex justify-end mb-6">
     <a href="{{ route('jobs.create') }}"
        class="inline-block bg-blue-600 text-white px-5 py-2 rounded-lg shadow hover:bg-blue-700 transition">
         + Create Job
     </a>

     
 </div>

 <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
     @foreach ($jobs as $job)
         <a href="/jobs/{{ $job->id }}" 
            class="block p-6 bg-white border border-gray-200 rounded-xl shadow-md hover:shadow-xl transition-transform duration-300 hover:-translate-y-1">
             
             <strong class="text-laracasts">{{ $job->employer->name }}:</strong>
             {{ $job->title }} pays {{ $job->salary }} per year.

             <div class="flex items-center justify-between mb-4">
                 <h2 class="text-xl font-bold text-gray-900">
                     {{ $job->title }}
                 </h2>
                 <span class="text-sm bg-blue-100 text-blue-600 font-semibold px-3 py-1 rounded-full">
                     {{ $job->type ?? 'Full-time' }}
                 </span>
             </div>

             <p class="text-gray-700 mb-4">
                 {{ $job->description ?? 'Exciting opportunity awaits!' }}
             </p>

             <div class="flex justify-between items-center text-sm text-gray-500 mb-3">
                 <span class="font-medium text-gray-800">
                     💰 ${{ $job->salary }} / year
                 </span>
                 <span class="text-blue-600 font-semibold hover:underline">
                     View Details →
                 </span>
             </div>

             {{-- Job Tags --}}
             <div class="flex flex-wrap gap-2">
                 @foreach ($job->tags as $tag)
                     <span class="bg-gray-200 text-gray-700 text-xs font-semibold px-2.5 py-0.5 rounded-full">
                         {{ $tag->name }}
                     </span>
                 @endforeach
             </div>
         </a>
     @endforeach
 </div>
    <div class="mt-6"> 
        {{ $jobs->links() }} 
    </div> 

</x-layout>
