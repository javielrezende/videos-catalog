<?php

namespace Core\UseCase\Dto\Category;

class CategoryOutputDto {
    public function __construct(
        public string $id,
        public string $name,
        public string $description = '',
        public bool $is_active = true,
    )
    {
    }
}