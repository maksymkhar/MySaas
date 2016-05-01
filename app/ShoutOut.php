<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoutOut extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'content'
    ];

    protected $with = array('user');

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
