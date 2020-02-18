<?php

namespace App\Controller;

use App\Repository\PostReportViewRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PostReportController extends AbstractController
{
    /**
     * @Route("/", name="post_report")
     */
    public function index(
        PostReportViewRepository $postReportViewRepository,
        PaginatorInterface $paginator,
        Request $request
    ): Response
    {
        $pagination = $paginator->paginate(
            $postReportViewRepository->getReport(),
            $request->query->getInt('page', 1),
            10
        );

        return $this->render('post_report/index.html.twig', ['pagination' => $pagination]);
    }
}
