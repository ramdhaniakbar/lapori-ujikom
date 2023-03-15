<?php

namespace App\Http\Controllers\Frontsite;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LandingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $jumlah_pengaduan = Pengaduan::count();
        $pengaduan_success = Pengaduan::with('user')->where('status', 'selesai')->latest()->take(5)->get();
        $pengaduan_terbaru = Pengaduan::with('user')->latest()->take(5)->get();

        return view('pages.frontsite.landing-page.index', compact('jumlah_pengaduan', 'pengaduan_success', 'pengaduan_terbaru'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return abort(404);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return abort(404);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return abort(404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return abort(404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return abort(404);
    }
}
