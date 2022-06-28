<?php

namespace Unit\Domain\UseCase\Category;

use Core\Domain\Entity\Category;
use Core\Domain\Repository\CategoryRepositoryInterface;
use Core\UseCase\Category\CreateCategoryUseCase;
use Mockery;
use PHPUnit\Framework\TestCase;
use stdClass;

class CreateCategoryUseCaseUnitTest extends TestCase {
    private $mockEntity;
    private $mockRepository;
    
    public function testCreateNewCategory()
    {
        $categoryId = '1';
        $categoryName = 'Category 1';

        $this->mockEntity = Mockery::mock(Category::class, [
            $categoryId,
            $categoryName
        ]);
        $this->mockRepository = Mockery::mock(stdClass::class, CategoryRepositoryInterface::class);
        $this->mockRepository->shouldReceive('insert')->andReturn($this->mockEntity);

        $useCase = new CreateCategoryUseCase($this->mockRepository);
        $useCase->execute();
    }
}