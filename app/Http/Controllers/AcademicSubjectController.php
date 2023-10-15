<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAcademicSubjectRequest;
use App\Http\Requests\UpdateAcademicSubjectRequest;
use App\Models\AcademicSubject;
use App\Http\Resources\SuccessResource;
use Illuminate\Http\Request;

class AcademicSubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $classId = $request->query('classId');
        $academicSubjects =  AcademicSubject::where('academic_class_id', $classId)->get();
        return new SuccessResource('Success', $academicSubjects, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAcademicSubjectRequest $request)
    {
        $academicSubject = AcademicSubject::create($request->validated());
        return new SuccessResource('Created', $academicSubject, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(AcademicSubject $academicSubject)
    {
        return new SuccessResource('Success', $academicSubject, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAcademicSubjectRequest $request, AcademicSubject $academicSubject)
    {
        $academicSubject->update($request->validated());
        $academicSubject = $academicSubject->fresh();
        return new SuccessResource('Updated', $academicSubject, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AcademicSubject $academicSubject)
    {
        $academicSubject->delete();
        return new SuccessResource("Deleted", [], 204);
    }
}
