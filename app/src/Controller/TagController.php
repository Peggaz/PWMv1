<?php

namespace App\Controller;

use App\Entity\Tag;
use App\Form\Type\TagType;
use App\Repository\TagRepository;
use App\Service\TagServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

#[Route('/tag')]
class TagController extends AbstractController
{

    /**
     * Tag service.
     */
    private TagServiceInterface $tagService;

    /**
     * Translator.
     *
     * @var TranslatorInterface
     */
    private TranslatorInterface $translator;

    /**
     * Constructor.
     *
     * @param TagServiceInterface $taskService Task service
     * @param TranslatorInterface $translator Translator
     */
    public function __construct(TagServiceInterface $taskService, TranslatorInterface $translator)
    {
        $this->tagService = $taskService;
        $this->translator = $translator;
    }

    /**
     * Index action.
     *
     * @param Request $request HTTP Request
     *
     * @return Response HTTP response
     */
    #[Route('/', name: 'tag_index', methods: ['GET'])]
    public function index(Request $request): Response
    {
        $pagination = $this->tagService->getPaginatedList(
            $request->query->getInt('page', 1)
        );

        return $this->render('tag/index.html.twig', ['tag_pagination' => $pagination]);
    }

    /**
     */
    #[Route('/new', name: 'tag_new', methods: ['GET', 'POST'])]
    public function new(Request $request, TagRepository $tagRepository): Response
    {
        $tag = new Tag();
        $form = $this->createForm(TagType::class, $tag);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $tagRepository->add($tag);

            return $this->redirectToRoute('tag_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('tag/new.html.twig', [
            'tag' => $tag,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'tag_show', methods: ['GET'])]
    public function show(Tag $tag): Response
    {
        return $this->render('tag/show.html.twig', ['tag' => $tag,]);
    }

    /**
     */
    #[Route('/{id}/edit', name: 'tag_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Tag $tag, TagRepository $tagRepository): Response
    {
        $form = $this->createForm(TagType::class, $tag);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $tagRepository->add($tag);

            return $this->redirectToRoute('tag_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('tag/edit.html.twig', [
            'tag' => $tag,
            'form' => $form,
        ]);
    }

//    /**
//     */
//    #[Route('/{id}', name: 'tag_delete', methods: ['POST'])]
//    public function delete(Request $request, Tag $tag, TagRepository $tagRepository): Response
//    {
//        if ($this->isCsrfTokenValid('delete' . $tag->getId(), $request->request->get('_token'))) {
//            $tagRepository->remove($tag);
//        }
//
//        return $this->redirectToRoute('tag_index', [], Response::HTTP_SEE_OTHER);
//    }


    /**
     * Delete action.
     *
     * @param Request $request HTTP request
     * @param Tag $tag Tag entity
     *
     * @return Response HTTP response
     */
    #[Route('/{id}/delete', name: 'tag_delete', requirements: ['id' => '[1-9]\d*'], methods: 'GET|DELETE')]
    public function delete(Request $request, Tag $tag): Response
    {
        $form = $this->createForm(FormType::class, $tag, [
            'method' => 'DELETE',
            'action' => $this->generateUrl('tag_delete', ['id' => $tag->getId()]),
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->tagService->delete($tag);

            $this->addFlash(
                'success',
                $this->translator->trans('message.deleted_successfully')
            );

            return $this->redirectToRoute('tag_index');
        }

        return $this->render('tag/delete.html.twig', [
            'form' => $form->createView(),
            'tag' => $tag,
        ]);
    }
}
