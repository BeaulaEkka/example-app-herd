<!DOCTYPE html>
<html>

<head>
    <title>Job Posted</title>
</head>

<body style="padding: 20px; text-align: center;">
    <h2>Title: {{ $job->title }}</h2>

    <p style="font-weight: bold;">Dear {{ $job->employer->user->first_name }},</p>

    <p>Congratulations! Your job is now live on our website.</p>

    <p><a href="{{ $url }}">View your job listing</a></p>

    <p>Thanks,<br>Beaula</p>
</body>

</html>
