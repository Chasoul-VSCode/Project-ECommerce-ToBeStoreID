<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Seller</title>
</head>
<body>
    <h2>Login Seller</h2>
    <form action="" method="post">
        
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" value="Login">
    </form>

    <?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $url = 'http://localhost:1323/login_seller'; 

    $postFields = [
        'username' => $_POST['username'],
        'password' => $_POST['password'],
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postFields));

    $response = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }
    curl_close($ch);

    // Handle response
    if ($response === FALSE) {
        die('Error occurred');
    }

    // Decode response
    $responseData = json_decode($response, true);

    // Check for login success
    if (isset($responseData['kd_seller'])) {
        // Simpan kd_seller di sesi
        $_SESSION['kd_seller'] = $responseData['kd_seller'];

        // Redirect ke halaman selanjutnya setelah login berhasil
        header('Location: form_barang.php'); // Redirect ke halaman form barang
        exit();
    } else {
        echo '<h3>Login failed</h3>';
        echo '<pre>';
        print_r($responseData);
        echo '</pre>';
    }
}
?>

</body>
</html>
