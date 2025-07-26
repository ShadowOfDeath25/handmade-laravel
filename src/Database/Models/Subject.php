<?php

namespace App\Database\Models;

use App\Database\Models\Model;

class Subject extends Model
{
    protected static $table = 'subjects';
    protected static $primaryKey = 'id';
    protected static $modelName = 'Subject';
    protected static $fillable = [
        "name"
    ];

    public function __toString()
    {
        return $this->attributes['name'];
    }


}