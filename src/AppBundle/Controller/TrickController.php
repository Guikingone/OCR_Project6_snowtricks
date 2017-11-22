<?php

namespace AppBundle\Controller;

use AppBundle\AppBundle;
use AppBundle\Entity\Trick;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;


class TrickController extends Controller
{
    /**
     * @Route("/", name="trick_list")
     */
    public function listAction()
    {
        $em = $this->getDoctrine()->getManager();
        $tricks = $em->getRepository('AppBundle:Trick')
            ->findAll();


        return $this->render('trick/list.html.twig', array(
            'title' => 'Snowtricks',
            'tricks' => $tricks,
        ));
    }

    /**
     * @Route("/trick/{trickName}", name="trick_show")
     * @param $trickName
     */
    public function showAction($trickName)
    {
        $comments = array(
            'comment 1',
            'comment 2',
            'comment 3',
        );

        $em = $this->getDoctrine()->getManager();
        $trick = $em->getRepository('AppBundle:Trick')
            ->findOneBy(['name' => $trickName]);

        return $this->render('trick/show.html.twig', array(
            'trick' => $trick,
            'comments' => $comments,
        ));

    }
}
