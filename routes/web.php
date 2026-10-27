<?php

use Illuminate\Support\Facades\Route;
use illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/data-karya', function () {
    return response()->json([
        'judul' => 'Water Lilies',
        'pelukis' => 'Claude Monet',
        'tahun' => 1899
    ]);
});

Route::get('/karya', function () {
    return view('karya');
});

Route::post('/simpan-karya', function (Request $request) {
    $data = $request->json()->all();

    return response()->json([
        'pesan' => 'Data berhasil diterima!',
        'judul' => $data['judul'] ?? 'Judul belum diterima',
        'pelukis' => $data['pelukis'] ?? 'Pelukis belum diterima'
    ]);
});

Route::get('/form-karya', function () {
    return view('form-karya');
});