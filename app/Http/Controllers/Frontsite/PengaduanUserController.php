<?php

namespace App\Http\Controllers\Frontsite;

use Illuminate\Http\Request;
use App\Models\KategoriPengaduan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Pengaduan\StorePengaduanRequest;
use App\Models\Pengaduan;

class PengaduanUserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['checkUser']);
    }

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
        $kategori_pengaduans = KategoriPengaduan::orderBy('nama', 'asc')->get();
        return view('pages.frontsite.laporan.create', compact('kategori_pengaduans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePengaduanRequest $request)
    {
        $data = $request->all();

        $path = public_path('app/public/assets/file-pengaduan');

        // upload process here
        if (!File::isDirectory($path)) {
            $response = Storage::makeDirectory('public/assets/file-pengaduan');
        }

        // change file locations
        if (isset($data['bukti_foto'])) {
            $data['bukti_foto'] = $request->file('bukti_foto')->store(
                'assets/file-pengaduan',
                'public'
            );
        } else {
            $data['bukti_foto'] = '';
        }

        $pengaduan = Pengaduan::create($data);

        toastr()->success('Berhasil membuat laporan');

        return redirect()->route('index');
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
