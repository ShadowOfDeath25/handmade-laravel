<?php

namespace App\Http\Controllers;

use App\Database\Models\Classroom;

class ClassroomController extends ResourceController
{
    protected static $model = Classroom::class;
    protected static $viewPath = '../resources/views/classrooms.php';
    protected static $editViewPath = '../resources/views/edit_classroom.php';

    public static function store($data = [])
    {
        AuthController::checkAuth();
        if ($data == []) {
            $data = [
                "name" => $_POST["name"],
                "floor" => $_POST["floor"],
                "creator" => $_SESSION['user']->id,
            ];

        }
        $item = new Classroom($data);
        if ($item->save()) {
            $_SESSION['msg'] = "Classroom created successfully";
            header("location:/classrooms");
        }
    }

}