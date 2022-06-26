<?php

namespace Core\Domain\Entity;

use Core\Domain\Entity\Traits\MagicMethodsTrait;
use Core\Domain\Exception\EntityValidationException;
use Core\Domain\Validation\DomainValidation;

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
        DomainValidation::notNull($this->name);
        DomainValidation::maximumLength($this->name);
        DomainValidation::minimumLength($this->name);
        DomainValidation::nullWithMaximumLength($this->description);
    }
}