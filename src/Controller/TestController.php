<?php

namespace App\Controller;

use App\Entity\Employees;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    /**
     * @Route("/test", name="test")
     */
    public function index(EntityManagerInterface $manager): Response
    {

        $employ = new Employees();


        $employ->setEmail("test@dd.com")
        ->setCin("ewewew")
        ->setNom("dd")
            ->setPassword("ddd")
        ->setPrenom("dd")
        ->setGrade("dd");

        $manager->persist($employ);
        $manager->flush();

        dd();
    }
}
