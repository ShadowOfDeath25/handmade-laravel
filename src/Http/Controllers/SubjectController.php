<?php

namespace App\Http\Controllers;


use App\Database\Models\Subject;

class SubjectController extends ResourceController
{
    protected static $model = Subject::class;
    protected static $viewPath = '../resources/views/subjects.php';
    protected static $editViewPath = '../resources/views/edit_subject.php';

}