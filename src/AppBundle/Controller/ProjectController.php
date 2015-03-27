<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

use FOS\RestBundle\View\View;
use FOS\RestBundle\Util\Codes;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use JMS\Serializer\SerializationContext;

use Kactus\Model\Project;
use Kactus\Form\ProjectForm;

class ProjectController extends FOSRestController
{
    /**
     * @Rest\View()
     *
     * @param Request $request
     * @return View view instance
     *
     */
    public function getUserProjectsAction($userId)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $user = $em->getRepository('AppBundle:User')->find($userId);
        $projects = $em->getRepository('AppBundle:Project')->findByUser($user);
        return $projects;
    }

    /**
     * @Rest\View()
     *
     * @param Request $request
     * @return View view instance
     *
     */
    public function getProjectsAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $projects = $em->getRepository('AppBundle:Project')->findAll();
        return $projects;
    }

    /**
     * @Rest\View()
     *
     * @param Request $request
     * @return View view instance
     *
     */
    public function newProjectAction()
    {
        $project = new Project();
        $form = $this->createForm(new ProjectForm(), $project);
        return $form;
    }

    /**
     * Create a new projet
     *
     * @Rest\View(statusCode = Codes::HTTP_BAD_REQUEST)
     *
     * @param Request $request
     * @return View view instance
     *
     */
    public function postProjectsAction(Request $request)
    {
        $project = new Project();
        $form = $this->createForm(new ProjectForm(), $project);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($project);
            $em->flush();
            return new JsonResponse(['message' => 'Project created.'], 201);
        }

        return $form;
    }
}
