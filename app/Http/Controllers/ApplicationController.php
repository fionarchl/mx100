<?php

namespace App\Http\Controllers;

use App\Services\Application\ApplicationService;
use App\Http\Requests\Application\CreateApplicationRequest;
use App\Http\Requests\Application\UpdateApplicationStatusRequest;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function __construct(
        protected ApplicationService $service
    ) {}

    public function store(CreateApplicationRequest $request)
    // public function store()
    {
        // dd('test');
        $application = $this->service->apply(
            $request->validated(),
            $request->user()
        );

        return response()->json([
            'message' => 'Application submitted successfully',
            'data' => $application
        ], 201);
    }

    public function myApplications(Request $request)
    {
        return response()->json([
            'data' => $this->service->myApplications($request->user())
        ]);
    }

    public function byJob($jobId)
    {
        return response()->json([
            'data' => $this->service->getByJob($jobId)
        ]);
    }

    public function updateStatus(UpdateApplicationStatusRequest $request, $id)
    {
        $application = $this->service->find($id);

        $updated = $this->service->updateStatus(
            $application,
            $request->validated()
        );

        return response()->json([
            'message' => 'Status updated successfully',
            'data' => $updated
        ]);
    }
}