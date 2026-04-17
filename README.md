# MX100 - Job Portal API
MX100 is a job portal connecting employers and freelancers.

## Tech Stack
- Laravel 10+
- Sanctum
- MySQL
- PHP 8+

## Setup
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve

## Auth
- POST /register
- POST /login
- GET /me
- POST /logout

## Roles
- 1 = employer
- 2 = freelancer

## Jobs
- POST /jobs (employer)
- GET /jobs (public)
- PUT /jobs/{id}
- DELETE /jobs/{id}
- GET /jobs/my

## Applications
- POST /applications (freelancer)
- GET /applications/my
- GET /applications/job/{id} (employer)
- PUT /applications/{id}/status (employer)

## Architecture
Controller → Service → Repository → Model

## Rules
- 1 application per job per freelancer
- role-based access control
