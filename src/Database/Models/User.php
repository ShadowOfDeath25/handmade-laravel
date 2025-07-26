<?php

namespace App\Database\Models;

use App\Database\Models\Model;

class User extends Model

{
    protected static $table = 'users';
    protected static $primaryKey = 'id';
    protected static $modelName = 'User';
    protected static $fillable = [
        'username',
        'email',
        'age',
        'password',

    ];

    public function __toString()
    {
        return $this->attributes['username'];
    }


}


?>