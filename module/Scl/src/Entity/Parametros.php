<?php

namespace Scl\Entity;

use Core\Entity\AbstractEntity;
use Doctrine\ORM\Mapping as ORM;

/**
 *
 * Parametros
 *
 * @category Scl
 * @package  Entity
 * @author   Felipe Graff Ampolini <felipeampolini@unochapeco.edu.br>
 *
 * @ORM\Entity
 * @ORM\Table(name="schema_scl.scl_parametros")
 *
 */

class Parametros extends AbstractEntity
{
    /**
     *
     * @ORM\Id
     * @ORM\Column(type = "integer", name = "id_parametro")
     *
     * @var integer
     *
     */
    protected $id;

    /**
     * @ORM\Column(type="integer")
     *
     * @var int
     */
    protected $ano_vigente;

    /**
     * @ORM\Column(type="integer")
     *
     * @var int
     */
    protected $semestre_vigente;

}