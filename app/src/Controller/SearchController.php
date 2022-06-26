<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Controller;

use App\Service\CategoryServiceInterface;
use App\Service\OperationServiceInterface;
use App\Service\PaymentServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * search and present operation, category and payment
 */
class SearchController extends AbstractController
{
    /**
     * Category service.
     */
    private CategoryServiceInterface $categoryService;

    /**
     * Payment service
     */
    private PaymentServiceInterface $paymentService;

    /**
     * Operation Service
     */
    private OperationServiceInterface $operationService;

    /**
     * Constructor.
     *
     * @param CategoryServiceInterface  $taskService  Task service
     * @param PaymentServiceInterface   $taskService2 Task service
     * @param OperationServiceInterface $taskService3 Task service
     */
    public function __construct(CategoryServiceInterface $taskService, PaymentServiceInterface $taskService2, OperationServiceInterface $taskService3)
    {
        $this->categoryService = $taskService;
        $this->paymentService = $taskService2;
        $this->operationService = $taskService3;
    }

// region list

    /**
     * Index action.
     *
     * @param Request $request HTTP Request
     *
     * @return Response HTTP response
     */
    #[Route(name: 'search', methods: 'GET')]
    public function index(Request $request): Response
    {
        $name = $request->query->get("name");
        $categoryPagination = $this->categoryService->getPaginatedList(
            $request->query->getInt('page', 1),
            $name
        );
        $paymentPagination = $this->paymentService->getPaginatedList(
            $request->query->getInt('page', 1),
            $name
        );
        $operationPagination = $this->operationService->getPaginatedList(
            $request->query->getInt('page', 1),
            $name
        );

        return $this->render(
            'search/index.html.twig',
            [
                'name' => $name,
                'category_pagination' => $categoryPagination,
                'payment_pagination' => $paymentPagination,
                'operation_pagination' => $operationPagination,
            ]
        );
    }
// endregion
}
