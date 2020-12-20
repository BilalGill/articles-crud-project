<?php

namespace Task\GetOnBoard\Entity;

use Task\GetOnBoard\Factory\PostFactory;
use Task\GetOnBoard\Repository\CommunityRepository;

class Community
{
    public $id;
    public $name;
    public $posts = [];

    public function __construct()
    {
        $this->id =  uniqid();
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @param $userId
     * @param $title
     * @param $text
     * @param $type
     * @param null $parent
     * @return Post|null
     */
    public function addPost($userName, $title, $text, $type, $parent = null)
    {
        $post = null;

        $post = PostFactory::getPost($userName, $title, $text, $type, $parent);

        $this->posts[] = $post;

        return $post;
    }

    /**
     * @param $id
     * @param $title
     * @param $text
     * @return mixed|null
     */
    public function updatePost($id, $title, $text)
    {
        $post = null;
        foreach ($this->posts as $post) {
            if ($post->id == $id) {
                $post->setTitle($title);
                $post->setText($text);

                break;
            }
        }

//        $this->posts[] = $post;

        return $post;
    }

    /**
     * @param $id
     * @param $text
     * @return null
     */
    public function addComment($parentId, $text)
    {
        $post = null;
        foreach ($this->posts as $post) {
            if ($post->id == $parentId) {
                break;
            }
        }

        $comment = null;
        if($post->isCommentsAllowed()) {
            $comment = $post->addComment($text);
        }

        return $comment;
    }

    /**
     * @param $id
     */
    public function deletePost($id)
    {
        $post = null;
        foreach ($this->posts as $post) {
            if ($post->id == $id) {
                break;
            }
        }

        $post->setDeleted(true);
    }

    /**
     * @return array
     */
    public function getPosts()
    {
        $posts = [];
        foreach ($this->posts as $post){
            if (!$post->getDeleted()) {
                $posts[] = $post;
            }
        }

        return $posts;
    }

    /**
     * @param $articleId
     * return void
     */
    public function disableCommentsForArticle($articleId): void
    {
        $post = null;
        foreach ($this->posts as $post) {
            if ($post->id == $articleId) {
                break;
            }
        }

        $post->setCommentsAllowed(false);
    }
}
