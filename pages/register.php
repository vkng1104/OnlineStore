<div class="content-container">
    <h2>Register</h2>
    <form method="POST" action="register_processing.php" onsubmit="return validateForm('register');">
        <div class="form-group">
            <label for="username">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <?php
        if (isset($_GET["error"])) {
            echo "<p class='mb-0 mt-2 error-msg'>{$_GET['error']}</p>";
        }
        ?>
        <div class="form-btn">
            <button type="submit" class="mt-2 btn btn-primary">Register</button>
        </div>
    </form>
</div>