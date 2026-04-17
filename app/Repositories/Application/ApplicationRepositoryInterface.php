<?php

namespace App\Repositories\Application;

interface ApplicationRepositoryInterface
{
    public function create(array $data);
    public function findById(int $id);
    public function findByJob(int $jobId);
    public function findByFreelancer(int $freelancerId);
    public function update($application, array $data);
}