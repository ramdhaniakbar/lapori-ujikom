<?php

namespace App\Http\Controllers\Backsite;

use Carbon\Carbon;
use App\Models\Pengaduan;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengaduans = Pengaduan::latest()->get();
        $pengaduans_pending = Pengaduan::where('status', 'pending')->get();
        return view('pages.backsite.operational.pengaduan.index', compact('pengaduans', 'pengaduans_pending'));
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

    public function status_selesai(Pengaduan $pengaduan)
    {
        $status_selesai = $pengaduan->update(['status' => 'selesai']);

        toastr()->success('Status Pengaduan Selesai!');

        return back();
    }

    public function tolak_status(Pengaduan $pengaduan)
    {
        $tolak_status = $pengaduan->update(['status' => 'ditolak']);

        toastr()->success('Pengaduan Berhasil Ditolak!');

        return back();
    }

    public function status_kembali(Pengaduan $pengaduan)
    {
        $status_kembali = $pengaduan->update(['status' => 'pending']);

        toastr()->success('Status Pengaduan Berhasil Kembali!');

        return back();
    }

    public function generate_laporan(Request $request)
    {
        if ($request['tanggal_1'] || $request['tanggal_2']) {

            // get data filter
            $pengaduans = Pengaduan::whereBetween('created_at', [$request['tanggal_1'], $request['tanggal_2']])->with('tanggapan', 'user')->latest()->get();

            // get date filter
            $tanggal_filter = date('d-m-Y', strtotime($request['tanggal_1'])). ' - '. date('d-m-Y', strtotime($request['tanggal_2']));

            $data = [
                'nama_petugas' => Auth::guard(session('guard'))->user()->nama,
                'pengaduans' => $pengaduans,
                'tanggal_filter' => $tanggal_filter,
            ];

            $pdf = Pdf::loadView('pages.backsite.operational.pengaduan.generate.index', $data)->setPaper('a3', 'landscape');
            return $pdf->download(Str::random(20) . '.pdf');

        } else {
            $pengaduans = Pengaduan::with('tanggapan', 'user')->latest()->get();

            $data = [
                'nama_petugas' => Auth::guard(session('guard'))->user()->nama,
                'pengaduans' => $pengaduans,
                'tanggal_filter' => ''
            ];

            $pdf = Pdf::loadView('pages.backsite.operational.pengaduan.generate.index', $data)->setPaper('a3', 'landscape');
            return $pdf->download(Str::random(20) . '.pdf');
        }
    }
}
