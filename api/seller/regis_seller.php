<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Registrasi Seller</title>
</head>
<body>
    <h2>Form Registrasi Seller</h2>

    <form action="http://localhost:1323/sellers" method="POST" enctype="multipart/form-data">
        <label for="nama_seller">Nama Seller:</label>
        <input type="text" id="nama_seller" name="nama_seller" required><br><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        
        <label for="pass">Password:</label>
        <input type="password" id="pass" name="pass" required><br><br>
        
        <label for="no_wa">No WA:</label>
        <input type="text" id="no_wa" name="no_wa" required><br><br>
        
        <label for="alamat">Alamat:</label>
        <textarea id="alamat" name="alamat"></textarea><br><br>
        
        <label for="nik">NIK:</label>
        <input type="text" id="nik" name="nik"><br><br>
        
        <label for="tgl_lahir">Tanggal Lahir:</label>
        <input type="date" id="tgl_lahir" name="tgl_lahir" required><br><br>
        
        <label for="foto_profile">Foto Profile:</label>
        <input type="file" id="foto_profile" name="foto_profile"><br><br>
        
        <input type="submit" value="Submit">
    </form>
</body>
</html>
