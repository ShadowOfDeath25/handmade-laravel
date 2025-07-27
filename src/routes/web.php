<?php

namespace App\Routes;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Router\Router;

// Auth Routes
Router::get("/login", AuthController::class . "@renderLoginView");
Router::post("/login", AuthController::class . "@login");
Router::get("/register", AuthController::class . "@renderRegisterView");
Router::post("/register", AuthController::class . "@register");
Router::get("/logout", AuthController::class . "@logout");

//Student Routes
Router::get("/", StudentController::class . "@index");
Router::get("/students", StudentController::class . "@index");
Router::post('/student/create', StudentController::class . "@store");
Router::get("/student/delete/{id}", StudentController::class . "@destroy");
Router::post("/student/edit/{id}", StudentController::class . "@update");
Router::get("/student/edit/{id}", StudentController::class . "@renderEditView");

// Classes Routes
Router::get("/classrooms", ClassroomController::class . "@index");
Router::post('/classroom/create', ClassroomController::class . "@store");
Router::get("/classroom/delete/{id}", ClassroomController::class . "@destroy");
Router::post("/classroom/edit/{id}", ClassroomController::class . "@update");
Router::get("/classroom/edit/{id}", ClassroomController::class . "@renderEditView");

// Subjects Routes
Router::get("/subjects", SubjectController::class . "@index");
Router::post('/subjects/create', SubjectController::class . "@store");
Router::get("/subjects/delete/{id}", SubjectController::class . "@destroy");
Router::post("/subjects/edit/{id}", SubjectController::class . "@update");
Router::get("/subjects/edit/{id}", SubjectController::class . "@renderEditView");

//Teachers Routes
Router::get("/teachers", TeacherController::class . "@index");
Router::post('/teachers/create', TeacherController::class . "@store");
Router::get("/teachers/delete/{id}", TeacherController::class . "@destroy");
Router::post("/teachers/edit/{id}", TeacherController::class . "@update");
Router::get("/teachers/edit/{id}", TeacherController::class . "@renderEditView");