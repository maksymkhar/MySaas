<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 18/04/16
 * Time: 17:30
 */

namespace App;


abstract class ProfileCreator implements Profile
{
    protected function getUserId(User $user)
    {
        return $user->id;
    }
}