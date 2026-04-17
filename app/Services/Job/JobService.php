<?php

namespace App\Services\Job;

use App\Repositories\Job\JobRepositoryInterface;

class JobService
{
    public function __construct(
        protected JobRepositoryInterface $jobRepo
    ) {}

    public function create(array $data, $user)
    {
        unset($data['created_by'], $data['updated_by'], $data['employer_id']);
        
        $data['employer_id'] = $user->id;
        $data['created_by'] = 'SYSTEM';

        return $this->jobRepo->create($data);
    }

    public function update($job, array $data)
    {
        $data['updated_by'] = 'SYSTEM';

        return $this->jobRepo->update($job, $data);
    }

    public function delete($job)
    {
        return $this->jobRepo->delete($job);
    }

    public function find($id)
    {
        return $this->jobRepo->findById($id);
    }

    public function myJobs($user)
    {
        return $this->jobRepo->getByEmployer($user->id);
    }

    public function publishedJobs()
    {
        return $this->jobRepo->getPublished();
    }
}