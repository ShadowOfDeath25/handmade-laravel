<?php

namespace App\Http\Controllers;

use App\Database\Models\Classroom;

class ClassroomController
{
    public static function index()
    {
        $classrooms = Classroom::all();
        session_start();
        if (!isset($_SESSION['user'])) {
            header("Location: /login");
            exit();
        }
        require "../resources/views/classrooms.php";
    }


    public static function show($id)
    {
        $classroom = Classroom::find($id);
        if ($classroom) {
            return [
                'status' => true,
                'data' => $classroom
            ];
        }
        return [
            'status' => false,
            'message' => 'Classroom not found'
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
                "name" => $_POST["name"],
                "floor" => $_POST["floor"],
                "creator" => $_SESSION['user']->id,
            ];
        }
        $classroom = new Classroom($data);
        if ($classroom->save()) {
            header("Location:/classrooms");
            exit();
        }
        return [
            'status' => false,
            'message' => 'Failed to create classroom'
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
                "name" => $_POST["name"],
                "floor" => $_POST["floor"],
            ];
        }
        $classroom = Classroom::find($id);
        if ($classroom) {
            foreach ($data as $key => $value) {
                $classroom->$key = $value;
            }
            if ($classroom->save()) {
                $_SESSION["msg"] = "Classroom updated successfully";
                header("Location:/classrooms");
                exit();
            }
            return [
                'status' => false,
                'message' => 'Failed to update classroom'
            ];
        }
        return [
            'status' => false,
            'message' => 'Classroom not found'
        ];
    }

    public static function destroy($id)
    {
        session_start();
        if (!isset($_SESSION['user'])) {
            header("Location: /login");
            exit();
        }
        $classroom = Classroom::find($id);
        if ($classroom) {
            $_SESSION["msg"] = "Classroom deleted successfully";
            if ($classroom->delete()) {
                header("Location:/classrooms");
                exit();
            }
            return [
                'status' => false,
                'message' => 'Failed to delete student'
            ];
        }
        return [
            'status' => false,
            'message' => 'Classroom not found'
        ];
    }


}