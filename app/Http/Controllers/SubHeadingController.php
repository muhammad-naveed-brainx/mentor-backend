<?php

namespace App\Http\Controllers;
use App\Models\Heading;
use App\Services\ImageService;

use App\Http\Requests\StoreSubHeadingRequest;
use App\Http\Requests\UpdateSubHeadingRequest;
use App\Models\SubHeading;
use App\Http\Resources\SuccessResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SubHeadingController extends Controller
{
    public function __construct(private readonly ImageService $imageService)
    {
        //By using constructor property promotion syntax of php8
        //we can use $this->imageService anywhere in the Controller
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): SuccessResource
    {
        $headingId = $request->query('headingId');
        $subHeadings =  SubHeading::where('heading_id', $headingId)->get();
        return new SuccessResource('Success', $subHeadings, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubHeadingRequest $request)
    {
        $subHeading = new SubHeading($request->validated());
        if (filled($request->file('image'))) {
            $pathAndUrl =$this->imageService->store($request->file('image'));
            $subHeading->image_path = $pathAndUrl[0];
            $subHeading->image_url = $pathAndUrl[1];
        }
        $heading = Heading::find($request->input('heading_id'));
        $subHeading->chapter_id = $heading->chapter_id;
        $subHeading->save();

        return new SuccessResource('Created', $subHeading, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(SubHeading $subHeading)
    {
        return new SuccessResource('Success', $subHeading, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubHeadingRequest $request, SubHeading $subHeading)
    {
        $subHeading->update($request->validated());
        // I am doubtful in this logic
        if (filled($request->file('image'))) {
            //delete previous image if exist
            if (filled($subHeading->image_path)) {
                Storage::disk('s3')->delete($subHeading->image_path);
            }
            $pathAndUrl =$this->imageService->store($request->file('image'));
            $subHeading->image_path = $pathAndUrl[0];
            $subHeading->image_url = $pathAndUrl[1];
        }
        $subHeading->save();
        $subHeading = $subHeading->fresh();
        return new SuccessResource('Updated', $subHeading, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubHeading $subHeading)
    {
        if (filled($subHeading->image_path)) {
            Storage::disk('s3')->delete($subHeading->image_path);
        }
        $subHeading->delete();
        return new SuccessResource("Deleted", [], 204);
    }
}
