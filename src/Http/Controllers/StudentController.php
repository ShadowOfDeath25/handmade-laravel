<?php

namespace App\Http\Controllers;

use App\Database\Models\Classroom;
use App\Database\Models\Student;


class StudentController extends ResourceController
{
    protected static $model = Student::class;
    protected static $viewPath = '../resources/views/home.php';
    protected static $editViewPath = '../resources/views/edit_student.php';

}