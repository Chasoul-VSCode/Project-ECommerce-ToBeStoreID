<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
</head>
<body>
    <h2>Registration Form</h2>

    <form action="http://localhost:1323/register_users" method="POST" enctype="multipart/form-data">
        <label for="nama_users">Nama Lengkap:</label>
        <input type="text" id="nama_users" name="nama_users" required><br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="pass">Password:</label>
        <input type="password" id="pass" name="pass" required><br><br>
        <label for="no_wa">No WA:</label>
        <input type="text" id="no_wa" name="no_wa" required><br><br>
        <label for="alamat">Alamat:</label>
        <textarea id="alamat" name="alamat" required></textarea><br><br>
      
        <label for="tgl_lahir">Tanggal Lahir:</label>
        <input type="date" id="tgl_lahir" name="tgl_lahir" required><br><br>

        <input type="submit" value="Register">
    </form>

    <p>Sudah punya akun? <a href="login_2.php">Login disini</a></p>
</body>
</html>
