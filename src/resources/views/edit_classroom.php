<?php require_once __DIR__ . "/components/navbar.php" ?>

    <div class="custom-container">
        <form class="container" method="POST" action="/classroom/edit/<?= $item->id ?>">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingName" name="name" placeholder="stars"
                       value="<?= $item->name ?>"/>
                <label for="floatingFirstName">Name</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingLastName" name="floor" placeholder="Mohamed"
                       value="<?= $item->floor ?>">
                <label for="floatingLastName">Floor</label>
            </div>
            <input type="submit" name="edit" class="btn btn-primary" value="submit"/>
        </form>
    </div>
<?php require_once __DIR__ . "/components/footer.php" ?>