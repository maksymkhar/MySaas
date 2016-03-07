<?php

namespace App;

/**
 * Created by PhpStorm.
 * User: max
 * Date: 7/03/16
 * Time: 19:07
 */

trait OAuthIdentities
{
    /**
     * Get OAuth identities
     */
    public function oauthIdentities()
    {
        return $this->hasMany(\app\OAuthIdentity::class);
    }
}