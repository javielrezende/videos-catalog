<?php

namespace Core\Entity;

use Core\Entity\Traits\MagicMethodsTrait;

class Category {
    use MagicMethodsTrait;

    public function __construct(
        protected string $id = '',
        protected string $name,
        protected string $description = '',
        protected bool $isActive = true,
    ) {
        
    }
}