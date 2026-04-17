<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    public function job() {
        return $this->belongsTo(Job::class, 'job_id');
    }
    
    public function freelancer() {
        return $this->belongsTo(User::class, 'freelancer_id');
    }
    
    public function status() {
        return $this->belongsTo(ApplicationStatus::class, 'status_id');
    }
}
