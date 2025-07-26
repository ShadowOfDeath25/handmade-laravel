<?php

namespace App\Database\Models;

use App\Database\Models\Model;

class Student extends Model
{
    protected static $table = 'students_info';
    protected static $primaryKey = 'id';

    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'classroom');
    }

}


?>