<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 18/04/16
 * Time: 16:57
 */

namespace App;


class HtmlProfileCreator extends ProfileCreator
{
    public function show(User $user)
    {
        return "<div>
                    Id: <b>" . $this->getUserId($user) . "</b><br>
                    Name: " . $user->name . "
                </div>";
    }
}