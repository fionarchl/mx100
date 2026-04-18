# MX100 - Job Portal API
MX100 is a job portal connecting employers and freelancers.

## API Documentation
Postman Documentation:
https://documenter.getpostman.com/view/54110293/2sBXqDsi72

Postman Collection:
https://fionarchl-3554586.postman.co/workspace/Fiona's-Workspace~6afeb98e-40dc-437d-8ad3-435cafe90028/collection/54110293-9caaf60d-9ffe-47b0-933c-469bc62f077e?action=share&creator=54110293

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
