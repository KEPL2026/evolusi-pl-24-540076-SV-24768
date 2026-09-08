# Todo API - Evolusi Perangkat Lunak

Simple Laravel-based Todo API for demonstrating Git workflow, CI/CD, and software evolution principles.

## Features

- CRUD operations for todos
- Input validation (title: 3-100 characters, description: required, max 500 characters)
- RESTful API design
- Automated testing with PHPUnit
- Code quality checks with PHP CodeSniffer
- CI/CD integration with GitHub Actions

## API Endpoints

| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | /api/todos | Get all todos |
| POST | /api/todos | Create new todo |
| GET | /api/todos/{id} | Get specific todo |
| PUT | /api/todos/{id} | Update todo |
| DELETE | /api/todos/{id} | Delete todo |

## Request/Response Examples

### Create Todo (POST /api/todos)
**Request:**
```json
{
  "title": "Buy groceries",
  "description": "Buy milk, eggs, and bread"
}
```

**Response:**
```json
{
  "success": true,
  "message": "Todo created successfully",
  "data": {
    "id": 1,
    "title": "Buy groceries",
    "description": "Buy milk, eggs, and bread",
    "completed": false
  }
}
```

### List Todos (GET /api/todos)
**Response:**
```json
{
  "success": true,
  "data": [
    {
      "id": 1,
      "title": "Buy groceries",
      "description": "Buy milk, eggs, and bread",
      "completed": false
    }
  ]
}
```

## Testing

```bash
# Install dependencies
composer install

# Run all tests
composer test

# Run code quality checks
composer lint
```

## Validation Rules

- Title: Required, minimum 3 characters, maximum 100 characters
- Description: Required, maximum 500 characters

## Project Structure

```
evolusi-pl-24-540076-SV-24768/
├── app/
│   ├── Models/
│   │   └── Todo.php
│   ├── Http/
│   │   └── Controllers/
│   │       └── TodoController.php
│   └── Validators/
│       └── TodoValidator.php
├── routes/
│   └── api.php
├── tests/
│   ├── Unit/
│   │   ├── TodoTest.php
│   │   └── TodoValidatorTest.php
│   └── Feature/
│       └── TodoControllerTest.php
├── .github/
│   └── workflows/
│       └── ci.yml
├── composer.json
├── phpunit.xml
└── README.md
```

## Author

NIM: 24-540076-SV-24768
Assignment: Evolusi Perangkat Lunak (EPL)

## Technologies Used

- PHP 8.1+
- Laravel Framework 10.x
- PHPUnit 10.x
- PHP CodeSniffer 3.7+
- GitHub Actions

## License

Academic Project - Universitas Gadjah Mada
