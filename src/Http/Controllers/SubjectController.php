<?php

namespace App\Http\Controllers;


use App\Database\Models\Subject;

class SubjectController
{

    public static function index()
    {
        session_start();
        if (!isset($_SESSION['user'])) {
            header("Location: /login");
            exit();
        }
        $subjects = Subject::all();
        require '../resources/views/subjects.php';
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
            ];
        }
        $subject = new Subject($data);
        if ($subject->save()) {
            header("Location:/subjects");
            exit();
        }

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
               "name" => $_POST["name"],
            ];
        }

        $subject = Subject::find($id);
        if ($subject) {
            foreach ($data as $key => $value) {
                $subject->$key = $value;
            }
            if ($subject->save()) {
                $_SESSION["msg"] = "Subject updated successfully";
                header("Location:/subjects");
                exit();
            }
            return [
                'status' => false,
                'message' => 'Failed to update subject'
            ];
        }
        return [
            'status' => false,
            'message' => 'Subject not found'
        ];
    }


    public static function destroy($id)
    {
        session_start();
        if (!isset($_SESSION['user'])) {
            header("Location: /login");
            exit();
        }
        if (Subject::find($id)->delete()) {
            $_SESSION["msg"] = "Subject deleted successfully";
            header("Location:/subjects");
            exit();
        } else {
            $_SESSION["msg"] = "Failed to delete subject";
            header("Location:/subjects");
            return [
                'status' => false,
                'message' => 'Failed to delete subject'
            ];
        }
    }

}