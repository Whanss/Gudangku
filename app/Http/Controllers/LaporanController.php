<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $barangs = Barang::with('kategori')->get();
        $totalStok = $barangs->sum('stok');
        return view('function.laporans.index', compact('barangs', 'totalStok'));
    }
}
