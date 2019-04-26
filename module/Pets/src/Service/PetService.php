<?php 

namespace  Pets\Service ;

use Pets\Entity\PessoaEntity;
use Doctrine\ORM\EntityManager;

class  PetService
  {

      const ENTITY = 'Pets\Entity\PetEntity';
      protected $entity_manager;

      public function __construct(EntityManager $em)
      {
          $this->entity_manager = $em;
      }

     public function buscaTodosPets()
      {
          $select = $this->entity_manager->
              createQueryBuilder()->
              select('pets.id', 'pets.nome', 'pets.raca')->
              from(self::ENTITY, 'pets');
          $pets = $select->getQuery()->getResult();

          return $pets;

      }

      public function get($id)
      {
          return $this->entity_manager->find(self::ENTITY, $id);
      }

      public function salvarPet($values)
      {
          $pet = new PetEntity();

          if ($values['id'] > 0)
              $pet = $this->get($values['id']);

          $pet->setData($values);
          $this->entity_manager->persist($pet);
          $this->entity_manager->flush();

          return $pet->getArrayCopy();
      }

      public function delete($id)
      {
          $pet = $this->entity_manager->find(self::ENTITY, $id);
          $this->entity_manager->remove($pet);
          $this->entity_manager->flush();
      }
}       
     