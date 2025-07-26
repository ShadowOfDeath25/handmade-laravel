<?php

namespace App\Http\Controllers;

use App\Database\Models\Classroom;
use App\Database\Models\Student;
use http\Exception\BadHeaderException;

class StudentController
{
    public static function index()
    {
        $students = Student::all();
        $classrooms = Classroom::all();
        session_start();
        if (!isset($_SESSION['user'])) {
            header("Location: /login");
            exit();
        }
        require "../resources/views/home.php";
    }


    public static function show($id)
    {
        $student = Student::find($id);
        if ($student) {
            return [
                'status' => true,
                'data' => $student
            ];
        }
        return [
            'status' => false,
            'message' => 'Student not found'
        ];
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
                "classroom" => $_POST["classroom"]
            ];
        }
        $student = new Student($data);
        if ($student->save()) {
            header("Location:/");
            exit();
        }
        return [
            'status' => false,
            'message' => 'Failed to create student'
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
                "classroom" => $_POST["classroom"]
            ];
        }

        $student = Student::find($id);
        if ($student) {
            foreach ($data as $key => $value) {
                $student->$key = $value;
            }
            if ($student->save()) {
                $_SESSION["msg"] = "Student updated successfully";
                header("Location:/");
                exit();
            }
            return [
                'status' => false,
                'message' => 'Failed to update student'
            ];
        }
        return [
            'status' => false,
            'message' => 'Student not found'
        ];
    }

    public static function destroy($id)
    {
        session_start();
        if (!isset($_SESSION['user'])) {
            header("Location: /login");
            exit();
        }
        $student = Student::find($id);
        if ($student) {
            $_SESSION["msg"] = "Student deleted successfully";
            if ($student->delete()) {
                header("Location:/");
                exit();
            }
            return [
                'status' => false,
                'message' => 'Failed to delete student'
            ];
        }
        return [
            'status' => false,
            'message' => 'Student not found'
        ];
    }
}