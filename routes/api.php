<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ApplicationController;

Route::prefix('v1')->group(function () {

    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/me', [AuthController::class, 'me']);
        Route::post('/logout', [AuthController::class, 'logout']);

        Route::get('/jobs', [JobController::class, 'index']);
        
        // employer
        Route::middleware('role:1')->group(function () {
            Route::post('/jobs', [JobController::class, 'store']);
            Route::put('/jobs/{id}', [JobController::class, 'update']);
            Route::delete('/jobs/{id}', [JobController::class, 'destroy']);
            Route::get('/jobs/my', [JobController::class, 'myJobs']);
            
            Route::get('/applications/job/{jobId}', [ApplicationController::class, 'byJob']);
            Route::put('/applications/{id}/status', [ApplicationController::class, 'updateStatus']);
        });

        // freelancer
        Route::middleware('role:2')->group(function () {
            Route::post('/applications', [ApplicationController::class, 'store']);
            Route::get('/applications/my', [ApplicationController::class, 'myApplications']);
        });

    });
});