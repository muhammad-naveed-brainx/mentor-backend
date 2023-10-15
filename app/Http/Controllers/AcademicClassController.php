<?php

namespace App\Http\Controllers;

use App\Http\Requests\AcademicClassRequest;
use App\Models\AcademicClass;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\ErrorResource;

class AcademicClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $academicClasses =  AcademicClass::latest()->get(); // In ascending order
        return new SuccessResource('Success', $academicClasses, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AcademicClassRequest $request): SuccessResource
    {
        $academicClass = AcademicClass::create($request->validated());
        return new SuccessResource('Created', $academicClass, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(AcademicClass $academicClass): SuccessResource
    {
        return new SuccessResource('Success', $academicClass, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AcademicClassRequest $request, AcademicClass $academicClass): SuccessResource
    {
        $academicClass->update($request->validated());
        $academicClass = $academicClass->fresh();
        return new SuccessResource('Updated', $academicClass, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AcademicClass $academicClass)
    {
        $academicClass->delete();
        return new SuccessResource("Deleted", [], 204);
    }
}
