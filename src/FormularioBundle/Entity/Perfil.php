<?php

namespace FormularioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Perfil
 *
 * @ORM\Table(name="perfil")
 * @ORM\Entity(repositoryClass="FormularioBundle\Repository\PerfilRepository")
 */
class Perfil
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
     * @var int
     *
     * @ORM\Column(name="Codigo", type="integer")
     */
    private $codigo;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="objetivo", type="string", length=255)
     */
    private $objetivo;

    /**
     * @var string
     *
     * @ORM\Column(name="tareas", type="string", length=255)
     */
    private $tareas;

    /**
     * @ORM\OneToMany(targetEntity="PerfilCompetencia", mappedBy="perfilId", cascade={"persist", "remove"})
     */
    private $perfilCompetencias;
    
    public function __construct() {
        $this->perfilCompetencias = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set codigo
     *
     * @param integer $codigo
     *
     * @return Perfil
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * Get codigo
     *
     * @return int
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Perfil
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set objetivo
     *
     * @param string $objetivo
     *
     * @return Perfil
     */
    public function setObjetivo($objetivo)
    {
        $this->objetivo = $objetivo;

        return $this;
    }

    /**
     * Get objetivo
     *
     * @return string
     */
    public function getObjetivo()
    {
        return $this->objetivo;
    }

    /**
     * Set tareas
     *
     * @param string $tareas
     *
     * @return Perfil
     */
    public function setTareas($tareas)
    {
        $this->tareas = $tareas;

        return $this;
    }

    /**
     * Get tareas
     *
     * @return string
     */
    public function getTareas()
    {
        return $this->tareas;
    }
    
    public function __toString()
    {
        return $this->getCompetenciaNombre();
    }

    /**
     * Add perfilCompetencias
     * @param \FormularioBundle\Entity\PerfilCompetencia $perfilCompetencia
     * 
     * @return doc
     */
    public function addPerfilCompetencia(\FormularioBundle\Entity\PerfilCompetencia $perfilCompetencia) {
        $this->perfilCompetencias[] = $perfilCompetencia;
        //$perfilCompetencia->setDoc($this);
        return $this;
    }
    
    /**
     * Remove perfilCompetencias
     * @param \FormularioBundle\Entity\PerfilCompetencia $perfilCompetencias
     */
    public function removePerfilCompetencia(\FormularioBundle\Entity\PerfilCompetencia $perfilCompetencias) {
        $this->perfilCompetencias->removeElement($perfilCompetencias);                
    }
    
    /**
     * Get perfilCompetencias
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPerfilCompetencias() {
        return $this->perfilCompetencias;
    }
    
}

