<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
</head>
<body>
    <h2>Chat</h2>
    <form action="" method="post">
        <label for="text_chat">Message:</label><br>
        <input type="text" id="text_chat" name="text_chat" required><br><br>

        <input type="submit" value="Send">
    </form>

    <?php
    session_start();

    if (!isset($_SESSION['kd_user'])) {
        echo '<h3>You are not logged in. Please login first.</h3>';
        exit();
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $url = 'http://localhost:1323/postchat'; // Ganti dengan URL sesuai dengan endpoint Anda

        $postFields = [
            'kd_user' => $_SESSION['kd_user'],
            'text_chat' => $_POST['text_chat'],
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

        // Output response
        echo '<h3>Response from server:</h3>';
        echo '<pre>';
        print_r($responseData);
        echo '</pre>';
    }
    ?>
</body>
</html>
