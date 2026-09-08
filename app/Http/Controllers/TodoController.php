<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Validators\TodoValidator;

class TodoController
{
    private static array $todos = [];
    private static int $nextId = 1;
    private TodoValidator $validator;

    public function __construct()
    {
        $this->validator = new TodoValidator();
    }

    public function index(): array
    {
        return [
            'success' => true,
            'data' => array_map(fn($todo) => $todo->toArray(), self::$todos),
        ];
    }

    public function store(array $data): array
    {
        if (!$this->validator->validate($data)) {
            return [
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $this->validator->getErrors(),
            ];
        }

        $todo = new Todo(
            self::$nextId++,
            $data['title'] ?? '',
            $data['description'] ?? '',
            false
        );

        self::$todos[$todo->getId()] = $todo;

        return [
            'success' => true,
            'message' => 'Todo created successfully',
            'data' => $todo->toArray(),
        ];
    }

    public function show(int $id): array
    {
        if (!isset(self::$todos[$id])) {
            return [
                'success' => false,
                'message' => 'Todo not found',
            ];
        }

        return [
            'success' => true,
            'data' => self::$todos[$id]->toArray(),
        ];
    }

    public function update(int $id, array $data): array
    {
        if (!isset(self::$todos[$id])) {
            return [
                'success' => false,
                'message' => 'Todo not found',
            ];
        }

        if (!$this->validator->validate($data, true)) {
            return [
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $this->validator->getErrors(),
            ];
        }

        $todo = self::$todos[$id];
        if (isset($data['completed'])) {
            $todo->setCompleted((bool)$data['completed']);
        }

        return [
            'success' => true,
            'message' => 'Todo updated successfully',
            'data' => $todo->toArray(),
        ];
    }

    public function destroy(int $id): array
    {
        if (!isset(self::$todos[$id])) {
            return [
                'success' => false,
                'message' => 'Todo not found',
            ];
        }

        unset(self::$todos[$id]);

        return [
            'success' => true,
            'message' => 'Todo deleted successfully',
        ];
    }
}
