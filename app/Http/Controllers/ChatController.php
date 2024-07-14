<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{
    public function index()
    {
        try {
            // Fetch data from the Go backend API
            $response = Http::get('http://localhost:1323/getchat');
            if ($response->failed()) {
                return back()->with('error', 'Gagal mengambil data chat dari API');
            }

            $chats = $response->json();

            return view('admin.chat', compact('chats'));
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat mengambil data chat');
        }
    }

    public function store(Request $request)
    {
        // Validasi request
        $validatedData = $request->validate([
            'kd_user' => 'required',
            'text_chat' => 'required',
        ]);

        // Kirim permintaan POST ke API Go
        $response = Http::post('http://localhost:1323/getchat', [
            'kd_user' => $validatedData['kd_user'],
            'text_chat' => $validatedData['text_chat'],
        ]);

        // Ambil kd_seller dari respons API Go
        $kd_seller = $response->json()['kd_seller']; // Sesuaikan dengan struktur response dari API

        $kd_chat = 0; 
    }
}
