<?php

namespace Task\GetOnBoard\Repository;

use Task\GetOnBoard\Entity\Community;
use Task\GetOnBoard\Entity\User;

class CommunityRepository
{
    private static $communities = [];
    private static $users = [];

    public static function getCommunity($id): Community
    {
        $community = array();
        foreach (self::$communities as $community) {
            if ($community->id == $id) {
                return $community;
            }
        }

        return $community;
    }

    public static function addCommunity(\Task\GetOnBoard\Entity\Community $community)
    {
        self::$communities[] = $community;
    }

    public static function getUser($id): User
    {
        $user = array();
        foreach (self::$users as $user) {
            if ($user->id == $id) {
                return $user;
            }
        }

        return $user;
    }

    public static function addUser(\Task\GetOnBoard\Entity\User $user)
    {
        self::$users[] = $user;
    }
}
