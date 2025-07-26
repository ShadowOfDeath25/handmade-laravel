<?php


use App\Database\Models\User;
use http\Client\Response;
use App\Http\Controllers\AuthController;

?>
<?php require_once __DIR__ . "/components/navbar.php" ?>
<?php if (isset($_SESSION["msg"])): ?>
    <div class="alert container alert-danger" role="alert">
        <?= $_SESSION["msg"] ?>
    </div>
    <?php unset($_SESSION["msg"]); ?>
<?php endif; ?>
<div class="custom-container">
    <form class=" custom-form large" method="POST" action="/register">
        <div class="input-container">
            <label for="email">Email address</label>
            <input type="email" name="email" id="email" placeholder="Email" required>
        </div>
        <div class="input-container">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" placeholder="Username" required>
        </div>
        <div class="input-container">
            <label for="age">Age</label>
            <input type="text" name="age" id="age" placeholder="Age" required>
        </div>
        <div class="input-container">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Password" required>
        </div>
        <input type="submit" class="login-button" value="Register">

    </form>
</div>
<?php require_once __DIR__ . "/components/footer.php" ?>
