<?php
require_once __DIR__ . '/components/navbar.php';
?>
<div class="custom-container">
    <?php if (isset($_SESSION["msg"])): ?>
        <div class="container" style="position: absolute; top: 0;">
            <div class="alert container alert-danger">
                <?= $_SESSION["msg"] ?>
            </div>
        </div>
        <?php unset($_SESSION["msg"]); ?>
    <?php endif; ?>
    <form action="/login" method="post" class="custom-form">
        <div class="input-container">
            <label for="email">Email address</label>
            <input type="email" name="email" placeholder="Email" required>
        </div>
        <div class="input-container">
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="password" required>
        </div>
        <input type="submit" class="login-button" value="Login">
    </form>
</div>
<?php require_once __DIR__ . "/components/footer.php" ?>
