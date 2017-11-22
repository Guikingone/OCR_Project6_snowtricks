<?php

namespace AppBundle\Controller;

use AppBundle\AppBundle;
use AppBundle\Entity\Comment;
use AppBundle\Entity\Trick;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class TrickController extends Controller
{
    /**
     * @Route("/", name="trick_list")
     */
    public function listAction()
    {
        $em = $this->getDoctrine()->getManager();
        $tricks = $em->getRepository('AppBundle:Trick')
            ->findAllOrderedByCreatedAt();


        return $this->render('trick/list.html.twig', array(
            'title' => 'Snowtricks',
            'tricks' => $tricks,
        ));
    }

    /**
     * @Route("/trick/{name}", name="trick_show")
     */
    public function showAction(Trick $trick)
    {
        $em = $this->getDoctrine()->getManager();

        // Fetching the trick - Useless since Symfony finds the Trick on his own
        // $trick = $em->getRepository('AppBundle:Trick')
        //    ->findOneBy(['name' => $trickName->getName()]);

        // Fetching the comments related to the trick
        $comments = $em->getRepository('AppBundle:Comment')
            ->findAllForTrickOrderedByCreatedAt($trick->getId());

        // Only for Dev
        if (!$trick) {
            throw $this->createNotFoundException('No trick found');
        };

        return $this->render('trick/show.html.twig', array(
            'trick' => $trick,
            'comments' => $comments,
        ));

    }
}
