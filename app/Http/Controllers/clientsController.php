<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
 
    public function tampil()
    {
        try {
            $clients = Clients::all();
            return response()->json([
                'status' => true,
                'message' => 'Data telah ditampilkan',
                'data' => $clients
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Terjadi kesalahan',
                'errors' => $e->getMessage()
            ], 500);
        }
    }

    public function new(Request $request)
    {
        try {
            $clientData = $request->validate([
                'company' => 'required|string|max:255',
                'contact_person' => 'nullable|string|max:50',
            ]);

            $client = Clients::create($clientData);

            return response()->json([
                'status' => true,
                'message' => 'Data client berhasil ditambahkan',
                'data' => $client
            ], 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi gagal',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Terjadi kesalahan',
                'errors' => $e->getMessage()
            ], 500);
        }
    }
}
