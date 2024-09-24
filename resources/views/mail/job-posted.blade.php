<x-mail::message>
    <h2>{{ $job->title }}</h2>

    Congratulations! Your Job is now live on our website.
    <p><a href="{{ url('/jobs/' . $job->id) }}">View your job listings</a></p>

    Thanks,
    {{ config('app.name') }}

</x-mail::message>
