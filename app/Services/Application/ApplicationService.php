<?php

namespace App\Services\Application;

use App\Repositories\Application\ApplicationRepositoryInterface;
use App\Models\Application;

class ApplicationService
{
    public function __construct(
        protected ApplicationRepositoryInterface $repo
    ) {}

    public function apply(array $data, $user)
    {
        if ($user->role_id != 2) {
            throw new \Exception("Only freelancer can apply");
        }

        $exists = Application::where('job_id', $data['job_id'])
            ->where('freelancer_id', $user->id)
            ->first();

        if ($exists) {
            throw new \Exception("Already applied to this job");
        }

        $data['freelancer_id'] = $user->id;
        $data['status_id'] = 1;
        $data['created_by'] = 'SYSTEM';

        return $this->repo->create($data);
    }

    public function getByJob($jobId)
    {
        return $this->repo->findByJob($jobId);
    }

    public function myApplications($user)
    {
        return $this->repo->findByFreelancer($user->id);
    }

    public function updateStatus($application, array $data)
    {
        $data['updated_by'] = 'SYSTEM';

        return $this->repo->update($application, $data);
    }

    public function find($id)
    {
        return $this->repo->findById($id);
    }
}