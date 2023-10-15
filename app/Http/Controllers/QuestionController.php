<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;
use App\Models\Chapter;
use App\Models\Question;
use App\Services\ImageService;
use App\Http\Resources\SuccessResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class QuestionController extends Controller
{
    public function __construct(private readonly ImageService $imageService)
    {
        //By using constructor property promotion syntax of php8
        //we can use $this->imageService anywhere in the Controller
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $chapterId = $request->query('chapterId');
        $academicSubjectId = $request->query('subjectId');
        $model = Question::when((isset($chapterId)), function ($query) use ($chapterId) {
            $query->where('chapter_id', $chapterId);
        })->when((isset($academicSubjectId)), function ($query) use ($academicSubjectId) {
            $query->where('academic_subject_id', $academicSubjectId);
        });
        $questions =  $model->get();
        return new SuccessResource('Success', $questions, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreQuestionRequest $request)
    {
        $question = new Question($request->validated());
        if (filled($request->file('image'))) {
            $pathAndUrl =$this->imageService->store($request->file('image'));
            $question->image_path = $pathAndUrl[0];
            $question->image_url = $pathAndUrl[1];
        }
        $chapter = Chapter::find($request->input('chapter_id'));
        $question->academic_subject_id = $chapter->academic_subject_id;
        $question->user_id = 1;
        $question->save();

        return new SuccessResource('Created', $question, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        return new SuccessResource('Success', $question, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateQuestionRequest $request, Question $question)
    {
        $question->update($request->validated()); //image_url is also updated here because it is also validated
        // I am doubtful in this logic
        if (filled($request->file('image'))) {
            //delete previous image if exist
            if (filled($question->image_path)) {
                Storage::disk('s3')->delete($question->image_path);
            }
            $pathAndUrl =$this->imageService->store($request->file('image'));
            $question->image_path = $pathAndUrl[0];
            $question->image_url = $pathAndUrl[1];
        }
        $chapter = Chapter::find($request->input('chapter_id'));
        $question->academic_subject_id = $chapter->academic_subject_id;
        $question->save();
        $question = $question->fresh();
        return new SuccessResource('Updated', $question, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        if (filled($question->image_path)) {
            Storage::disk('s3')->delete($question->image_path);
        }
        $question->delete();
        return new SuccessResource("Deleted", [], 204);
    }
}
