<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Validators\TodoValidator;

class TodoValidatorTest extends TestCase
{
    private TodoValidator $validator;

    protected function setUp(): void
    {
        parent::setUp();
        $this->validator = new TodoValidator();
    }

    public function testValidDataPasses(): void
    {
        $data = [
            'title' => 'Valid Title',
            'description' => 'Valid description for the todo item',
        ];

        $result = $this->validator->validate($data);

        $this->assertTrue($result);
        $this->assertEmpty($this->validator->getErrors());
    }

    public function testEmptyTitleFails(): void
    {
        $data = [
            'title' => '',
            'description' => 'Valid description',
        ];

        $result = $this->validator->validate($data);

        $this->assertFalse($result);
        $this->assertArrayHasKey('title', $this->validator->getErrors());
    }

    public function testShortTitleFails(): void
    {
        $data = [
            'title' => 'AB',
            'description' => 'Valid description',
        ];

        $result = $this->validator->validate($data);

        $this->assertFalse($result);
        $this->assertArrayHasKey('title', $this->validator->getErrors());
    }

    public function testLongTitleFails(): void
    {
        $data = [
            'title' => str_repeat('a', 101),
            'description' => 'Valid description',
        ];

        $result = $this->validator->validate($data);

        $this->assertFalse($result);
        $this->assertArrayHasKey('title', $this->validator->getErrors());
    }

    public function testEmptyDescriptionFails(): void
    {
        $data = [
            'title' => 'Valid Title',
            'description' => '',
        ];

        $result = $this->validator->validate($data);

        $this->assertFalse($result);
        $this->assertArrayHasKey('description', $this->validator->getErrors());
    }

    public function testLongDescriptionFails(): void
    {
        $data = [
            'title' => 'Valid Title',
            'description' => str_repeat('a', 501),
        ];

        $result = $this->validator->validate($data);

        $this->assertFalse($result);
        $this->assertArrayHasKey('description', $this->validator->getErrors());
    }
}
