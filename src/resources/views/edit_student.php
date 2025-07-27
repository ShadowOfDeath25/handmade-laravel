<?php require_once __DIR__ . "/components/navbar.php" ?>

    <div class="custom-container">
        <form class="container" method="POST" action="/student/edit/<?= $student->id ?>">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingFirstName" name="first_name" placeholder="Ahmed"
                       value="<?= $student->first_name ?>"/>
                <label for="floatingFirstName">First name</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingLastName" name="last_name" placeholder="Mohamed"
                       value="<?= $student->last_name ?>">
                <label for="floatingLastName">Last Name</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingEmailName" name="email"
                       placeholder="Ahmed@gmail.com"
                       value="<?= $student->email ?>">
                <label for="floatingEmailName">Email address</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingAge" name="age" value="<?= $student->age ?>"
                       placeholder="18">
                <label for="floatingAge">Age</label>
            </div>
            <select class="form-select form-select-lg mb-5" name="classroom" aria-label="Default select example">
                <option selected>Choose your classroom</option>
                <?php foreach ($relatedData["classrooms"] as $classroom): ?>
                    <option <?php if ($classroom->id === $student->classroom) echo "selected" ?>
                            value="<?= $classroom->id ?>"><?= $classroom->name ?></option>
                <?php endforeach; ?>
            </select>
            <input type="submit" name="edit" class="btn btn-primary" value="Save"/>
        </form>
    </div>
<?php require_once __DIR__ . "/components/footer.php" ?>