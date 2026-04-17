<?php

namespace App\Http\Controllers;

use App\Services\Job\JobService;
use App\Http\Requests\Job\CreateJobRequest;
use App\Http\Requests\Job\UpdateJobRequest;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function __construct(
        protected JobService $jobService
    ) {}

    public function store(CreateJobRequest $request)
    {
        $job = $this->jobService->create(
            $request->validated(),
            $request->user()
        );

        return response()->json([
            'message' => 'Job created successfully',
            'data' => $job
        ], 201);
    }

    public function update(UpdateJobRequest $request, $id)
    {
        $job = $this->jobService->find($id);

        $updated = $this->jobService->update(
            $job,
            $request->validated()
        );

        return response()->json([
            'message' => 'Job updated successfully',
            'data' => $updated
        ]);
    }

    public function destroy($id)
    {
        $job = $this->jobService->find($id);

        $this->jobService->delete($job);

        return response()->json([
            'message' => 'Job deleted successfully'
        ]);
    }

    public function myJobs(Request $request)
    {
        return response()->json([
            'data' => $this->jobService->myJobs($request->user())
        ]);
    }

    public function index()
    {
        return response()->json([
            'data' => $this->jobService->publishedJobs()
        ]);
    }
}