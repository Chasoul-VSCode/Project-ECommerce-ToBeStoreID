<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Seller</title>
    <script>
        async function handleLogin(event) {
            event.preventDefault();
            const form = event.target;
            const formData = new FormData(form);
            
            try {
                const response = await fetch('http://localhost:1323/login_seller', {
                    method: 'POST',
                    body: formData,
                });

                const result = await response.json();
                if (response.ok) {
                    // Simpan kd_seller di sesi menggunakan PHP
                    await fetch('save_session.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({ kd_seller: result.kd_seller }),
                    });
                    
                    // Setelah sesi berhasil disimpan, pindah ke produk.php
                    window.location.href = 'produk.php';
                } else {
                    document.getElementById('error').textContent = result.error || 'Login failed';
                }
            } catch (error) {
                document.getElementById('error').textContent = 'An error occurred';
            }
        }
    </script>
</head>
<body>
    <h1>Login Seller</h1>
    <p id="error" style="color: red;"></p>
    <form onsubmit="handleLogin(event)">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        
        <button type="submit">Login</button>
    </form>
</body>
</html>
