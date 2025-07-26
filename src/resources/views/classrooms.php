<?php

use App\Database\Models\Student;
use App\Http\Controllers\StudentController;

?>
<?php require_once __DIR__ . "/components/navbar.php" ?>
<div class="custom-container">
    <?php if (isset($_SESSION["msg"])): ?>
        <div class="container">
            <div class="alert container alert-success">
                <?= $_SESSION["msg"] ?>
            </div>
        </div>
        <?php unset($_SESSION["msg"]); ?>
    <?php endif; ?>
    <form class="container" method="POST" action="/classroom/create">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingName" name="name" placeholder="Stars">
            <label for="floatingName">Name</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingLastName" name="floor" placeholder="1">
            <label for="floatingLastName">floor</label>
        </div>

        <input type="submit" name="add" class="btn btn-primary" value="Add"/>
    </form>
    <table class="table  mt-5 container table-hover">
        <thead>
            <tr>
                <td>ID</td>
                <td>Classroom Name</td>
                <td>Floor</td>
                <td>Created By</td>
                <td>Delete</td>
                <td>Edit</td>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($items as $item) {
                ?>
                <tr>
                    <td><?= $item->id ?></td>
                    <td><?= $item->name ?? "-"; ?></td>
                    <td><?= $item->floor ?? "-"; ?></td>
                    <td> <?= $item->creator() ?></td>
                    <td>


                        <a href=/classroom/delete/<?= $item->id ?>" class="btn btn-danger">Delete</a>

                    </td>
                    <td>
                        <a href="/classroom/edit/<?= $item->id ?>" class="btn btn-primary">Edit</a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>

</div>
<?php require_once __DIR__ . "/components/footer.php" ?>
