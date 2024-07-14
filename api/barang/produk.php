<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
    <script>
        async function handleProductSubmit(event) {
            event.preventDefault();
            const form = event.target;
            const formData = new FormData(form);

            try {
                const response = await fetch('http://localhost:1323/barang', {
                    method: 'POST',
                    body: formData,
                });

                const result = await response.json();
                if (response.ok) {
                    alert('Produk berhasil ditambahkan');
                    form.reset();
                } else {
                    document.getElementById('error').textContent = result.error || 'Gagal menambahkan produk';
                }
            } catch (error) {
                document.getElementById('error').textContent = 'Terjadi kesalahan';
            }
        }
    </script>
</head>
<body>
    <h1>Tambah Produk</h1>
    <p id="error" style="color: red;"></p>
    <form onsubmit="handleProductSubmit(event)" enctype="multipart/form-data">
        <label for="nama_b">Nama Barang:</label><br>
        <input type="text" id="nama_b" name="nama_b" required><br><br>

        <label for="deskripsi">Deskripsi:</label><br>
        <textarea id="deskripsi" name="deskripsi" required></textarea><br><br>

        <label for="stok_b">Stok:</label><br>
        <input type="number" id="stok_b" name="stok_b" required><br><br>

        <label for="harga_b">Harga:</label><br>
        <input type="text" id="harga_b" name="harga_b" required><br><br>

        <label for="gambar_product">Gambar Produk:</label><br>
        <input type="file" id="gambar_product" name="gambar_product" required><br><br>

        <!-- Field untuk kd_seller (jika ingin tetap menggunakan PHP) -->
        <!-- <input type="hidden" name="kd_seller" value="<?php echo $kd_seller; ?>"> -->

        <button type="submit">Tambah Produk</button>
    </form>
</body>
</html>
