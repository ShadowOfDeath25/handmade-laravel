<?php

namespace App\Database\Models;

use App\Database\Models\Model;

class Student extends Model
{
    protected static $table = 'students_info';
    protected static $primaryKey = 'id';
    protected static $modelName = 'Student';
    protected static $relations = [
        'classroom' => Classroom::class,
    ];
    protected static $fillable = [
        'first_name',
        'last_name',
        'email',
        'age',
        'classroom'
    ];

    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'classroom');
    }

}


?>