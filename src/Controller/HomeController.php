<?php

namespace App\Controller;

use App\Entity\DemandeConge;
//use App\Entity\Employees;
use App\Entity\Projets;
use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use PhpParser\Node\Stmt\Else_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'home')]

    /**
     * @Route("/index", name="index")
     */
    public function index(Request $request  , EntityManagerInterface $manager): Response

    {


//        $users = $manager->getRepository(User::class)->findAll();
//
//        dd($users);




        return $this->render('home/Profile.html.twig', [
            'controller_name' => 'HomeController',
            //obtenir des données d'une base de données et les mettre dans un tableau 'User'
            "User" => $manager->getRepository(User::class)->findAll(),


        ]);
    }

    //Configuration de la route (path)
    /**
     * @Route("/employees", name="employees")
     */
    public function employees(Request $request, UserPasswordEncoderInterface $passwordEncoder, EntityManagerInterface $manager): Response
    {


        if ($request->isMethod("POST")
        ) {
            $nom = $request->get('nom');
            $prenom = $request->get('prenom');
            $name=$nom.' '.$prenom;

            $cin = $request->get('cin');
            $email = $request->get('email');
            $address = $request->get('address');
            $DateNaissance = $request->get('DateNaissance');
            $grade = $request->get('grade');
            $Departement = $request->get('Departement');
            $DateEmbauche = $request->get('DateEmbauche');
            $Salaire = $request->get('Salaire');
            $tel = $request->get('tel');
            $pass = $request->get('pass');
            $Role="ROLE_USER";

            $addEmployee= new User();
            $addEmployee->setName($name);
            $addEmployee->setCin($cin);
            $addEmployee->setEmail($email);
            $addEmployee->setAdresse($address);
            $addEmployee->setGrade($grade);
            $addEmployee->setSalaire($Salaire);
            $addEmployee->setTel($tel);
            $addEmployee->setDepartement($Departement);
            $addEmployee->addRole($Role);
           $addEmployee->setPassword(
               $passwordEncoder->encodePassword(
                   $addEmployee,
                   $pass
               )
           );
            $addEmployee->setDateNaissance(new \DateTime($DateNaissance));
            $addEmployee->setDateEmbauche(new \DateTime($DateEmbauche));
            $manager->persist($addEmployee);
            $manager->flush();
        }

            //Pour afficher le code html Employees.html.twig
        return $this->render('home/employees.html.twig', [
            'controller_name' => 'HomeController',
            //obtenir des données d'une base de données et les mettre dans un tableau 'Employees'
            "Employees" => $manager->getRepository(User::class)->findAll(),

        ]);

    }



    /**
     * @Route("/Conges", name="Conges")
     */
    public function Conges(UserRepository $users, Request $request  , EntityManagerInterface $manager): Response
    {
        if ($request->isMethod("POST")
        ) {

            //$Employee = $request->get('Employee');
            $Motif = $request->get('MotifConge');
            $dateDep = $request->get('DateDepartConge');
            $dateFin = $request->get('DateFinConge');
            //$str3 = $request->get('nbr');
            $currentDate=date("h:i:sa");
            //$User=new User();

            $DemandeConge= new DemandeConge();
            $DemandeConge->setMotifConge($Motif);
            $DemandeConge->setUser($this->getUser());



            $DemandeConge->setEtat('En Attente');
            $DemandeConge->setDateDepart(new \DateTime($dateDep));
            $DemandeConge->setDateRetour(new \DateTime($dateFin));


            $manager->persist($DemandeConge);
            $manager->flush();


        }







        return $this->render('home/Conges.html.twig', [

            "conges" => $manager->getRepository(DemandeConge::class)->findAll(),
            "User" => $manager->getRepository(User::class)->findAll(),
            //"currentUser"=>$currentUser,
            //"users"=>$users->findAll(),

        ]);

    }

    /**
     * @Route("/etatApprouver/{id}", name="etatApprouver")
     */
    public function etatApprouver($id,Request $request  , EntityManagerInterface $manager): Response
    {
        $postRepo = $manager->getRepository(DemandeConge::class);
        $post = $postRepo->find($id);
        $post->setEtat('Approuvé');
        $manager->persist($post);
        $manager->flush();





        return $this->render('home/Conges.html.twig', [
            "conges" => $manager->getRepository(DemandeConge::class)->findAll(),

        ]);
    }


    /**
     * @Route("/etatRefuser/{id}", name="etatRefuser")
     */
    public function etatRefuser($id, Request $request  , EntityManagerInterface $manager): Response
    {



        $postRepo = $manager->getRepository(DemandeConge::class);
        $post = $postRepo->find($id);
        $post->setEtat('Refusé');
        $manager->persist($post);
        $manager->flush();

        return $this->render('home/Conges.html.twig', [

            "conges" => $manager->getRepository(DemandeConge::class)->findAll(),
        ]);
    }
//
//
//
//

//
        /**
         * @Route("/Projets", name="Projets")
         */
        public function Projets(Request $request  , EntityManagerInterface $manager): Response
    {

        if ($request->isMethod("POST")
        ) {

            $Projet = $request->get('Projet');
            $Departement = $request->get('Departement');
            $dateDep = $request->get('DateDebut');
            $dateFin = $request->get('DateFin');



            $Projets= new Projets();
            $Projets->setProjet($Projet);
            $Projets->setStatut('En cours');
            $Projets->setDepartement($Departement);

            $Projets->setDateDebut(new \DateTime($dateDep));
            $Projets->setDateFin(new \DateTime($dateFin));


            $manager->persist($Projets);
            $manager->flush();


        }


        return $this->render('home/Projets.html.twig', [
            'controller_name' => 'HomeController',
            "Projets" => $manager->getRepository(Projets::class)->findAll(),


        ]);

    }

    /**
     * @Route("/Projet/{id}/{Action}", name="Action")
     */
    public function Projet($Action,$id, Request $request  , EntityManagerInterface $manager): Response
    {

        if ($request->isMethod("POST")
        ) {

            $postRepo = $manager->getRepository(Projets::class);
            $post = $postRepo->find($id);
            $post->setStatut($Action);
            $manager->persist($post);
            $manager->flush();
        }


        return $this->render('home/Projets.html.twig', [
            'controller_name' => 'HomeController',
            "Projets" => $manager->getRepository(Projets::class)->findAll(),


        ]);

    }

    /**
     * @Route("/SupprimerProjet/{id}", name="SupprimerProjet")
     */
    public function SupprimerProjet($id, Request $request  , EntityManagerInterface $manager): Response
    {

        if ($request->isMethod("POST")
        ) {

            $postRepo = $manager->getRepository(Projets::class)->find($id);

            $manager->remove($postRepo);
            $manager->flush();


        }


        return $this->render('home/Projets.html.twig', [
            'controller_name' => 'HomeController',
            "Projets" => $manager->getRepository(Projets::class)->findAll(),


        ]);

    }
//
//
//
//
//
        //Configuration de la route (path)
        /**
         * @Route("/Profile", name="Profile")
         */
        public function Profile(Request $request  , EntityManagerInterface $manager): Response
    {
        //Pour afficher le code html Profile.html.twig
        return $this->render('home/Profile.html.twig', [
            'controller_name' => 'HomeController',
            //obtenir des données d'une base de données et les mettre dans un tableau 'User'
            "User" => $manager->getRepository(User::class)->findAll(),


        ]);

    }

    /**
     * @Route("/Salaire", name="Salaire")
     */
    public function Salaire(Request $request  , EntityManagerInterface $manager): Response
    {
        //Pour afficher le code html Profile.html.twig
        return $this->render('home/Salaire.html.twig', [
            'controller_name' => 'HomeController',
            //obtenir des données d'une base de données et les mettre dans un tableau 'User'
            "User" => $manager->getRepository(User::class)->findAll(),


        ]);

    }

}
