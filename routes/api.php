<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AcademicClassController;
use App\Http\Controllers\AcademicSubjectController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\HeadingController;
use App\Http\Controllers\SubHeadingController;
use App\Http\Controllers\QuestionController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('/academic-classes')->group(function () {
    Route::get('/', [AcademicClassController::class, 'index'])->name('academicClass.index');
    Route::post('/', [AcademicClassController::class, 'store'])->name('academicClass.store');
    Route::get('/{academicClass}', [AcademicClassController::class, 'show'])->name('academicClass.show');
    Route::post('/{academicClass}', [AcademicClassController::class, 'update'])->name('academicClass.update');
    Route::delete('/{academicClass}', [AcademicClassController::class, 'destroy'])->name('academicClass.destroy');
});
Route::prefix('/academic-subjects')->group(function () {
    Route::get('/', [AcademicSubjectController::class, 'index'])->name('academicSubject.index');
    Route::post('/', [AcademicSubjectController::class, 'store'])->name('academicSubject.store');
    Route::get('/{academicSubject}', [AcademicSubjectController::class, 'show'])->name('academicSubject.show');
    Route::post('/{academicSubject}', [AcademicSubjectController::class, 'update'])->name('academicSubject.update');
    Route::delete('/{academicSubject}', [AcademicSubjectController::class, 'destroy'])->name('academicSubject.destroy');
});
Route::prefix('/chapters')->group(function () {
    Route::get('/', [ChapterController::class, 'index'])->name('chapter.index');
    Route::post('/', [ChapterController::class, 'store'])->name('chapter.store');
    Route::get('/{chapter}', [ChapterController::class, 'show'])->name('chapter.show');
    Route::post('/{chapter}', [ChapterController::class, 'update'])->name('chapter.update');
    Route::delete('/{chapter}', [ChapterController::class, 'destroy'])->name('chapter.destroy');
});
Route::prefix('/headings')->group(function () {
    Route::get('/', [HeadingController::class, 'index'])->name('heading.index');
    Route::post('/', [HeadingController::class, 'store'])->name('heading.store');
    Route::get('/{heading}', [HeadingController::class, 'show'])->name('heading.show');
    Route::post('/{heading}', [HeadingController::class, 'update'])->name('heading.update');
    Route::delete('/{heading}', [HeadingController::class, 'destroy'])->name('heading.destroy');
});
Route::prefix('/sub-headings')->group(function () {
    Route::get('/', [SubHeadingController::class, 'index'])->name('subHeading.index');
    Route::post('/', [SubHeadingController::class, 'store'])->name('subHeading.store');
    Route::get('/{subHeading}', [SubHeadingController::class, 'show'])->name('subHeading.show');
    Route::post('/{subHeading}', [SubHeadingController::class, 'update'])->name('subHeading.update');
    Route::delete('/{subHeading}', [SubHeadingController::class, 'destroy'])->name('subHeading.destroy');
});
Route::prefix('/questions')->group(function () {
    Route::get('/', [QuestionController::class, 'index'])->name('question.index');
    Route::post('/', [QuestionController::class, 'store'])->name('question.store');
    Route::get('/{question}', [QuestionController::class, 'show'])->name('question.show');
    Route::post('/{question}', [QuestionController::class, 'update'])->name('question.update');
    Route::delete('/{question}', [QuestionController::class, 'destroy'])->name('question.destroy');
});
