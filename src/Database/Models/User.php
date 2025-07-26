<?php

namespace App\Database\Models;

use App\Database\Models\Model;

class User extends Model

{
    protected static $table = 'users';
    protected static $primaryKey = 'id';

    public function __toString()
    {
        return $this->attributes['username'];
    }


}


?>