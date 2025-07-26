<?php

namespace App\Http\Controllers;

use App\Database\Models\Teacher;


class TeacherController extends ResourceController
{
    protected static $model = Teacher::class;
    protected static $viewPath = '../resources/views/teachers.php';
    protected static $editViewPath = '../resources/views/edit_teachers.php';
}



