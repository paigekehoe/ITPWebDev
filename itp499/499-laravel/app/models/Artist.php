<?php
/**
 * Created by PhpStorm.
 * User: pkehoe
 * Date: 2/18/14
 * Time: 5:59 PM
 */

class Artist extends Eloquent{


    public function songs()
    {
        return $this->hasMany('Song');

    }
} 