<?php require_once __DIR__ . "/components/navbar.php" ?>
    <div class="custom-container">
        <form class="container mb-4" method="POST" action="/subjects/create">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingSubjectName" name="name" placeholder="Math">
                <label for="floatingSubjectName">Subject name</label>
            </div>
            <input type="submit" name="add" class="btn btn-primary" value="Add"/>
        </form>
        <table class="table  mt-5 container table-hover">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Subject Name</td>
                    <td>Delete</td>
                    <td>Edit</td>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($subjects as $subject) {
                    ?>
                    <tr>
                        <td><?= $subject->id ?></td>
                        <td><?= $subject->name ?? "-"; ?></td>

                        <td>
                            <a href=/subjects/delete/<?= $subject->id ?>" class="btn btn-danger">Delete</a>
                        </td>
                        <td>
                            <a href="/subjects/edit/<?= $subject->id ?>" class="btn btn-primary">Edit</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
<?php require_once __DIR__ . "/components/footer.php" ?>