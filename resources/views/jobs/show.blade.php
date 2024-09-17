<x-layout>
    <x-slot:heading>
        Job Details
    </x-slot:heading>
    <h2 class="font-semibold text-blue-600 text-xl mb-4">{{ $job->title }}</h2>
    <h3><strong>Company: </strong>{{ $job->employer->name }}</h3>
    <p>This job pays {{ $job->salary }} per year.</p>
    <h3 class="font-bold text-md py-2">Job Description:</h3>
    <p>{{ $job->description }} </p>
    <h3 class="font-bold text-md py-2">Location</h3>
    <p>{{ $job->location }}</p>
    <div class="my-8">
        @isset($tagNames)
            @if ($tagNames)
                @foreach ($tagNames as $tag)
                    <p class="px-4 py-2 border border-gray-300 inline-flex rounded-md shadow-sm capitalize">
                        {{ $tag }}
                    </p>
                @endforeach
            @else
                <p>No tags available.</p>
            @endif
        @else
            <p>No tags available.</p>
        @endisset

    </div>
    <div class="flex justify-end"><x-button href="/jobs/{{ $job->id }}/edit">Edit Job</x-button></div>

</x-layout>
