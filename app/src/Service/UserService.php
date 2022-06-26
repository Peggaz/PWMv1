<?php
/**
 * User service.
 */

namespace App\Service;

use App\Entity\User;
use App\Repository\TransactionRepository;
use App\Repository\UserRepository;
use DateTimeImmutable;
use Knp\Component\Pager\Pagination\PaginationInterface;
use Knp\Component\Pager\PaginatorInterface;

/**
 * Class UserService.
 */
class UserService implements UserServiceInterface
{
    /**
     * User repository.
     */
    private UserRepository $userRepository;

    /**
     * Paginator.
     */
    private PaginatorInterface $paginator;

    /**
     * @var TransactionRepository
     */
    private TransactionRepository $transactionRepository;

    /**
     * Constructor.
     *
     * @param UserRepository        $userRepository        User repository
     * @param PaginatorInterface    $paginator             Paginator
     * @param TransactionRepository $transactionRepository Transaction Repository
     *
     * @parem TransactionRepository $transactionRepository Transaction Repository

     */
    public function __construct(UserRepository $userRepository, PaginatorInterface $paginator, TransactionRepository $transactionRepository)
    {
        $this->userRepository = $userRepository;
        $this->paginator = $paginator;
        $this->transactionRepository = $transactionRepository;
    }

    /**
     * Get paginated list.
     *
     * @param int $page Page number
     *
     * @return PaginationInterface<string, mixed> Paginated list
     */
    public function getPaginatedList(int $page): PaginationInterface
    {
        return $this->paginator->paginate(
            $this->userRepository->queryAll(),
            $page,
            UserRepository::PAGINATOR_ITEMS_PER_PAGE
        );
    }

    /**
     * Save entity.
     *
     * @param User $user User entity
     */
    public function save(User $user): void
    {
        if ($user->getId() == null) {
            $user->setCreatedAt(new DateTimeImmutable());
        }
        $user->setUpdatedAt(new DateTimeImmutable());

        $this->userRepository->save($user);
    }

    /**
     * Delete user.
     *
     * @param User $user User entity
     *
     */
    public function delete(User $user): void
    {
        $this->userRepository->delete($user);
    }

    /**
     * Find by id.
     *
     * @param int $id User id
     *
     * @return User|null User entity
     *
     */
    public function findOneById(int $id): ?User
    {
        return $this->userRepository->findOneById($id);
    }

    /**
     * Can User be deleted?
     *
     * @param User $user User entity
     *
     * @return bool Result
     */
    public function canBeDeleted(User $user): bool
    {
        $result = $this->transactionRepository->countByUser($user);

        return !($result > 0);
    }
}
