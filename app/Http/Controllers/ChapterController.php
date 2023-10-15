<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreChapterRequest;
use App\Http\Requests\UpdateChapterRequest;
use App\Models\Chapter;
use App\Http\Resources\SuccessResource;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $subjectId = $request->query('subjectId');
        $chapters =  Chapter::where('academic_subject_id', $subjectId)->get();
        return new SuccessResource('Success', $chapters, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreChapterRequest $request)
    {
        $chapter = Chapter::create($request->validated());
        return new SuccessResource('Created', $chapter, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Chapter $chapter)
    {
        return new SuccessResource('Success', $chapter, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateChapterRequest $request, Chapter $chapter)
    {
        $chapter->update($request->validated());
        $chapter = $chapter->fresh();
        return new SuccessResource('Updated', $chapter, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chapter $chapter)
    {
        $chapter->delete();
        return new SuccessResource("Deleted", [], 204);
    }
}
