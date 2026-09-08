# Todo API - Evolusi Perangkat Lunak

Simple Laravel-based Todo API demonstrating Git workflow, CI/CD, and software evolution principles.

## Features
- CRUD operations for todos
- RESTful API design
- Automated testing with PHPUnit
- Code quality checks with PHP CodeSniffer
- CI/CD with GitHub Actions

## API Endpoints
- `GET /api/todos` - List all todos
- `POST /api/todos` - Create new todo
- `GET /api/todos/{id}` - Get specific todo
- `PUT /api/todos/{id}` - Update todo
- `DELETE /api/todos/{id}` - Delete todo

## Installation
```bash
composer install
php artisan serve
```

## Testing
```bash
composer test
composer lint
```

## CI/CD
Automated workflows run on every push:
- Unit & Feature tests
- Code style validation

## Author
NIM: 24-540076-SV-24768
