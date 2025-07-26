<?php

namespace App\Http\Controllers;

use App\Database\Models\Subject;
use App\Database\Models\Teacher;
use App\Database\Models\Classroom;

class TeacherController
{

    public static function index()
    {
        session_start();
        if (!isset($_SESSION['user'])) {
            header("Location: /login");
            exit();
        }
        $teachers = Teacher::all();
        $classrooms = Classroom::all();
        $subjects = Subject::all();
        require '../resources/views/teachers.php';
    }

    public static function store($data = [])
    {
        session_start();
        if (!isset($_SESSION['user'])) {
            header("Location: /login");
            exit();
        }
        if ($data == []) {
            $data = [
                "first_name" => $_POST["first_name"],
                "last_name" => $_POST["last_name"],
                "email" => $_POST["email"],
                "age" => $_POST["age"],
                "classroom" => $_POST["classroom"],
                "subject" => $_POST["subject"]
            ];
        }
        $teacher = new Teacher($data);
        if ($teacher->save()) {
            $_SESSION['msg'] = "Teacher created successfully";
        } else {
            $_SESSION['msg'] = "Teacher creation failed";
        }
        header("Location:/teachers");
        exit();
    }

    public static function show($id)
    {
        $subject = Subject::find($id);
        if ($subject) {
            return [
                'status' => true,
                'data' => $subject
            ];
        }
        return [
            'status' => false,
            'message' => 'Subject not found'
        ];
    }

    public static function update($id, $data = [])
    {
        session_start();
        if (!isset($_SESSION['user'])) {
            header("Location: /login");
            exit();
        }
        if ($data == []) {
            $data = [
                "first_name" => $_POST["first_name"],
                "last_name" => $_POST["last_name"],
                "email" => $_POST["email"],
                "age" => $_POST["age"],
                "classroom" => $_POST["classroom"],
                "subject" => $_POST["subject"]
            ];
        }
        $teacher = Teacher::find($id);
        if ($teacher) {
            foreach ($data as $key => $value) {
                $teacher->$key = $value;
            }
            if ($teacher->save()) {
                $_SESSION["msg"] = "Teacher updated successfully";
            } else {
                $_SESSION["msg"] = "Failed to update teacher";
            }
        } else {
            $_SESSION['msg'] = "Teacher not found";
        }
        header("Location:/teachers");
        exit();
    }

    public static function destroy($id)
    {
        session_start();
        if (!isset($_SESSION['user'])) {
            header("Location: /login");
            exit();
        }
        $teacher = Teacher::find($id);
        if ($teacher) {
            $teacher->delete();
            $_SESSION['msg'] = "Teacher deleted successfully";
        } else {
            $_SESSION['msg'] = "Teacher not found";
        }

    }
}



