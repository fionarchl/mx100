<?php

namespace App\Repositories\Application;

use App\Models\Application;

class ApplicationRepository implements ApplicationRepositoryInterface
{
    public function create(array $data)
    {
        return Application::create($data);
    }

    public function findById(int $id)
    {
        return Application::findOrFail($id);
    }

    public function findByJob(int $jobId)
    {
        return Application::where('job_id', $jobId)->get();
    }

    public function findByFreelancer(int $freelancerId)
    {
        return Application::where('freelancer_id', $freelancerId)->get();
    }

    public function update($application, array $data)
    {
        $application->update($data);
        return $application;
    }
}