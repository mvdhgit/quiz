<?php

use App\Http\Controllers\APIController;
use Illuminate\Support\Facades\Route;

// Quiz pagina weergave, roept index methode aan in APIController class
Route::get('/', [APIController::class, 'index'])->name('quiz.start');

// deze route wordt geactiveerd zodra de quizform wordt ingediend, roepts process methode aan
Route::post('/process-answer', [APIController::class, 'processAnswer'])->name('quiz.process');

// verantwoordelijk voor het weergeven van result pagina
Route::get('/result', [APIController::class, 'showResult'])->name('quiz.result');
