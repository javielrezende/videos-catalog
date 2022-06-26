<?php

namespace Core\Domain\Entity;

use Core\Domain\Entity\Traits\MagicMethodsTrait;
use Core\Domain\Exception\EntityValidationException;

class Category {
    use MagicMethodsTrait;

    public function __construct(
        protected string $id = '',
        protected string $name = '',
        protected string $description = '',
        protected bool $isActive = true,
    ) {
        $this->validate();
    }

    public function activate(): void
    {
        $this->isActive = true;
    }

    public function deactivate(): void
    {
        $this->isActive = false;
    }

    public function update(string $name = null, string $description = null): void
    {
        $this->validate();
        $this->name = $name ?? $this->name;
        $this->description = $description ?? $this->description;
    }

    public function validate()
    {
        if (empty($this->name)) {
            throw new EntityValidationException('Name can not be empty');
        }

        if (strlen($this->name) < 3  || strlen($this->name) > 255) {
            throw new EntityValidationException('Name is invalid');
        }

        if ($this->description !== '' && (strlen($this->description) < 3  || strlen($this->description) > 255)) {
            throw new EntityValidationException('Description is invalid');
        }
    }
}