<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TransaksiController extends Controller
{
    public function index()
    {
        try {
            // Mengambil data transaksi dari backend Go
            $response = Http::get('http://localhost:1323/transaksii_sha');
            
            // Memeriksa jika permintaan berhasil
            if ($response->successful()) {
                $transaksis = $response->json(); // Mengonversi respons JSON ke array PHP
                
                // Return view dengan data transaksi
                return view('admin.dashboard', compact('transaksis'));
            } else {
                // Menangani error jika permintaan API gagal
                Log::error('Gagal mengambil data transaksi. Permintaan API gagal: ' . $response->status());
                return view('admin.dashboard', ['transaksis' => []]); // Mengembalikan array kosong atau menangani error sesuai kebutuhan
            }
        } catch (\Exception $e) {
            // Melakukan logging exception untuk debugging
            Log::error('Gagal mengambil data transaksi: ' . $e->getMessage());
            
            // Menangani exception (misalnya, masalah koneksi, timeout)
            return view('admin.dashboard', ['transaksis' => []]); // Mengembalikan array kosong atau menangani error sesuai kebutuhan
        }
    }
    
    public function getTotalStock()
    {
        try {
            $response = Http::get('http://localhost:1323/total-stok');
            
            if ($response->successful()) {
                return response()->json(['total' => $response->json()['total']]);
            } else {
                return response()->json(['total' => 'NA'], 500);
            }
        } catch (\Exception $e) {
            Log::error('Failed to fetch total stock data: ' . $e->getMessage());
            return response()->json(['total' => 'NA'], 500);
        }
    }

    public function getTotalTransaksi()
    {
        try {
            $response = Http::get('http://localhost:1323/Total_Transaksi');
            
            if ($response->successful()) {
                return response()->json(['total' => $response->json()['total']]);
            } else {
                return response()->json(['total' => 'NA'], 500);
            }
        } catch (\Exception $e) {
            Log::error('Failed to fetch total transactions: ' . $e->getMessage());
            return response()->json(['total' => 'NA'], 500);
        }
    }

    public function getTotalIncome()
    {
        try {
            $response = Http::get('http://localhost:1323/penghasilan');

            if ($response->successful()) {
                return response()->json(['total_harga' => $response->json()['total_harga']]);
            } else {
                return response()->json(['total_harga' => 'NA'], 500);
            }
        } catch (\Exception $e) {
            Log::error('Failed to fetch total income data: ' . $e->getMessage());
            return response()->json(['total_harga' => 'NA'], 500);
        }
    }
    

}
