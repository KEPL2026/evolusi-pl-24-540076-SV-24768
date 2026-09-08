<?php

namespace Tests\Feature;

use PHPUnit\Framework\TestCase;
use App\Http\Controllers\TodoController;

class TodoControllerTest extends TestCase
{
    private TodoController $controller;

    protected function setUp(): void
    {
        parent::setUp();
        $this->controller = new TodoController();
    }

    public function testIndexReturnsEmptyArray(): void
    {
        $response = $this->controller->index();

        $this->assertTrue($response['success']);
        $this->assertIsArray($response['data']);
    }

    public function testStoreCreatesTodo(): void
    {
        $data = [
            'title' => 'New Todo',
            'description' => 'Todo Description',
        ];

        $response = $this->controller->store($data);

        $this->assertTrue($response['success']);
        $this->assertEquals('Todo created successfully', $response['message']);
        $this->assertArrayHasKey('data', $response);
    }

    public function testStoreWithInvalidDataFails(): void
    {
        $data = [
            'title' => 'AB',
            'description' => 'Valid',
        ];

        $response = $this->controller->store($data);

        $this->assertFalse($response['success']);
        $this->assertEquals('Validation failed', $response['message']);
    }

    public function testShowReturnsTodo(): void
    {
        $this->controller->store(['title' => 'Test', 'description' => 'Desc']);
        $response = $this->controller->show(1);

        $this->assertTrue($response['success']);
        $this->assertArrayHasKey('data', $response);
    }

    public function testShowReturnsNotFound(): void
    {
        $response = $this->controller->show(999);

        $this->assertFalse($response['success']);
        $this->assertEquals('Todo not found', $response['message']);
    }

    public function testUpdateTodo(): void
    {
        $this->controller->store(['title' => 'Test', 'description' => 'Desc']);
        $response = $this->controller->update(1, ['completed' => true]);

        $this->assertTrue($response['success']);
        $this->assertEquals('Todo updated successfully', $response['message']);
    }

    public function testDestroyTodo(): void
    {
        $this->controller->store(['title' => 'Test', 'description' => 'Desc']);
        $response = $this->controller->destroy(1);

        $this->assertTrue($response['success']);
        $this->assertEquals('Todo deleted successfully', $response['message']);
    }
}
