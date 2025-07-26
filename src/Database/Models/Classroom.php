<?php

namespace App\Database\Models;
class Classroom extends Model
{
    protected static $table = 'classes';
    protected static $primaryKey = 'id';

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator');
    }

    public function __toString()
    {
        return $this->attributes['name'];
    }
}


?>