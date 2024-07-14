<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\Rule;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'pass' => 'required'
        ]);

        // Call the Go API
        $response = Http::asForm()->post('http://localhost:1323/login_seller', [
            'username' => $request->input('username'),
            'password' => $request->input('pass'),
        ]);

        if ($response->successful() && $response->json('message') == 'Login successful') {
            // Store seller data in session
            session([
                'seller_username' => $request->input('username'),
                'seller_token' => $response->json('token'), // Assuming your API returns a token
                // Add other seller-related data as needed
            ]);

            return response()->json(['message' => 'Login successful']);
        } else {
            // If login fails, return an error response
            return response()->json(['message' => 'Invalid username or password'], 422);
        }
    }
public function logout(Request $request)
{
    // Clear all session data
    $request->session()->flush();

    // Optionally, you can regenerate the session ID
    $request->session()->regenerate();

    return redirect('/login');
}

// profile

public function update(Request $request, $kd_seller)
{
    // Validasi data yang dikirimkan dari form
    $validatedData = $request->validate([
        'nama_seller' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'username' => [
            'required',
            'string',
            'max:255',
            Rule::unique('sellers')->ignore($kd_seller),
        ],
        'password' => 'required|string|min:6',
        'no_wa' => 'required|numeric',
        'alamat' => 'required|string|max:255',
        'nik' => 'required|string|max:255',
        'tgl_lahir' => 'required|date',
        'deskripsi' => 'nullable|string', // Deskripsi tidak wajib diisi
        'gambar_product' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Gambar tidak wajib diisi
    ]);

    try {
        // Data yang akan dikirimkan ke API
        $data = [
            'nama_seller' => $validatedData['nama_seller'],
            'email' => $validatedData['email'],
            'username' => $validatedData['username'],
            'password' => bcrypt($validatedData['password']), // Jika password dienkripsi, sesuaikan dengan kebutuhan Anda
            'no_wa' => $validatedData['no_wa'],
            'alamat' => $validatedData['alamat'],
            'nik' => $validatedData['nik'],
            'tgl_lahir' => $validatedData['tgl_lahir'],
            'deskripsi' => $validatedData['deskripsi'],
        ];

        // Upload gambar jika ada
        if ($request->hasFile('gambar_product')) {
            $imagePath = $request->file('gambar_product')->store('public/gambar_produk');
            $data['gambar_product'] = $imagePath;
        }

        // Buat permintaan ke API untuk update data penjual
        $response = Http::put("http://localhost:1323/update/{$kd_seller}", $data);


        if ($response->successful()) {
            return redirect()->route('profile.edit', $kd_seller)->with('success', 'Profil berhasil diperbarui');
        } else {
            return redirect()->back()->with('error', 'Gagal memperbarui profil: ' . $response->body());
        }
    } catch (\Exception $e) {
        // Tangani jika terjadi kesalahan
        return redirect()->back()->with('error', 'Gagal memperbarui profil: ' . $e->getMessage());
    }
}

}
