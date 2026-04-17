<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use HasFactory;

class Role extends Model
{
    protected $table = 'roles';

    protected $fillable = [
        'name',
        'created_by',
        'updated_by',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
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