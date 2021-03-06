<?php

namespace Kactus\Model;

use Doctrine\Common\Collections\ArrayCollection;

class Customer
{
    private $id;
    private $name;
    private $projects;
    private $image;

    public function __construct()
    {
        $this->projects = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Customer
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add projects
     *
     * @param \Kactus\Model\Project $projects
     * @return Customer
     */
    public function addProject(\Kactus\Model\Project $projects)
    {
        $this->projects[] = $projects;

        return $this;
    }

    /**
     * Remove projects
     *
     * @param \Kactus\Model\Project $projects
     */
    public function removeProject(\Kactus\Model\Project $projects)
    {
        $this->projects->removeElement($projects);
    }

    /**
     * Get projects
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProjects()
    {
        return $this->projects;
    }
}
