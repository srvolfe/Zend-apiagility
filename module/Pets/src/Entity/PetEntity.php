<?php

namespace Pets\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class PetEntity
 * @package Pets\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="pets")
 */

class PetEntity extends Entity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     *
     * @var integer
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     *
     * @var string
     */
    protected $nome;

    /**
     * @ORM\Column(type="string")
     *
     * @var string
     */
    protected $raca;

}
