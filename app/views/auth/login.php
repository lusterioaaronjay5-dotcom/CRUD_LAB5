<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — Product Manager</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'Segoe UI', -apple-system, BlinkMacSystemFont, sans-serif;
            background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .card {
            background: #fff;
            width: 100%;
            max-width: 380px;
            border-radius: 16px;
            padding: 40px 36px;
            box-shadow: 0 20px 50px rgba(0,0,0,0.25);
        }
        .logo {
            width: 52px;
            height: 52px;
            background: linear-gradient(135deg, #4f46e5, #7c3aed);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 24px;
            font-weight: 700;
            margin: 0 auto 20px;
        }
        h2 {
            text-align: center;
            color: #1e1b4b;
            font-size: 22px;
            margin-bottom: 4px;
        }
        .subtitle {
            text-align: center;
            color: #6b7280;
            font-size: 14px;
            margin-bottom: 28px;
        }
        label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #374151;
            margin-bottom: 6px;
            margin-top: 16px;
        }
        input {
            width: 100%;
            padding: 12px 14px;
            border: 1.5px solid #e5e7eb;
            border-radius: 8px;
            font-size: 14px;
            transition: border-color 0.2s;
        }
        input:focus {
            outline: none;
            border-color: #4f46e5;
        }
        button {
            width: 100%;
            margin-top: 24px;
            padding: 12px;
            background: linear-gradient(135deg, #4f46e5, #7c3aed);
            color: #fff;
            font-size: 15px;
            font-weight: 600;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: opacity 0.2s;
        }
        button:hover { opacity: 0.9; }
        .error {
            background: #fef2f2;
            color: #b91c1c;
            border: 1px solid #fecaca;
            padding: 10px 14px;
            border-radius: 8px;
            font-size: 13px;
            margin-bottom: 8px;
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="logo">P</div>
        <h2>Welcome back</h2>
        <p class="subtitle">Sign in to manage your products</p>

        <?php if (!empty($error)): ?>
            <p class="error"><?= html_escape($error) ?></p>
        <?php endif; ?>

        <form method="post" action="<?= site_url('login') ?>">
            <label>Username</label>
            <input type="text" name="username" required autofocus placeholder="Enter your username">

            <label>Password</label>
            <input type="password" name="password" required placeholder="Enter your password">

            <button type="submit">Log In</button>
        </form>
    </div>
</body>
</html>