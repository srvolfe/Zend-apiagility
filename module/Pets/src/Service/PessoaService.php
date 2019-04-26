<?php 

namespace  Pets\Service ;

use Pets\Entity\PessoaEntity;
use Doctrine\ORM\EntityManager;

class  PessoaService
  {

      const ENTITY = 'Pets\Entity\PessoaEntity';
      protected $entity_manager;

      public function __construct(EntityManager $em)
      {
          $this->entity_manager = $em;
      }

     public function buscaTodasPessoas()
      {
          $select = $this->entity_manager->
              createQueryBuilder()->
              select('Pessoa.id', 'Pessoa.nome', 'Pessoa.cpf')->
              from(self::ENTITY, 'Pessoa');
          $pessoas = $select->getQuery()->getResult();

          return $pessoas;

      }

      public function get($id)
      {
          return $this->entity_manager->find('Pets\Entity\PessoaEntity', $id);
      }

      public function salvarPessoa($values)
      {
          $pessoa = new PessoaEntity();

          if ($values['id'] > 0)
              $pessoa = $this->get($values['id']);

          $pessoa->setData($values);
          $this->entity_manager->persist($pessoa);
          $this->entity_manager->flush();

          return $pessoa->getArrayCopy();
      }

      public function delete($id)
      {
          $pessoa = $this->entity_manager->find('Pets\Entity\PessoaEntity', $id);
          $this->entity_manager->remove($pessoa);
          $this->entity_manager->flush();
      }
}       
     