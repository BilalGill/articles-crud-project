<?php

namespace Task\GetOnBoard\Factory;

use Task\GetOnBoard\Entity\Article;
use Task\GetOnBoard\Entity\Conversation;
use Task\GetOnBoard\Entity\Post;
use Task\GetOnBoard\Entity\Question;

class PostFactory
{
    public static function getPost($userName, $title = null, $text, $type, $parent = null) : Post{

        switch ($type){
            case "article":
                $post = new Article();
                $post->setUserName($userName);
                $post->setTitle($title);
                $post->setText($text);
                $post->setType($type);

                return $post;
            case "conversation":
                $post = new Conversation();
                $post->setUserName($userName);
                $post->setText($text);
                $post->setType($type);

                if ($parent) {
                    $post->setParent($parent);
                }
                return $post;
            case "question":
                $post = new Question();
                $post->setUserName($userName);
                $post->setTitle($title);
                $post->setText($text);
                $post->setType($type);

                if ($parent) {
                    $post->setParent($parent);
                }
                return $post;
        }
    }
}