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
        <title>Document</title>
    </head>
    <body>
        <div class="container mt-5">
            <form method="post">
                <div class="mb-3">
                    <label for="exampleInputEmail">User Name</label>
                    <input type="text" name="User_Name" id="exampleInputEmail" placeholder="Enter user name">
                </div>
                <button type="submit" class="btn btn-info">Submit</button>
            </form>
        </div>


    </body>
</html>
<?php
print_r(@$_POST);
?>