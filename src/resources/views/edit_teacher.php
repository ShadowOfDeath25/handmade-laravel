<?php require_once __DIR__ . "/components/navbar.php" ?>

    <div class="custom-container">
        <form class="container mb-4" method="POST" action="/teachers/create">
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
            <select class="form-select form-select-lg mb-3" name="classroom" aria-label="Default select example">
                <option selected>Choose your classroom</option>

                <?php foreach ($classrooms as $classroom): ?>
                    <option value="<?= $classroom->id ?>"><?= $classroom->name ?></option>
                <?php endforeach; ?>
            </select>
            <select class="form-select form-select-lg mb-5" name="subject" aria-label="Default select example">
                <option selected>Choose your subject</option>
                <?php foreach ($subjects as $subject): ?>
                    <option value="<?= $subject->id ?>"><?= $subject->name ?></option>
                <?php endforeach; ?>
            </select>
            <input type="submit" name="add" class="btn btn-primary" value="Add"/>
        </form>
    </div>
<?php require_once __DIR__ . "/components/footer.php" ?>