<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 18/04/16
 * Time: 17:11
 */

namespace App;


class JsonProfileCreator extends ProfileCreator
{
    public function show(User $user)
    {
        return json_encode($user);
    }
}