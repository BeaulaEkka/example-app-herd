<x-layout>
    <x-slot:heading>
        Job Details
    </x-slot:heading>
    <h2 class="font-semibold text-blue-600 text-xl mb-4">{{ $job->title }}</h2>
    <h3><strong>Company: </strong>{{ $job->employer->company_name }}</h3>
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

    <div class="flex justify-between items-center">
        <div>
            @can('edit', $job)
                <button form="delete-form"
                    class="bg-red-500 hover:bg-red-800 px-4 py-2 rounded-md text-white font-semibold">Delete</button>
            @endcan

        </div>
        <div class="flex justify-end">
            @can('edit', $job)
                <x-button href="/jobs/{{ $job->id }}/edit">Edit Job</x-button>
            @endcan
        </div>
    </div>

    <form method="POST" action="/jobs/{{ $job->id }}" id="delete-form">
        @csrf
        @method('DELETE')

    </form>
</x-layout>
