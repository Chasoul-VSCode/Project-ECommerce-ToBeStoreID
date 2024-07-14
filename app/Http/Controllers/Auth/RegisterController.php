<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
    private function generateKodeSeller()
    {
        return 'USR_' . uniqid(); // Menghasilkan kode user unik
    }

    public function showRegistrationForm()
    {
        return view('auth.register'); // Ganti 'auth.register' dengan nama view Anda
    }

    public function register(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'nama_seller' => 'required|string',
            'email' => 'required|email|unique:users',
            'username' => 'required|string|unique:users',
            'pass' => 'required|string',
            'no_wa' => 'required|numeric',
            'alamat' => 'required|string',
        ]);

        // Handle data
        $user = new User();
        $user->kd_seller = $this->generateKodeSeller(); // Memanggil fungsi generateKodeUser()
        $user->nama_seller = $validatedData['nama_seller'];
        $user->email = $validatedData['email'];
        $user->username = $validatedData['username'];
        $user->pass = bcrypt($validatedData['pass']); // Menggunakan bcrypt untuk menyimpan password yang terenkripsi
        $user->status = 'seller'; // Set status langsung menjadi "seller"
        $user->no_wa = $validatedData['no_wa'];
        $user->alamat = $validatedData['alamat'];

        // Kirim data ke backend Go API
        try {
            $response = Http::post('http://localhost:1323/sellers', [
                'nama_seller' => $user->nama_seller,
                'email' => $user->email,
                'username' => $user->username,
                'pass' => $validatedData['pass'],
                'no_wa' => $user->no_wa,
                'alamat' => $user->alamat,
            ]);

            if ($response->successful()) {
                // Jika registrasi sukses, lanjutkan menyimpan ke database lokal
                $user->save();

                return redirect()->route('login')->with('success', 'Registration successful. Please login with your credentials.');
            } else {
                // Jika API tidak mengembalikan response sukses, tangani error
                Log::error('Error from API: ' . $response->body());
                return redirect()->back()->withErrors(['error' => 'Registration failed. Please try again later.']);
            }
        } catch (\Exception $e) {
            Log::error('Error sending data to API: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Internal Server Error']);
        }
    }
}
