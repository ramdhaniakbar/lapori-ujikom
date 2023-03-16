<?php

namespace App\Http\Controllers\Backsite;

use App\Http\Controllers\Controller;
use App\Http\Requests\KategoriPengaduan\StoreKategoriPengaduanRequest;
use App\Http\Requests\KategoriPengaduan\UpdateKategoriPengaduanRequest;
use App\Models\KategoriPengaduan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class KategoriPengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $kategori_pengaduans = KategoriPengaduan::orderBy('nama', 'asc')->get();
        return view('pages.backsite.master-data.kategori-pengaduan.index', compact('kategori_pengaduans'));
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
    public function store(StoreKategoriPengaduanRequest $request): RedirectResponse
    {
        $data = $request->all();

        $kategori_pengaduan = KategoriPengaduan::create($data);

        toastr()->success('Kategori Pengaduan Berhasil Dibuat!');

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(KategoriPengaduan $kategori_pengaduan): View
    {
        return view('pages.backsite.master-data.kategori-pengaduan.show', compact('kategori_pengaduan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KategoriPengaduan $kategori_pengaduan): View
    {
        return view('pages.backsite.master-data.kategori-pengaduan.edit', compact('kategori_pengaduan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKategoriPengaduanRequest $request, KategoriPengaduan $kategori_pengaduan): RedirectResponse
    {
        $data = $request->all();

        $kategori_pengaduan->update($data);

        toastr()->success('Kategori Pengaduan Berhasil Diedit!');

        return redirect()->route('backsite.kategori_pengaduan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KategoriPengaduan $kategori_pengaduan): RedirectResponse
    {
        $kategori_pengaduan->forceDelete();

        toastr()->success('Kategori Pengaduan Berhasil Dihapus!');

        return back();
    }
}
