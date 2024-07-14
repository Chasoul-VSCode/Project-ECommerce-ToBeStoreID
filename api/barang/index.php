
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah Barang</title>
</head>
<body>
    <h2>Form Tambah Barang</h2>
    <form action="http://localhost:1323/barang" method="post" enctype="multipart/form-data">
        <label for="nama_b">Nama Barang:</label><br>
        <input type="text" id="nama_b" name="nama_b" required><br><br>

        <label for="deskripsi">Nama Barang:</label><br>
        <input type="text" id="deskripsi" name="deskripsi" required><br><br>

        <label for="stok_b">Stok Barang:</label><br>
        <input type="number" id="stok_b" name="stok_b" required><br><br>

        <label for="harga_b">Harga Barang:</label><br>
        <input type="text" id="harga_b" name="harga_b" required><br><br>

        <label for="gambar_product">Gambar Barang:</label><br>
        <input type="file" id="gambar_product" name="gambar_product" required><br><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
