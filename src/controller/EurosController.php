<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;

use App\Repository\EurosRepository;
use App\Entity\Euros;
use App\Repository\EnoriaRepository;


use App\Form\EurosForm;


use Doctrine\ORM\EntityManagerInterface;



final class EurosController extends AbstractController



{
    #[Route('/euros', name: 'app_euros')]
    public function index(EurosRepository $repository): Response
    {
    	
       return $this->render('euros/index.html.twig', [
            'controller_name' => 'EurosController',
            'euros' => $repository->findAll(),
            
        ]);
    }
    
#[Route('/euros/comptes', name: 'euros.home')]
public function comptes1(EurosRepository $repository, EntityManagerInterface $em): Response
    {
    	
    	return $this->render('euros/comptes.html.twig', [
      'compte'  => 'ccsg',
      'euros1'  => $repository->findByNull($em,'ccsg'),
      'euros2'  => $repository->findByNotNull($em,'ccsg'),
      'euros3'  => $repository->findByCompte($em,'ccsg'),
        ]);
    }
    
    #[Route('/euros/comptes/{id}/{compte}', name: 'euros.comptes')]
    public function comptes2(EurosRepository $repository, EntityManagerInterface $em, int $id, string $compte): Response
    {
    
    	return $this->render('euros/comptes.html.twig', [
      'compte'  => $compte,
      'pointer'=> $repository->pointer($em, $id),
      'euros1'  => $repository->findByNull($em,$compte),
      'euros2'  => $repository->findByNotNull($em,$compte),
      'euros3'  => $repository->findByCompte($em,$compte),
        ]);
    }
    
  #[Route('/euros/budgets/{year}/{budget}', name: 'euros.budgets2')]
    public function budgets2(EurosRepository $eurosRepository, EntityManagerInterface $entityManager, int $year, string $budget): Response
    {
    return $this->render('euros/budgets.html.twig', [
       'year'    => $year,
       'budget'  => $budget,
       'euros22'   => $eurosRepository->findBy(['budget'=>$budget],['date'=>'ASC']),
       'annuels' =>$eurosRepository->annuel($entityManager),
       'mensuels'=>$eurosRepository->mensuel( $entityManager, $year),
   ]);
    }   
    
    
    #[Route('/euros/create', name:'euros.create')]
    public function create(Request $request,  EntityManagerInterface $em)
    {
    	$mois= array('01'=>'janvier','02'=>'fevrier','03'=>'mars','04'=>'avril','05'=>'mai','06'=>'juin','07'=>'juillet','08'=>'aout','09'=>'septembre','10'=>'octobre','11'=>'novembre','12'=>'decembre');
   $euros = new Euros();
  
    	$form = $this->createForm(EurosForm::class, $euros);
    	$form->handleRequest($request);
    	if ($form->isSubmitted() && $form->isValid()){
    		$euros->setBudget($mois[date('m')].date('Y'));
    		
    		$em->persist($euros);
    		$em->flush();
    		$this->addFlash('success','Opération enregistrée');
    		return $this->RedirectToRoute('euros.create');
    	 }
    	return $this->render('euros/new.html.twig', ['form'=>$form]);
    }
      
    #[Route('/euros/cheques', name:'euros.cheques')]
    public function cheques(Request $request, EntityManagerInterface $em, EurosRepository $eurosRepository): Response
    { 
    	return $this->render('euros/cheques.html.twig', ['euros' => $eurosRepository->findByCheque($em)]);
    }
      
    #[Route('/euros/libelles/{slug}', name:'euros.libelles2')]
    public function libelles2(Request $request, EntityManagerInterface $em, EurosRepository $eurosRepository, string $slug): Response
    { 
    	return $this->render('euros/libelles.html.twig', [
    	'euros'   => $eurosRepository->findByLibelle($em),
      'euros22'   => $eurosRepository->findBy(['libelle'=>$slug],['date'=>'DESC']),	
    	]);
    }
    
   #[Route('/euros/cbid/{slug}', name:'euros.cbid2')]
    public function cbid2(Request $request, EntityManagerInterface $em, EurosRepository $eurosRepository, string $slug): Response
    { 
    	return $this->render('euros/cbid.html.twig', [
    	'euros' => $eurosRepository->findByCbid($em),
      'euros22'   => $eurosRepository->findBy(['cbid'=>$slug],['date'=>'DESC']),	
      ]    	
    	);
    }
}
