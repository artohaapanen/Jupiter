<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
*   @ORM\Entity(repositoryClass="App\Repository\PostRepository")
*/

class Task
{
    /**
    * @ORM\Id()
    * @ORM\GeneratedValue()
    * @ORM\Column(type="integer")
    */
    private $id;

    /**
    * ORM\Column(type="string", length=255)
    */
    private $task;

    /**
    * ORM\Column(type="datetime", length=255)
    */
    private $dueDate;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTask()
    {
        return $this->task;
    }

    public function setTask($task)
    {
        $this->task = $task;
    }

    public function getDueDate()
    {
        return $this->dueDate;
    }

    public function setDueDate(\DateTime $dueDate = null)
    {
        $this->dueDate = $dueDate;
    }
}
