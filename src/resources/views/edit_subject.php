<?php require_once __DIR__ . "/components/navbar.php" ?>

    <div class="custom-container">
        <form class="container" method="POST" action="/subjects/edit/<?= $item->id ?>">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingFirstName" name="name" placeholder="Ahmed"
                       value="<?= $item->name ?>"/>
                <label for="floatingFirstName">Subject Name</label>
            </div>
            <input type="submit" name="edit" class="btn btn-primary" value="submit"/>
        </form>
    </div>
<?php require_once __DIR__ . "/components/footer.php" ?>