<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
</head>
<body>
    <h2>Login Form</h2>

    <form action="http://localhost:1323/login" method="POST">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Login">
    </form>

    <p>Belum punya akun? <a href="register_users.php">Register disini</a></p>

    <?php
    // PHP code to handle redirect after successful login
    if (isset($_GET['login_success']) && $_GET['login_success'] == 'true') {
        echo "<script>window.location.href = 'profile.php';</script>";
    }
    ?>
</body>
</html>
