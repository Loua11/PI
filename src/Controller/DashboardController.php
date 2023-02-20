<?php

namespace App\Controller;

use App\Entity\Facture;
use App\Form\FactureType;
use App\Repository\FactureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;


class DashboardController extends AbstractController
{
    #[Route('/dashboard', name: 'app_dashboard')]
    public function index(): Response
    {
        return $this->render('dashboard/index.html.twig', [
            'controller_name' => 'DashboardController',
        ]);
    }
    #[Route('/client', name: 'app_dashboardClient')]
    public function client(): Response
    {
        return $this->render('dashboard/page-clients.html.twig', [
            'controller_name' => 'DashboardController',
        ]);
    }
    #[Route('/user', name: 'app_dashboardUser')]
    public function user(): Response
    {
        return $this->render('dashboard/page-user.html.twig', [
            'controller_name' => 'DashboardController',
        ]);
    }
    #[Route('/categorie', name: 'app_dashboardCategorie')]
    public function categorie(): Response
    {
        return $this->render('dashboard/page-categorie.html.twig', [
            'controller_name' => 'DashboardController',
        ]);
    }
    #[Route('/comptabilite', name: 'app_dashboardComptabilite')]
    public function comptabilite(): Response
    {
        return $this->render('dashboard/page-comptabilite.html.twig', [
            'controller_name' => 'DashboardController',
        ]);
    }
    #[Route('/culture', name: 'app_dashboardCulture')]
    public function culture(): Response
    {
        return $this->render('dashboard/page-culture.html.twig', [
            'controller_name' => 'DashboardController',
        ]);
    }
    #[Route('/employe', name: 'app_dashboardEmploye')]
    public function employe(): Response
    {
        return $this->render('dashboard/page-employe.html.twig', [
            'controller_name' => 'DashboardController',
        ]);
    }
    #[Route('/evenement', name: 'app_dashboardEvenement')]
    public function evenement(): Response
    {
        return $this->render('dashboard/page-event.html.twig', [
            'controller_name' => 'DashboardController',
        ]);
    }
    #[Route('/facture', name: 'app_dashboardFacture')]
    public function facture(): Response
    {
        return $this->render('dashboard/page-facture.html.twig', [
            'controller_name' => 'DashboardController',
        ]);
    }


    #[Route('/ajoutfact', name: 'ajoutfact')]
    public function ajouter (Request $request) : Response 
    {
        $facture=new Facture();
        $form=$this->createForm(FactureType::class,$facture);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $em=$this->getDoctrine()->getManager();
            $em->persist($facture);
            $em->flush();
            $this->addFlash('notification','Submitted Successfully!');
            return $this->redirectToRoute('app_dashboardFacture');
           }

        return $this->render('dashboard/ajoutfacture.html.twig',['form'=>$form->createView()]);
    }
    #[Route('/update/{id}', name: 'update')]
    public function update(Request $request,$id)
    {


        $crud=$this->getDoctrine()->getRepository(Facture::class)->find($id);
        $form=$this->createForm(FactureType::class,$facture);
        $form->handleRequest($request);
       if($form->isSubmitted() && $form->isValid()) {
        $em=$this->getDoctrine()->getManager();
        $em->persist($facture);
        $em->flush();
        $this->addFlash('notification','updated Successfully!');
        return $this->redirectToRoute('app_main');


    }

    return $this->render('dashboard/edit.html.twig',['form'=>$form->createView()]);
}


    #[Route('/participant', name: 'app_dashboardParticipant')]
    public function participant(): Response
    {
        return $this->render('dashboard/page-participant.html.twig', [
            'controller_name' => 'DashboardController',
        ]);
    }
    #[Route('/produit', name: 'app_dashboardProduit')]
    public function produit(): Response
    {
        return $this->render('dashboard/page-produit.html.twig', [
            'controller_name' => 'DashboardController',
        ]);
    }
    #[Route('/terrain', name: 'app_dashboardTerrain')]
    public function terrain(): Response
    {
        return $this->render('dashboard/page-terrain.html.twig', [
            'controller_name' => 'DashboardController',
        ]);
    }
    #[Route('/equipement', name: 'app_dashboardEquipement')]
    public function vehicule(): Response
    {
        return $this->render('dashboard/page-equipement.html.twig', [
            'controller_name' => 'DashboardController',
        ]);
    }
}
