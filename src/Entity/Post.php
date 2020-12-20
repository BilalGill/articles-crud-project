<?php

namespace Task\GetOnBoard\Entity;

class Post
{
    public $id;
    public $userName;
    public $text;
    public $type;
    public $comments;
    public $deleted;
    public $commentsAllowed = true;

    /**
     * Post constructor.
     */
    public function __construct()
    {
        $this->id =  uniqid();
        $this->comments = [];
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * @return string
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param $text
     */
    public function setText($text): void
    {
        $this->text = $text;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param $type
     */
    public function setType($type): void
    {
        $this->type = $type;
    }

    /**
     * @param $text
     * @return Comment
     */
    public function addComment($text)
    {
        $comment = new Comment();
        $comment->setText($text);

        $this->comments[] = $comment;

        return $comment;
    }

    /**
     * @return array
     */
    public function getComments(): array
    {
        return $this->comments;
    }

    /**
     * @return mixed
     */
    public function getDeleted()
    {
        return $this->deleted;
    }

    /**
     * @param mixed $deleted
     */
    public function setDeleted($deleted): void
    {
        $this->deleted = $deleted;
    }

    /**
     * @return bool
     */
    public function isCommentsAllowed(): bool
    {
        return $this->commentsAllowed;
    }

    /**
     * @param mixed $commentsAllowed
     */
    public function setCommentsAllowed($commentsAllowed)
    {
        $this->commentsAllowed = $commentsAllowed;
    }
}
