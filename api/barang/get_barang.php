<?php
// URL API untuk mendapatkan data barang
$api_url = "http://localhost:1323/get_barang";

// Mengambil data dari API
$response = file_get_contents($api_url);

// Memeriksa apakah permintaan berhasil
if ($response !== false) {
    $data = json_decode($response, true);

    // Memeriksa apakah data berhasil diambil
    if (!empty($data)) {
        echo "<table border='1'>
                <tr>
                    <th>ID</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Stok</th>
                    <th>Harga</th>
                    <th>Gambar</th>
                </tr>";

        foreach ($data as $row) {
            echo "<tr>
                    <td>" . htmlspecialchars($row['id']) . "</td>
                    <td>" . htmlspecialchars($row['kd_barang']) . "</td>
                    <td>" . htmlspecialchars($row['nama_b']) . "</td>
                    <td>" . htmlspecialchars($row['stok_b']) . "</td>
                    <td>" . htmlspecialchars($row['harga_b']) . "</td>
                    <td><img src='http://localhost/api_tobe_store/images/" . htmlspecialchars($row['gambar_product']) . "' alt='" . htmlspecialchars($row['nama_b']) . "' width='100' height='100'></td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "Tidak ada data barang.";
    }
} else {
    echo "Gagal mengambil data dari API.";
}
