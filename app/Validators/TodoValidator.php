<?php

namespace App\Validators;

class TodoValidator
{
    private array $errors = [];

    public function validate(array $data, bool $isUpdate = false): bool
    {
        $this->errors = [];

        // Title validation
        if (!$isUpdate || isset($data['title'])) {
            if (empty($data['title'])) {
                $this->errors['title'] = 'Title is required';
            } elseif (strlen($data['title']) < 3) {
                $this->errors['title'] = 'Title must be at least 3 characters';
            } elseif (strlen($data['title']) > 100) {
                $this->errors['title'] = 'Title must not exceed 100 characters';
            }
        }

        // Description validation
        if (!$isUpdate || isset($data['description'])) {
            if (empty($data['description'])) {
                $this->errors['description'] = 'Description is required';
            } elseif (strlen($data['description']) > 500) {
                $this->errors['description'] = 'Description must not exceed 500 characters';
            }
        }

        return empty($this->errors);
    }

    public function getErrors(): array
    {
        return $this->errors;
    }
}
