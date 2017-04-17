<?php

namespace FormularioBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

class Task {

    protected $description;

    /**
     * @ORM\ManyToMany(targetEntity="Tag", cascade={"persist"})
     */
    protected $tags;

    public function __construct() {
        $this->tags = new ArrayCollection();
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getTags() {
        return $this->tags;
    }

    public function addTag(Tag $tag) {
        $tag->addTask($this);

        $this->tags->add($tag);
    }

//    public function removeTag(Tag $tag) {
//        $this->tags->remove($tag);
//    }
    
    public function removeTag(Tag $tag)
    {
        $this->tags->removeElement($tag);
    }

}
