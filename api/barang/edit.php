<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Barang</title>
</head>
<body>
    <h2>Edit Barang</h2>

    <?php
    if (!isset($_GET['kd_barang'])) {
        echo "Parameter kd_barang tidak tersedia.";
        exit; // Hentikan eksekusi script jika parameter tidak tersedia
    }

    $kd_barang = $_GET['kd_barang'];
    $url = "http://localhost/api_tobe_store/barang/get_barang.php?kd_barang=" . urlencode($kd_barang);

    $data = @file_get_contents($url);
    if ($data !== false) {
        $barang = json_decode($data, true);

        if ($barang) {
            ?>
            <form action="http://localhost/api_tobe_store/barang/update_barang.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="kd_barang" value="<?php echo htmlspecialchars($barang['kd_barang']); ?>">
                <label for="nama_b">Nama Barang:</label><br>
                <input type="text" id="nama_b" name="nama_b" value="<?php echo htmlspecialchars($barang['nama_b']); ?>"><br><br>
                
                <label for="deskripsi">Nama Barang:</label><br>
                <input type="text" id="deskripsi" name="deskripsi" value="<?php echo htmlspecialchars($barang['deskripsi']); ?>"><br><br>
                
                <label for="stok_b">Stok Barang:</label><br>
                <input type="number" id="stok_b" name="stok_b" value="<?php echo htmlspecialchars($barang['stok_b']); ?>"><br><br>
                
                <label for="harga_b">Harga Barang:</label><br>
                <input type="text" id="harga_b" name="harga_b" value="<?php echo htmlspecialchars($barang['harga_b']); ?>"><br><br>
                
                <label for="gambar_product">Gambar Barang:</label><br>
                <input type="file" id="gambar_product" name="gambar_product"><br><br>
                
                <?php if (!empty($barang['gambar_product'])): ?>
                    <img src="http://localhost/api_tobe_store/images/<?php echo htmlspecialchars($barang['gambar_product']); ?>" width="100" height="100"><br><br>
                <?php endif; ?>
                
                <input type="submit" value="Simpan Perubahan">
            </form>
            <?php
        } else {
            echo "Data barang tidak ditemukan.";
        }
    } else {
        echo "Terjadi kesalahan dalam mengambil data barang.";
    }
    ?>
</body>
</html>
