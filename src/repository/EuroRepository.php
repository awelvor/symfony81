<?php

namespace App\Repository;

use App\Entity\Euros;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;

use Doctrine\ORM\EntityManagerInterface;



/**
 * @extends ServiceEntityRepository<Euros>
 */
class EurosRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Euros::class);
    }

    
    
     /**
     * @return Euros[] Returns an array of Euros objects
     */
    public function findByNull(EntityManagerInterface $em,String $compte): array
    {
    $jour = 60*60*24;
    return  $em
    ->createQuery("select p from App\Entity\Euros p where p.compte='$compte' and p.date<'".date('Y-m-d', time()+10*$jour)."' and p.banque is NULL order by p.date desc ")
    ->getResult();
      }
      
       public function grand_total(EntityManagerInterface $em): array
    {
    	$dql  = "select p.date, p.c1, p.c2, p.c3, p.c4, p.c5, p.c6, p.c7, p.c8, p.c9, p.c10, p.c11, p.c12, p.c13, p.c14, p.c15, p.c16, ";
    	$dql .= "(p.c2+p.c3) as sg_pea_ni, ";
    	$dql .= "(p.c4+p.c5+p.c15+p.c16) as sg_sequoia_ni, ";
      $dql .= "(p.c1+p.c2+p.c3+p.c4+p.c5+p.c6+p.c7+p.c8+p.c9+p.c10+p.c11+p.c13+p.c14 + p.c16) as total ";
      $dql .= " from App\Entity\Actifs p ";
    	$dql .= " order By p.date desc ";
    	return $em->createQuery($dql)->getResult();;
    }
      
     /**
     * @return Euros[] Returns an array of Euros objects
     */
    public function findByNotNull(EntityManagerInterface $em,string $compte): array
    {
    	return  $em
    	->createQuery("select p from App\Entity\Euros p where p.compte='$compte' and p.banque is NOT NULL order by p.date desc ")
    	->setMaxResults(20)
    	->getResult();
    }
    /**
     * @return Euros[] 
     */
 public function findByCompte(EntityManagerInterface $em): array
 {
 	 $comptes= "('ccsg','cvi philippe', 'cvi nicole','cc boursorama','cb boursorama')";
   return $em
   ->createQuery("select p.compte, sum(p.credit-p.debit) as solde from App\Entity\Euros p where p.compte in $comptes and p.banque IS NOT NULL group by p.compte")
   ->getResult();
    }
    
  public function pointer(EntityManagerInterface $em, int $id){
 return $em->createQueryBuilder()
    ->update('App\Entity\Euros', 'p')
    ->set('p.banque', ':date')
    ->where('p.id = :id')
    ->setParameter('date', date("Y/m/d"))
    ->setParameter('id', $id)
    ->getQuery()
    ->execute();  
} 
  
public function pointer2(EntityManagerInterface $em, int $id){
$euros = $em->getRepository(Euros::class)->find($id);
if ($euros){
    $euros->setBanque(date("Y-m-d"));
    $em->flush();
}
return; 
} 
    
    /**
    * @return Euros[] Returns an array of Euros objects
    */
    public function findByCheque(EntityManagerInterface $em): array
    { return $em
    ->createQuery("select p from App\Entity\Euros p   where p.cheque IS NOT NULL order by p.cheque DESC")
    ->getResult();
    }
    
    /**
    * @return Euros[] Returns an array of Euros objects
    */
    public function findByLibelle(EntityManagerInterface $em): array
    {
   return $em
   ->createQuery("select p.libelle, sum(p.credit-p.debit) as solde from App\Entity\Euros p  group by p.libelle order by p.libelle")
   ->getResult();
    }
    
    /**
    * @return Euros[] Returns an array of Euros objects
    */
    public function findByCbid(EntityManagerInterface $em): array
    {
    return $em
   ->createQuery("select p.cbid, sum(p.credit-p.debit) as solde from App\Entity\Euros p  group by p.cbid order by p.cbid")
   ->getResult();
    }   
    
    
    
    /**
     * @return Euros[] Returns an array of Euros objects
     */
    public function annuel(EntityManagerInterface $em): array
    {
    	$tab = [];
   for ($annee=2010; $annee<2028; $annee++){
    	array_push($tab, $em->createQuery("
        select $annee, SUM(p.credit) as credit, sum(p.debit) as debit, sum(p.credit-p.debit) as solde 
        from App\Entity\Euros p  
        where p.budget like '%$annee'
    ")->getResult());
    }
    return $tab;
    }



   
   public function mensuel(EntityManagerInterface $em, int $year): array
    {
      
    	$tab = $em->createQuery("
        select p.budget, SUM(p.credit) as credit, sum(p.debit) as debit, sum(p.credit-p.debit) as solde 
        from   App\Entity\Euros p  
        where  p.budget like '%$year'
        group by p.budget
        ")->getResult();
   return $tab;
}
     
    
    //    /**
    //     * @return Euros[] Returns an array of Euros objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('e.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Euros
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
