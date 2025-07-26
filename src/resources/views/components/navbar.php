<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr"
              crossorigin="anonymous">
        <link rel="stylesheet" href="/resources/css/styles.css">
        <title>Student Manager</title>
    </head>
    <body>
        <nav>
            <div class="nav-container">
                <h2 class="logo">
                    Student Management
                </h2>
                <ul class="nav-links">
                    <li class="nav-item">
                        <a href="/" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="/classrooms" class="nav-link">Classrooms</a>
                    </li>
                    <li class="nav-item">
                        <a href="/subjects" class="nav-link">Subjects</a>
                    </li>
                    <li class="nav-item">
                        <a href="/teachers" class="nav-link">Teachers</a>
                    </li>
                    <li class="nav-item">
                        <a href="/login" class="nav-link">Sign In</a>
                    </li>
                    <li class="nav-item">
                        <a href="/register" class="nav-link">Register</a>
                    </li>
                    <?php if (isset($_SESSION['user'])): ?>
                        <li class="nav-item">
                            <a href="/logout" class="nav-link">Logout</a>
                        </li>
                    <?php endif ?>
                </ul>
            </div>

        </nav>