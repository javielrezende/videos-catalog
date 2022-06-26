<?php

namespace Tests\Unit\Domain\Entity;

use Core\Domain\Entity\Category;
use PHPUnit\Framework\TestCase;

class CategoryUnitTest extends TestCase {
    public function testGetAttributes()
    {
        $category = new Category(
            name: 'Category 1',
            description: 'Category 1 description',
            isActive: true
        );

        $this->assertEquals('Category 1', $category->name);
        $this->assertEquals('Category 1 description', $category->description);
        $this->assertTrue($category->isActive);
    }

    public function testActivated()
    {
        $category = new Category(
            name: 'Category 2',
            isActive: false
        );

        $this->assertFalse($category->isActive);

        $category->activate();

        $this->assertTrue($category->isActive);
    }

    public function testInactivated()
    {
        $category = new Category(
            name: 'Category 3'
        );

        $this->assertTrue($category->isActive);
        
        $category->deactivate();

        $this->assertFalse($category->isActive);
    }
}