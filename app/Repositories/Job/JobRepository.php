<?php

namespace App\Repositories\Job;

use App\Models\Job;

class JobRepository implements JobRepositoryInterface
{
    public function create(array $data)
    {
        return Job::create($data);
    }

    public function update(Job $job, array $data)
    {
        $job->update($data);
        return $job;
    }

    public function delete(Job $job)
    {
        return $job->delete();
    }

    public function findById(int $id)
    {
        return Job::findOrFail($id);
    }

    public function getByEmployer(int $employerId)
    {
        return Job::where('employer_id', $employerId)->get();
    }

    public function getPublished()
    {
        return Job::where('status', 'published')->get();
    }
}