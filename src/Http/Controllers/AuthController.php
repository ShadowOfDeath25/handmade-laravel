<?php

namespace App\Http\Controllers;

use App\Database\Models\User;
use http\Client\Request;

class AuthController
{
    private static function initSession()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function login()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        self::initSession();
        $user = User::where("email", "=", $email)[0];

        if ($user && password_verify($password, $user->password)) {
            $_SESSION["user"] = $user;
            header("location:/");
            exit();
        } else {
            $_SESSION["msg"] = "Invalid email or password";
            header("Location: /login");
            exit();
        }

    }

    public static function register($data = [])
    {
        session_start();
        if ($data == []) {
            $data = [
                "email" => $_POST["email"],
                "username" => $_POST["username"],
                "age" => $_POST["age"],
                "password" => password_hash($_POST["password"], PASSWORD_BCRYPT)
            ];
        }
        $checkUser = User::where("email", "=", $data['email']);
        if ($checkUser) {
            $_SESSION["msg"] = "User with this email already exists";
            header("Location: /register");
            exit();
        }
        $user = new User($data);
        if ($user->save()) {
            $_SESSION["user"] = $user;
            $_SESSION["msg"] = "Registered successfully";
            header("Location: /");
            exit();
        } else {
            $_SESSION["msg"] = "Something went wrong";
            exit();
        }
    }

    public static function logout()
    {
        session_start();
        if (isset($_SESSION['user'])) {
            session_destroy();
        }
        header("location:/login");
        exit();
    }

    public static function checkAuth()
    {
        self::initSession();
        if (!isset($_SESSION['user'])) {
            header("Location: /login");
            exit();
        }
    }
}

?>