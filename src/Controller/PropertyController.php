<?php

namespace App\Controller;

use App\Entity\Property;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PropertyController extends AbstractController
{
    /**
     * @Route("/property", name="property")
     */
    public function index(): Response
    {
        $property = new Property;
        $property->setTitle('Mon premier bien')
            ->setPrice(200000)
            ->setRooms(4)
            ->setBedrooms(2)
            ->setSurface(60)
            ->setFloor(2)
            ->setHeat(1)
            ->setCity('Paris')
            ->setAddress('11 rue du Maréchal')
            ->setPostalCode('75000');

        $em = $this->getDoctrine()->getManager();
        $em->persist($property);
        $em->flush();

        return $this->render('property/index.html.twig', [
            'controller_name' => 'PropertyController',
        ]);
    }
}
