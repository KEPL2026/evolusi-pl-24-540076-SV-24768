<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Todo;

class TodoTest extends TestCase
{
    public function testTodoCreation(): void
    {
        $todo = new Todo(1, 'Test Title', 'Test Description', false);

        $this->assertEquals(1, $todo->getId());
        $this->assertEquals('Test Title', $todo->getTitle());
        $this->assertEquals('Test Description', $todo->getDescription());
        $this->assertFalse($todo->isCompleted());
    }

    public function testTodoCompletion(): void
    {
        $todo = new Todo(1, 'Test', 'Description', false);
        $todo->setCompleted(true);

        $this->assertTrue($todo->isCompleted());
    }

    public function testTodoToArray(): void
    {
        $todo = new Todo(1, 'Test', 'Description', false);
        $array = $todo->toArray();

        $this->assertIsArray($array);
        $this->assertArrayHasKey('id', $array);
        $this->assertArrayHasKey('title', $array);
        $this->assertArrayHasKey('description', $array);
        $this->assertArrayHasKey('completed', $array);
    }
}
