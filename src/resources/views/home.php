
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
    <form class="container mb-4" method="POST" action="/student/create">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingFirstName" name="first_name" placeholder="Ahmed">
            <label for="floatingFirstName">First name</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingLastName" name="last_name" placeholder="Mohamed">
            <label for="floatingLastName">Last Name</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingEmailName" name="email"
                   placeholder="Ahmed@gmail.com">
            <label for="floatingEmailName">Email address</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingAge" name="age" placeholder="18">
            <label for="floatingAge">Age</label>
        </div>
        <select class="form-select form-select-lg mb-5" name="classroom" aria-label="Default select example">
            <option selected>Choose your classroom</option>

            <?php foreach ($relatedData["classrooms"] as $classroom): ?>
                <option value="<?= $classroom->id ?>"><?= $classroom->name ?></option>
            <?php endforeach; ?>
        </select>
        <input type="submit" name="add" class="btn btn-primary" value="Add"/>
    </form>
    <table class="table  mt-5 container table-hover">
        <thead>
            <tr>
                <td>ID</td>
                <td>First Name</td>
                <td>Last Name</td>
                <td>Email</td>
                <td>Age</td>
                <td>Classroom</td>
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
                    <td><?= $item->first_name ?? "-"; ?></td>
                    <td><?= $item->last_name ?? "-"; ?></td>
                    <td><?= $item->email ?? "-"; ?></td>
                    <td><?= $item->age ?? "-"; ?></td>
                    <td><?= $item->classroom() ?? "-"; ?></td>
                    <td>

                        <a href=/student/delete/<?= $item->id ?>" class="btn btn-danger">Delete</a>

                    </td>
                    <td>
                        <a href="/student/edit/<?= $item->id ?>" class="btn btn-primary">Edit</a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    <script src="/resources/js/script.js"></script>
</div>
<?php require_once __DIR__ . "/components/footer.php" ?>
