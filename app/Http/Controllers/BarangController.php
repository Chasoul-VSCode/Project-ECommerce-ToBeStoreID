<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;

class BarangController extends Controller
{
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'nama_b' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'stok_b' => 'required|integer|min:0',
        'harga_b' => 'required|string', // Menerima format string untuk Rupiah
        'gambar_product' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // Membersihkan karakter non-numeric dan mengonversi ke integer
    $harga_b = (int) preg_replace("/[^0-9]/", "", $validatedData['harga_b']);

    // Handle file upload
    if ($request->hasFile('gambar_product')) {
        $file = $request->file('gambar_product');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = 'images/' . $fileName;

        // Pindahkan file ke public/images
        $file->move(public_path('images'), $fileName);
    }

    $response = Http::asMultipart()->post('http://localhost:1323/barang', [
        'nama_b' => $validatedData['nama_b'],
        'deskripsi' => $validatedData['deskripsi'],
        'stok_b' => $validatedData['stok_b'],
        'harga_b' => $harga_b, // Disimpan sebagai integer
        'gambar_product' => fopen(public_path($filePath), 'r'),
    ]);

    if ($response->successful()) {
        return redirect()->route('admin.addproduct')->with('success', 'Produk berhasil ditambahkan');
    }

    return back()->withErrors(['message' => 'Gagal menambahkan produk']);
}
    

    public function index()
    {
        $response = Http::get('http://localhost:1323/barang');
    
        if ($response->successful()) {
            $barangs = $response->json(); // Ambil data dari API dalam bentuk JSON
            return view('admin.addproduct', compact('barangs'));
        } else {
            // Handle error jika gagal mengambil data dari API
            return back()->withErrors(['message' => 'Failed to fetch product data']);
        }
    }    
   
    public function destroy($kd_barang)
    {
        // Send delete request to the Go API
        $response = Http::delete("http://localhost:1323/barang/{$kd_barang}");

        // Check for success response from the API
        if ($response->successful()) {
            return redirect()->route('admin.addproduct')->with('success', 'Product deleted successfully');
        } else {
            return redirect()->route('admin.addproduct')->with('error', 'Failed to delete product');
        }
    }

    public function edit($kd_barang)
    {
        try {
            // Ambil data barang dari API berdasarkan kd_barang
            $response = Http::get('http://localhost:1323/barang/'.$kd_barang);
    
            // Periksa jika request ke API berhasil
            if ($response->successful()) {
                $barang = $response->json(); // Mengambil data barang dari response JSON
    
                // Load view admin.editproduct.blade.php dengan data barang
                return view('admin.editproduct', compact('barang'));
            } else {
                abort($response->status(), 'Gagal mendapatkan data barang.'); // Handle jika request ke API gagal
            }
        } catch (\Throwable $th) {
            abort(500, 'Gagal mendapatkan data barang.'); // Handle jika terjadi error
        }
    }
    
    // Method untuk menyimpan perubahan pada barang
    public function update(Request $request, $kd_barang)
    {
        try {
            // Validate request data
            $request->validate([
                'edit_nama_b' => 'required|string',
                'edit_deskripsi' => 'required|string',
                'edit_stok_b' => 'required|integer',
                'edit_harga_b' => 'required|numeric',
            ]);
    
            // Convert IDR format to numeric
            $edit_harga_b_numeric = str_replace('.', '', $request->edit_harga_b); // Menghapus titik (.) dari IDR
    
            // Prepare the data to be sent to the Go backend API
            $updateData = [
                'nama_b' => $request->edit_nama_b,
                'deskripsi' => $request->edit_deskripsi,
                'stok_b' => $request->edit_stok_b,
                'harga_b' => (float) $edit_harga_b_numeric, // Mengonversi ke float jika diperlukan
            ];
    
            // Log the data for debugging
            Log::info('Sending Update Request to API:', [
                'url' => 'http://localhost:1323/barang/' . $kd_barang,
                'data' => $updateData
            ]);
    
            // Send update data to Go backend API
            $response = Http::put('http://localhost:1323/barang/' . $kd_barang, $updateData);
    
            // Log the API response
            Log::info('API Response:', [
                'status' => $response->status(),
                'body' => $response->body()
            ]);
    
            // Check API response
            if ($response->successful()) {
                // Redirect with success message
                return redirect()->route('admin.addproduct')->with('success', 'Product successfully updated.');
            } else {
                // Handle API error response
                $error_message = $response->json()['message'] ?? 'Failed to update product data.';
                return redirect()->back()->withErrors([$error_message]);
            }
        } catch (\Throwable $th) {
            // Handle other exceptions
            Log::error('Update Error:', ['exception' => $th->getMessage()]);
            return redirect()->back()->withErrors(['Failed to update product data.']);
        }
    }         
}