<?php


namespace Task\GetOnBoard\Controller;


interface IController
{
    public function listAction($communityId);
    public function createAction($userId, $communityId, $title, $text);
    public function updateAction($userId, $communityId, $articleId, $title, $text);
    public function deleteAction($userId, $communityId, $articleId);
    public function commentAction($userId, $communityId, $questionId, $text);
}