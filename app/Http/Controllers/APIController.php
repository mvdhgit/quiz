<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class APIController extends Controller
{
    public function index()
    {
        // http verzoek
        $response = Http::get('https://opentdb.com/api.php?amount=5&category=15');

        if ($response->successful()) {
            $data = $response->json();

            // sla de eerste 5 vragen/antwoorden op in array
            $questions = [];
            $results = array_slice($data['results'], 0, 5);

            foreach ($results as $result) {
                $question = [
                    'question' => $result['question'],
                    'correct_answer' => $result['correct_answer'],
                    'incorrect_answers' => $result['incorrect_answers'],
                ];
                $questions[] = $question;
            }

            return view('welcome', compact('questions'));
        }

        return view('error');
    }

    public function processAnswer(Request $request)
    {
        $selectedAnswers = $request->input('answers');
        $correctAnswers = $request->input('correct_answers');
    
        $score = 0;
    
        foreach ($selectedAnswers as $index => $selectedAnswer) {
            if ($selectedAnswer === $correctAnswers[$index]) {
                $score++;
            }
        }
    
        $totalQuestions = count($selectedAnswers);
        $percentageScore = ($score / $totalQuestions) * 100;
    
        Session::put('quiz_score', $percentageScore);
    
        return redirect()->route('quiz.result');
    }

    public function showResult()
    {
        $score = Session::get('quiz_score');
        Session::forget('quiz_score');

        return view('result', compact('score'));
    }
}
