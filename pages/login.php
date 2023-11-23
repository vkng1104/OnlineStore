<div class="content-container">
    <h1>Login</h1>
    <form onsubmit="return validateForm('login');" action="login_processing.php" method="POST">
        <div class="form-group">
            <label for="username">Email (or username)</label>
            <input type="text" name="username" id="username" class="form-control required" value="<?php echo htmlspecialchars($_GET['username'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control required">
        </div>
        <div class="form-btn">
            <button type="submit" class="mt-2 btn btn-primary">Login</button>
        </div>
    </form>

</div>