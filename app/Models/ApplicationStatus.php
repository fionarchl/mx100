<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use HasFactory;

class ApplicationStatus extends Model
{
    protected $table = 'application_status';

    protected $fillable = [
        'name',
        'created_by',
        'updated_by',
    ];

    public function applications()
    {
        return $this->hasMany(Application::class, 'status_id');
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