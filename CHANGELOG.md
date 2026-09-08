# Changelog

## [1.0.0] - 2026-09-08

### Added
- Initial Todo API implementation
- CRUD operations for todo items
- Input validation for todo data
- Comprehensive test suite (unit + feature tests)
- GitHub Actions CI/CD workflow with test and lint jobs
- API documentation with examples

### Features
- Create, read, update, delete todos
- Validation for title (3-100 chars) and description (required, max 500 chars)
- RESTful API design
- Automated testing with PHPUnit
- Code quality checks with PHP CodeSniffer

### Project Structure
- Model: Todo class with serialization
- Controller: TodoController with CRUD methods
- Validator: TodoValidator with comprehensive rules
- Routes: RESTful API endpoints
- Tests: Unit tests and feature tests with full coverage
