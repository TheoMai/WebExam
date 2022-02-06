<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Final Project</title>
    <link rel="stylesheet" href="auth.css">
</head>
<body class="background">
<div>
<div class="page">
    <form action='../../backend/api/customer/logIn.php' method="post">
        <div class="formGroup">
            <label>Email</label>
            <input type="text" name="Email" class="input-field" placeholder="john@gmail.com">
        </div>
        <div class="formGroup">
            <label>Password</label>
            <input type="text" name="Password" class="input-field" placeholder="password">
        </div>
        <input type="submit" value="log in" name="login">
    </form>
    <p>You don't have an account? <a href="signUp.php">Create account</a></p>
</div>
</div>
<script src="auth.js"></script>
</body>
</html>
