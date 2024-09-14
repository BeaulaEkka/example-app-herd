<x-layout>
    <x-slot:heading>
        Job Listings
    </x-slot:heading>
    <div>
        @foreach ($jobs as $job)
            <div class="my-5 hover:bg-gray-200 rounded-md cursor-pointer">
                <a href="/jobs/{{ $job['id'] }}" class=" block px-4 py-6 border border-gray-200 rounded-md">
                    <div class=" text-blue-600 font-bold">{{ $job->employer->name }}</div>
                    <strong>{{ $job['title'] }}:</strong> Pays €{{ $job['salary'] }} per year.

                </a>
            </div>
        @endforeach
        <div>{{ $jobs->links() }}</div>
    </div>
</x-layout>
