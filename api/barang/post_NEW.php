<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah Barang</title>
</head>
<body>
    <h2>Form Tambah Barang</h2>
    <form id="formTambahBarang" enctype="multipart/form-data">
        <label for="nama_b">Nama Barang:</label><br>
        <input type="text" id="nama_b" name="nama_b" required><br><br>
        
        <label for="deskripsi">Deskripsi:</label><br>
        <textarea id="deskripsi" name="deskripsi" required></textarea><br><br>
        
        <label for="stok_b">Stok:</label><br>
        <input type="number" id="stok_b" name="stok_b" required><br><br>
        
        <label for="harga_b">Harga:</label><br>
        <input type="number" id="harga_b" name="harga_b" step="0.01" required><br><br>
        
        <label for="gambar_product">Gambar Produk:</label><br>
        <input type="file" id="gambar_product" name="gambar_product" accept="image/*"><br><br>
        
        <button type="submit">Submit</button>
    </form>

    <script>
        const form = document.getElementById('formTambahBarang');

        form.addEventListener('submit', async function(event) {
            event.preventDefault();

            const formData = new FormData(form);
            const url = 'http://localhost:1323/barang'; // Ganti dengan URL endpoint API Anda

            try {
                const response = await fetch(url, {
                    method: 'POST',
                    body: formData
                });

                if (!response.ok) {
                    const errorMessage = await response.json();
                    throw new Error(errorMessage.error || 'Gagal menambahkan barang');
                }

                const result = await response.json();
                alert('Barang berhasil ditambahkan dengan ID: ' + result.ID);
                form.reset(); // Bersihkan form setelah submit berhasil
            } catch (error) {
                console.error('Error:', error);
                alert('Gagal menambahkan barang: ' + error.message);
            }
        });
    </script>
</body>
</html>
