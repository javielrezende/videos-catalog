<?php

namespace Tests\Unit\Domain\Entity;

use Core\Entity\Category;
use PHPUnit\Framework\TestCase;

class CategoryUnitTest extends TestCase {
    public function test_get_attributes()
    {
        $category = new Category(
            id: '1',
            name: 'Category 1',
            description: 'Category 1 description',
            isActive: true
        );

        $this->assertEquals('Category 1', $category->name);
        $this->assertEquals('Category 1 description', $category->description);
        $this->assertEquals(true, $category->isActive);
    }
}