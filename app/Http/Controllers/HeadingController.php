<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHeadingRequest;
use App\Http\Requests\UpdateHeadingRequest;
use App\Models\Heading;
use App\Http\Resources\SuccessResource;
use Illuminate\Http\Request;

class HeadingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $chapterId = $request->query('chapterId');
        $headings =  Heading::where('chapter_id', $chapterId)->get();
        return new SuccessResource('Success', $headings, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHeadingRequest $request)
    {
        $heading = Heading::create($request->validated());
        return new SuccessResource('Created', $heading, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Heading $heading)
    {
        return new SuccessResource('Success', $heading, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHeadingRequest $request, Heading $heading)
    {
        $heading->update($request->validated());
        $heading = $heading->fresh();
        return new SuccessResource('Updated', $heading, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Heading $heading)
    {
        $heading->delete();
        return new SuccessResource("Deleted", [], 204);
    }
}
