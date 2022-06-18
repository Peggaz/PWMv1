<?php

namespace App\Controller;

use App\Service\CategoryServiceInterface;
use App\Service\OperationServiceInterface;
use App\Service\PaymentServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

class SearchController extends AbstractController
{
    /**
     * Category service.
     */
    private CategoryServiceInterface $categoryService;
    private PaymentServiceInterface $paymentService;
    private OperationServiceInterface $operationService;

    /**
     * Translator.
     *
     * @var TranslatorInterface
     */
    private TranslatorInterface $translator;

    /**
     * Constructor.
     *
     * @param CategoryServiceInterface $taskService Task service
     * @param PaymentServiceInterface $taskService2 Task service
     * @param OperationServiceInterface $taskService3 Task service
     * @param TranslatorInterface $translator Translator
     */
    public function __construct(CategoryServiceInterface $taskService, PaymentServiceInterface $taskService2, OperationServiceInterface $taskService3, TranslatorInterface $translator)
    {
        $this->categoryService = $taskService;
        $this->paymentService = $taskService2;
        $this->operationService = $taskService3;
        $this->translator = $translator;
    }

#region list

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
        $category_pagination = $this->categoryService->getPaginatedList(
            $request->query->getInt('page', 1),
            $name
        );
        $payment_pagination = $this->paymentService->getPaginatedList(
            $request->query->getInt('page', 1),
            $name
        );
        $operation_pagination = $this->operationService->getPaginatedList(
            $request->query->getInt('page', 1),
            $name
        );

        return $this->render('search/index.html.twig',
            [
                'name' => $name,
                'category_pagination' => $category_pagination,
                'payment_pagination' => $payment_pagination,
                'operation_pagination' => $operation_pagination
            ]
        );
    }
#endregion
}