<?php

namespace App\Database\Models;

use App\Database\Models\User;

class Teacher extends Model
{
    protected static $table = "teachers";
    protected static $primaryKey = "id";
    protected static $modelName = "Teacher";
    protected static $relations = [
        "subject" => Subject::class,
        "classroom" => Classroom::class
    ];
    protected static $fillable = [
        "first_name",
        "last_name",
        "email",
        "subject",
        "age",
        "classroom"
    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class, "subject");
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class, "classroom");
    }
}