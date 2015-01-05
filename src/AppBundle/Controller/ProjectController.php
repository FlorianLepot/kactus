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

use Organizat\Model\Project;
use Organizat\Form\ProjectForm;

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
     * Create a new user
     *
     * @ApiDoc(
     *   resource = true,
     *   input = "Znieh\Model\User",
     *   statusCodes = {
     *     201 = "Returned when successful",
     *     400 = "Returned when the form has errors"
     *   }
     * )
     * @Rest\View(statusCode = Codes::HTTP_BAD_REQUEST)
     *
     * @param Request $request
     * @return View view instance
     *
     */
    public function postProjectsAction(Request $request)
    {
        $unit = new Project();
        $form = $this->createForm(new ProjectForm(), $unit);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($unit);
            $em->flush();
            return new JsonResponse(['message' => 'Project created.'], 201);
        }

        return $form;
    }
}
