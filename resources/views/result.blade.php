<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Result</title>
    <link href="{{ asset('css/result.css') }}" rel="stylesheet">
</head>
<body>
    <h1>Quiz Result</h1>
    <div class="score">
        <p>Your score: {{ $score }}%</p>
    </div>
    <div class="button">
      <a href="{{ route('quiz.start') }}">Start Again</a>
    </div>
</body>
</html>
