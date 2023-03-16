<?php

namespace App\Http\Controllers\Backsite;

use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Tanggapan\StoreTanggapanRequest;
use App\Http\Requests\Tanggapan\UpdateTanggapanRequest;

class TanggapanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tanggapans = Tanggapan::with('pengaduan', 'petugas')->latest()->get();
        // return $tanggapans;
        return view('pages.backsite.operational.tanggapan.index', compact('tanggapans'));
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
    public function store(StoreTanggapanRequest $request)
    {
        $data = $request->all();

        $petugas_id = Auth::guard(session('guard'))->user()->id;
        $pengaduan_id = $request->pengaduan_id;

        $data['petugas_id'] = $petugas_id;
        $data['pengaduan_id'] = $pengaduan_id;

        $tanggapan = Tanggapan::create($data);

        $update_status = Pengaduan::find($pengaduan_id)->update(['status' => 'proses']);

        toastr()->success('Tanggapan Berhasil Dibuat!');

        return redirect()->route('backsite.tanggapan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tanggapan $tanggapan)
    {
        return view('pages.backsite.operational.tanggapan.show', compact('tanggapan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tanggapan $tanggapan)
    {
        return view('pages.backsite.operational.tanggapan.edit', compact('tanggapan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTanggapanRequest $request, Tanggapan $tanggapan)
    {
        $data = $request->all();

        $tanggapan->update($data);

        toastr()->success('Tanggapan Berhasil Diedit!');

        return redirect()->route('backsite.tanggapan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return abort(404);
    }

    public function createTanggapanById(Pengaduan $pengaduan): View
    {
        return view('pages.backsite.operational.tanggapan.create', compact('pengaduan'));
    }

    public function storeTanggapanById(StoreTanggapanRequest $request, Pengaduan $pengaduan)
    {
        $data = $request->all();

        $petugas_id = Auth::guard(session('guard'))->user()->id;
        $pengaduan_id = $pengaduan->id;

        $data['petugas_id'] = $petugas_id;
        $data['pengaduan_id'] = $pengaduan_id;

        $tanggapan = Tanggapan::create($data);

        $pengaduan->update(['status' => 'proses']);

        toastr()->success('Tanggapan Berhasil Dibuat!');

        return redirect()->route('backsite.tanggapan.index');
    }
}
