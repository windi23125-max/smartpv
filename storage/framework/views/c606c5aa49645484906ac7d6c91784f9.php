<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SmartPV</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #1a4d2e; height: 100vh; display: flex; align-items: center; justify-content: center; margin: 0; font-family: 'Inter', sans-serif; }
        .login-card { background: white; border-radius: 30px; overflow: hidden; display: flex; box-shadow: 0 20px 40px rgba(0,0,0,0.3); width: 850px; max-width: 95%; min-height: 500px; }
        .login-left { width: 50%; background: #f8faf9; display: flex; align-items: center; justify-content: center; padding: 40px; }
        .login-left img { max-width: 100%; height: auto; border-radius: 20px; }
        .login-right { width: 50%; padding: 50px; display: flex; flex-direction: column; justify-content: center; }
        .login-right h2 { font-weight: 700; color: #1a4d2e; margin-bottom: 30px; }
        .form-control { border-radius: 12px; padding: 12px; border: 1px solid #ddd; margin-bottom: 20px; }
        .btn-login { background: #1a4d2e; color: white; border: none; padding: 12px; border-radius: 12px; font-weight: 600; width: 100%; transition: 0.3s; }
        .btn-login:hover { background: #4f6f52; transform: translateY(-2px); }
    </style>
</head>
<body>
<div class="login-card">
    <div class="login-left">
        <img src="<?php echo e(asset('images/login-bg.png')); ?>" alt="Login Illustration">
    </div>
    <div class="login-right">
        <h2>Login</h2>
        <form method="POST" action="/login">
            <?php echo csrf_field(); ?>
            <input type="email" name="email" class="form-control" placeholder="Email Address" required>
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            <button type="submit" class="btn-login">Login to Dashboard</button>
        </form>
    </div>
</div>
</body>
</html><?php /**PATH D:\laragon\www\smartpv\resources\views/auth/login.blade.php ENDPATH**/ ?>