<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <h1>Video Games Quiz</h1>

    <form action="{{ route('quiz.process') }}" method="POST">
        @csrf
        @foreach ($questions as $index => $question)
            <div class="question">
                <h2>{!! $question['question'] !!}</h2>
                <div class="options">
                    @php
                        $options = array_merge([$question['correct_answer']], $question['incorrect_answers']);
                        shuffle($options);
                    @endphp
                    @foreach ($options as $option)
                        <label>
                            <input type="radio" name="answers[{!! $index !!}]" value="{!! $option !!}">
                            {!! $option !!}
                        </label>
                    @endforeach
                </div>
                <input type="hidden" name="correct_answers[{{ $index }}]" value="{{ $question['correct_answer'] }}">
            </div>
        @endforeach
        <button type="submit">Submit Answers</button>
    </form>
</body>
</html>
