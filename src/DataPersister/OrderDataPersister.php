<?php

namespace App\DataPersister;

use ApiPlatform\Core\DataPersister\DataPersisterInterface;
use App\Entity\Order;
use Doctrine\ORM\EntityManagerInterface;

class OrderDataPersister implements DataPersisterInterface
{

   private $entityManager;

   public function  __construct(EntityManagerInterface $entityManager)
   {
       $this->entityManager =  $entityManager;
   }

   public function supports($data): bool
   {
       return $data instanceof Order;
   }

   /**
    * @param Order $data
    *
    * @return void
    */
   public function persist($data)
   {
       if (!$data->getId()) {
           $data->setValidated($validated);
       }
       
       $this->entityManager->persist($data);
       $this->entityManager->flush();
   }

   public function remove($data)
   {
       $this->entityManager->remove($data);
       $this->entityManager->flush();
   }
}
