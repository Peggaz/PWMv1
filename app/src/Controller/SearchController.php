<?php

namespace App\Controller;

use App\Service\CategoryServiceInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

class SearchController
{
    /**
     * Category service.
     */
    private CategoryServiceInterface $categoryService;

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
     * @param TranslatorInterface $translator Translator
     */
    public function __construct(CategoryServiceInterface $taskService, TranslatorInterface $translator)
    {
        $this->categoryService = $taskService;
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
    #[Route(name: 'search', methods: 'POST')]
    public function index(Request $request): Response
    {
        $category_pagination = $this->categoryService->getPaginatedList(
            $request->query->getInt('page', 1),
            $this->getUser()

        );
//        $category_pagination = $this->->getPaginatedList(
//            $request->query->getInt('page', 1)
//        );

        return $this->render('category/index.html.twig',
            ['category' => $category_pagination],
//            ['payment' => $pagination],
//            ['wallet' => $pagination],
//            ['tag' => $pagination],
//            ['operation' => $pagination],

        );
    }
#endregion
}