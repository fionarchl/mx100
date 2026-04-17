<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = 'jobs_mx100';

    public function employer() {
        return $this->belongsTo(User::class, 'employer_id');
    }
    
    public function isPublished(): bool
    {
        return $this->status === 'published';
    }
    
    public function applications() {
        return $this->hasMany(Application::class, 'job_id');
    }
}
