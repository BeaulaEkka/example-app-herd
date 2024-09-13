<x-layout>
    <x-slot:heading>
        Job Listings
    </x-slot:heading>
    <div>
        @foreach ($jobs as $job)
            <li>
                <a href="/jobs/{{ $job['id'] }}">
                    <strong>{{ $job['title'] }}:</strong> Pays €{{ $job['salary'] }} per year.
            </li>
            </a>
        @endforeach
        </ul>
</x-layout>
