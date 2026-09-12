<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; }
        .box { max-width: 360px; margin: 80px auto; background: #fff; padding: 24px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,.1); }
        input { width: 100%; padding: 8px; margin: 6px 0 14px; box-sizing: border-box; }
        button { width: 100%; padding: 10px; background: #2d6cdf; color: #fff; border: none; border-radius: 4px; cursor: pointer; }
        .error { color: #b00020; margin-bottom: 10px; }
    </style>
</head>
<body>
    <div class="box">
        <h2>Login</h2>

        <?php if (!empty($error)): ?>
            <p class="error"><?= html_escape($error) ?></p>
        <?php endif; ?>

        <form method="post" action="<?= site_url('login') ?>">
            <label>Username</label>
            <input type="text" name="username" required autofocus>

            <label>Password</label>
            <input type="password" name="password" required>

            <button type="submit">Log In</button>
        </form>
    </div>
</body>
</html>