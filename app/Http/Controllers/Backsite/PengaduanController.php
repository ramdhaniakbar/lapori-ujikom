<?php

namespace App\Http\Controllers\Backsite;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengaduans = Pengaduan::latest()->get();
        return view('pages.backsite.operational.pengaduan.index', compact('pengaduans'));
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
    public function show(Pengaduan $pengaduan)
    {
        return view('pages.backsite.operational.pengaduan.show', compact('pengaduan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengaduan $pengaduan)
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

    public function tolak_status(Pengaduan $pengaduan)
    {
        $tolak_status = Pengaduan::where('id', $pengaduan->id)->update(['status' => 'ditolak']);

        toastr()->success('Pengaduan Berhasil Ditolak!');

        return back();
    }

    public function status_kembali(Pengaduan $pengaduan)
    {
        $status_kembali = Pengaduan::where('id', $pengaduan->id)->update(['status' => 'pending']);

        toastr()->success('Status Pengaduan Berhasil Kembali!');

        return back();
    }
}
