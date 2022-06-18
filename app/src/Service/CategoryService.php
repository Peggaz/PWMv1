<?php
/**
 * Category service.
 */

namespace App\Service;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use DateTimeImmutable;
use Knp\Component\Pager\Pagination\PaginationInterface;
use Knp\Component\Pager\PaginatorInterface;
use phpDocumentor\Reflection\Types\Nullable;

/**
 * Class CategoryService.
 */
class CategoryService implements CategoryServiceInterface
{
    /**
     * Category repository.
     */
    private CategoryRepository $categoryRepository;

    /**
     * Paginator.
     */
    private PaginatorInterface $paginator;

    /**
     * Constructor.
     *
     * @param CategoryRepository $categoryRepository Category repository
     * @param PaginatorInterface $paginator Paginator
     */
    public function __construct(CategoryRepository $categoryRepository, PaginatorInterface $paginator)
    {
        $this->categoryRepository = $categoryRepository;
        $this->paginator = $paginator;
    }

    /**
     * Get paginated list.
     *
     * @param int $page Page number
     * @param string|null $name
     *
     * @return PaginationInterface<string, mixed> Paginated list
     */
    public function getPaginatedList(int $page, string $name = Nullable::class): PaginationInterface
    {
        if ($name == Nullable::class) {
            return $this->paginator->paginate(
                $this->categoryRepository->queryAll(),
                $page,
                CategoryRepository::PAGINATOR_ITEMS_PER_PAGE
            );
        } else {
            return $this->paginator->paginate(
                $this->categoryRepository->queryLikeName($name),
                $page,
                CategoryRepository::PAGINATOR_ITEMS_PER_PAGE
            );
        }
    }

    /**
     * Save entity.
     *
     * @param Category $category Category entity
     */
    public function save(Category $category): void
    {
        if (null == $category->getId()) {
            $category->setCreatedAt(new DateTimeImmutable());
        }
        $category->setUpdatedAt(new DateTimeImmutable());

        $this->categoryRepository->save($category);
    }

    /**
     * Delete category.
     *
     * @param Category $category Category entity
     *
     */
    public function delete(Category $category): void
    {
        $this->categoryRepository->delete($category);
    }

    /**
     * Find by id.
     *
     * @param int $id Category id
     *
     * @return Category|null Category entity
     *
     */
    public function findOneById(int $id): ?Category
    {
        return $this->categoryRepository->findOneById($id);
    }


}
