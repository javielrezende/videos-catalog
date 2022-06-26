<?php

namespace Tests\Unit\Domain\Entity;

use Core\Domain\Entity\Category;
use Core\Domain\Exception\EntityValidationException;
use PHPUnit\Framework\TestCase;
use Throwable;

class CategoryUnitTest extends TestCase {
    public function testGetAttributes()
    {
        $category = new Category(
            name: 'Category 1',
            description: 'Category 1 description'
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

    public function testUpdate()
    {
        $uuid = 'uuid.value';

        $category = new Category(
            id: $uuid,
            name: 'Category 4',
            description: 'Category 4 description'
        );

        $category->update(
            name: 'New Category 4',
            description: 'New Category 4 description'
        );

        $this->assertEquals('New Category 4', $category->name);
        $this->assertEquals('New Category 4 description', $category->description);

        $category->update(
            name: 'New Category 4.1'
        );

        $this->assertEquals('New Category 4.1', $category->name);
        $this->assertEquals('New Category 4 description', $category->description);

        $category->update(
            name: 'New Category 4',
            description: 'New Category 4 description'
        );

        $category->update(
            description: 'New Category 4.1 description'
        );

        $this->assertEquals('New Category 4', $category->name);
        $this->assertEquals('New Category 4.1 description', $category->description);
    }

    public function testThrowExcepetionWhenUpdateName()
    {
        try {
            $category = new Category(
                name: 'Ca',
                description: 'Category 5 description'
            );

            $this->assertTrue(false);
        } catch (Throwable $th) {
            $this->assertInstanceOf(EntityValidationException::class, $th);
        }
    }
}