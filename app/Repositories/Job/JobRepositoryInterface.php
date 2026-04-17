<?php

namespace App\Repositories\Job;
use App\Models\Job;

interface JobRepositoryInterface
{
    public function create(array $data);
    public function update(Job $job, array $data);
    public function delete(Job $job);
    public function findById(int $id);
    public function getByEmployer(int $employerId);
    public function getPublished();
}