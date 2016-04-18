<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 18/04/16
 * Time: 17:15
 */

namespace App;


interface Profile
{
    public function show(User $user);
}