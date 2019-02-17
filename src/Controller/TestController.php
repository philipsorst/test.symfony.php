<?php

namespace App\Controller;

use App\Entity\ExampleEntity;
use App\Form\ExampleEntityType;
use App\Repository\ExampleEntityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @author Philip Washington Sorst <philip@sorst.net>
 */
class TestController extends AbstractController
{
    /**
     * @Route("/{id}", name="form", defaults={"id"=null})
     *
     * @param Request                 $request
     * @param ExampleEntityRepository $repository
     * @param ExampleEntity|null      $entity
     *
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function form(Request $request, ExampleEntityRepository $repository, ExampleEntity $entity = null)
    {
        if (null === $entity) {
            $entity = new ExampleEntity();
        }

        $form = $this->createForm(ExampleEntityType::class, $entity);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entity = $repository->save($entity);

            return $this->redirectToRoute('form', ['id' => $entity->getId()]);
        }

        return $this->render('form.html.twig', ['form' => $form->createView()]);
    }
}
