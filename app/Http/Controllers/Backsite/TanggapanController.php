<?php

namespace App\Http\Controllers\Backsite;

use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Tanggapan\StoreTanggapanRequest;

class TanggapanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return abort(404);
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

        toastr()->success('Tanggapan Berhasil Dibuat!');

        return redirect()->route('backsite.tanggapan.index');
    }
}
