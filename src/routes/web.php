<?php

namespace App\Routes;

use App\Database\Models\Classroom;
use App\Database\Models\Subject;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Router\Router;

// Auth Routes
Router::get("/login", function () {
    session_start();
    require "../resources/views/login.php";
});
Router::post("/login", AuthController::class . "@login");
Router::get("/register", function () {
    session_start();
    require "../resources/views/register.php";
});
Router::post("/register", AuthController::class . "@register");
Router::get("/logout", AuthController::class . "@logout");

//Student Routes
Router::get("/", StudentController::class . "@index");
Router::get("/students", StudentController::class . "@index");
Router::post('/student/create', StudentController::class . "@store");
Router::get("/student/delete/{id}", StudentController::class . "@destroy");
Router::post("/student/edit/{id}", StudentController::class . "@update");
Router::get("/student/edit/{id}", function ($id) {
    session_start();
    if (!isset($_SESSION['user'])) {
        header("Location: /login");
        exit();
    }
    $data = StudentController::show($id);
    $classrooms = Classroom::all();
    if ($data['status']) {
        $student = $data['data'];
        require "../resources/views/edit_student.php";
    } else {
        $_SESSION['msg'] = $data['message'];
        header("Location: /");
    }

});

// Classes Routes
Router::get("/classrooms", ClassroomController::class . "@index");
Router::post('/classroom/create', ClassroomController::class . "@store");
Router::get("/classroom/delete/{id}", ClassroomController::class . "@destroy");
Router::post("/classroom/edit/{id}", ClassroomController::class . "@update");
Router::get("/classroom/edit/{id}", function ($id) {
    session_start();
    if (!isset($_SESSION['user'])) {
        header("Location: /login");
        exit();
    }
    $data = ClassroomController::show($id);
    if ($data['status']) {
        $classroom = $data['data'];
        require "../resources/views/edit_classroom.php";
    } else {
        $_SESSION['msg'] = $data['message'];
        header("Location: /");
    }

});

// Subjects Routes
Router::get("/subjects", SubjectController::class . "@index");
Router::post('/subjects/create', SubjectController::class . "@store");
Router::get("/subjects/delete/{id}", SubjectController::class . "@destroy");
Router::post("/subjects/edit/{id}", SubjectController::class . "@update");
Router::get("/subjects/edit/{id}", function ($id) {
    session_start();
    if (!isset($_SESSION['user'])) {
        header("Location: /login");
        exit();
    }
    $data = SubjectController::show($id);
    if ($data['status']) {
        $subject = $data['data'];
        require "../resources/views/edit_subject.php";
    } else {
        $_SESSION['msg'] = $data['message'];
        header("Location: /");
    }
}
);

//Teachers Routes
Router::get("/teachers", TeacherController::class . "@index");
Router::post('/teachers/create', TeacherController::class . "@store");
Router::get("/teachers/delete/{id}", TeacherController::class . "@destroy");
Router::post("/teachers/edit/{id}", TeacherController::class . "@update");
Router::get("/teachers/edit/{id}", function ($id) {
    session_start();
    if (!isset($_SESSION['user'])) {
        header("Location: /login");
        exit();
    }
    $data = TeacherController::show($id);
    if ($data['status']) {
        $teacher = $data['data'];
        $classrooms = Classroom::all();
        $subjects = Subject::all();
        require "../resources/views/edit_teacher.php";
    } else {
        $_SESSION['msg'] = $data['message'];
        header("Location: /teachers");
    }
});