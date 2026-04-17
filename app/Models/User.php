<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory;

    protected $table = 'users';
    
    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'password',
        'role_id',
        'profile_photo',
        'profile_description',
        'created_by',
        'updated_by',
    ];
    
    protected $hidden = [
        'password',
    ];
    
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    
    public function jobs()
    {
        return $this->hasMany(Job::class, 'employer_id');
    }
    
    public function applications()
    {
        return $this->hasMany(Application::class, 'freelancer_id');
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