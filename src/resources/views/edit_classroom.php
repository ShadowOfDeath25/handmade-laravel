<?php require_once __DIR__ . "/components/navbar.php" ?>

    <div class="custom-container">
        <form class="container" method="POST" action="/classroom/edit/<?= $classroom->id ?>">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingName" name="name" placeholder="stars"
                       value="<?= $classroom->name ?>"/>
                <label for="floatingFirstName">Name</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingLastName" name="floor" placeholder="Mohamed"
                       value="<?= $classroom->floor ?>">
                <label for="floatingLastName">Floor</label>
            </div>
            <input type="submit" name="edit" class="btn btn-primary" value="Save"/>
        </form>
    </div>
<?php require_once __DIR__ . "/components/footer.php" ?>