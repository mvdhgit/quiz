<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Score</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <h1>Quiz Score</h1>
    <p>Total Score: {{ $totalScore }}</p>
    <a href="{{ route('index') }}">Back to Quiz</a>
</body>
</html>
