<?php

namespace FormularioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PerfilCompetencia
 *
 * @ORM\Table(name="perfilCompetencia")
 * @ORM\Entity(repositoryClass="FormularioBundle\Repository\PerfilCompetenciaRepository")
 */
class PerfilCompetencia
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \perfil
     *
     * @ORM\ManyToOne(targetEntity="perfil", inversedBy="perfilCompetencias")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="perfil_id", referencedColumnName="id")
     * })
     */ 
    private $perfilId;

    /**
     * @var int
     *
     * @ORM\Column(name="competencia_id", type="integer")
     */
    private $competenciaId;

    /**
     * @var int
     *
     * @ORM\Column(name="nivel", type="integer")
     */
    private $nivel;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set perfilId
     *
     * @param integer $perfilId
     *
     * @return PerfilCompetencia
     */
    public function setPerfilId($perfilId)
    {
        $this->perfilId = $perfilId;

        return $this;
    }

    /**
     * Get perfilId
     *
     * @return int
     */
    public function getPerfilId()
    {
        return $this->perfilId;
    }

    /**
     * Set competenciaId
     *
     * @param integer $competenciaId
     *
     * @return PerfilCompetencia
     */
    public function setCompetenciaId($competenciaId)
    {
        $this->competenciaId = $competenciaId;

        return $this;
    }

    /**
     * Get competenciaId
     *
     * @return int
     */
    public function getCompetenciaId()
    {
        return $this->competenciaId;
    }

    /**
     * Set nivel
     *
     * @param integer $nivel
     *
     * @return PerfilCompetencia
     */
    public function setNivel($nivel)
    {
        $this->nivel = $nivel;

        return $this;
    }

    /**
     * Get nivel
     *
     * @return int
     */
    public function getNivel()
    {
        return $this->nivel;
    }
    
    /**
     * Set perfil
     *
     * @param \FormularioBundle\Entity\ $perfil
     * @return PerfilCompetencia
     */
    public function setPerfil(\FormularioBundle\Entity\Perfil $perfil = null)  
    {
        $this->perfilId = $perfil;
        return $this;
    }
    
}

