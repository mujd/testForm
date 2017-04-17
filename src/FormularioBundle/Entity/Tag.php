<?php

namespace FormularioBundle\Entity;

class Tag {

    private $name;

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function addTask(Task $task) {
        if (!$this->tasks->contains($task)) {
            $this->tasks->add($task);
        }
    }

}
