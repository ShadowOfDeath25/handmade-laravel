<?php require_once __DIR__ . "/components/navbar.php" ?>

    <div class="custom-container">
        <form class="container mb-4" method="POST" action="/teachers/create">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingFirstName" value="<?= $item->first_name ?>"
                       name="first_name" placeholder="Ahmed">
                <label for="floatingFirstName">First name</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" value="<?= $item->last_name ?>" id="floatingLastName"
                       name="last_name" placeholder="Mohamed">
                <label for="floatingLastName">Last Name</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" value="<?= $item->email ?>" class="form-control" id="floatingEmailName"
                       name="email"
                       placeholder="Ahmed@gmail.com">
                <label for="floatingEmailName">Email address</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" value="<?= $item->age ?>" id="floatingAge" name="age"
                       placeholder="18">
                <label for="floatingAge">Age</label>
            </div>
            <select class="form-select form-select-lg mb-3" name="classroom" aria-label="Default select example">
                <option>Choose your classroom</option>

                <?php foreach ($relatedData["classrooms"] as $classroom): ?>
                    <option <?php if ($classroom->id === $item->classroom) echo "selected" ?>
                            value="<?= $classroom->id ?>">
                        <?= $classroom->name ?></option>
                <?php endforeach; ?>
            </select>
            <select class="form-select form-select-lg mb-5" name="subject" aria-label="Default select example">
                <option>Choose your subject</option>
                <?php foreach ($relatedData["subjects"] as $subject): ?>
                    <option
                        <?php if ($subject->id === $item->classroom) echo "selected" ?>
                            value="<?= $classroom->id ?>">
                        <?= $subject->name ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <input type="submit" name="add" class="btn btn-primary" value="Add"/>
        </form>
    </div>
<?php require_once __DIR__ . "/components/footer.php" ?>