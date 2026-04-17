<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Application extends Model
{
    use HasFactory;

    protected $table = 'applications';

    protected $fillable = [
        'job_id',
        'freelancer_id',
        'cv_path',
        'email',
        'phone_number',
        'status_id',
        'created_by',
        'updated_by',
    ];

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function freelancer()
    {
        return $this->belongsTo(User::class, 'freelancer_id');
    }

    public function status()
    {
        return $this->belongsTo(ApplicationStatus::class, 'status_id');
    }

    protected static function booted()
    {
        static::creating(function ($model) {
            $model->created_by = auth()->id() ?? 'SYSTEM';
        });

        static::updating(function ($model) {
            $model->updated_by = auth()->id() ?? 'SYSTEM';
        });
    }
}