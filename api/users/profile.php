<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
</head>
<body>
    <h2>Profile</h2>

    <?php
    // Contoh data user (ubah dengan cara sesungguhnya untuk mengambil dari API)
    $user = [
        'nama_users' => 'John Doe',
        'email' => 'john.doe@example.com',
        'username' => 'johndoe',
        'no_wa' => '1234567890',
        'alamat' => 'Jl. Contoh No. 123',
        'nik' => '1234567890123456',
        'tgl_lahir' => '1990-01-01',
        // Foto profile jika ada
        'foto_profile' => 'nama_file.jpg'
    ];
    ?>

    <p>Nama Lengkap: <?php echo $user['nama_users']; ?></p>
    <p>Email: <?php echo $user['email']; ?></p>
    <p>Username: <?php echo $user['username']; ?></p>
    <p>No WA: <?php echo $user['no_wa']; ?></p>
    <p>Alamat: <?php echo $user['alamat']; ?></p>
    <p>NIK: <?php echo $user['nik']; ?></p>
    <p>Tanggal Lahir: <?php echo $user['tgl_lahir']; ?></p>
    
    <?php if (!empty($user['foto_profile'])): ?>
        <img src="foto_profile/<?php echo $user['foto_profile']; ?>" alt="Foto Profile">
    <?php endif; ?>
    
    <br><br>
    <a href="edit_profile.php">Edit Profile</a>
</body>
</html>
