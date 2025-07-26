<?php

namespace App\Database\Models;

use App\Database\Models\User;

class Teacher extends Model
{
    protected static $table = "teachers";
    protected static $primaryKey = "id";

    public function subject()
    {
        return $this->belongsTo(Subject::class, "subject");
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class, "classroom");
    }
}