<?php

namespace Task\GetOnBoard\Entity;

class Conversation extends Post
{
    public $parent;

    /**
     * Post constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return mixed
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @param mixed $parent
     */
    public function setParent($parent): void
    {
        $this->parent = $parent;
    }

}
