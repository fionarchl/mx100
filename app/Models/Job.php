<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model
{
    use HasFactory;
    
    protected $table = 'jobs_mx100';

    protected $fillable = [
        'employer_id',
        'title',
        'description',
        'status',
        'created_by',
        'updated_by',
    ];

    public function employer()
    {
        return $this->belongsTo(User::class, 'employer_id');
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
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