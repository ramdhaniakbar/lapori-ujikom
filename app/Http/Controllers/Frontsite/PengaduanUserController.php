<?php

namespace App\Http\Controllers\Frontsite;

use Carbon\Carbon;
use App\Models\Pengaduan;
use Illuminate\View\View;
use App\Models\KategoriPengaduan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Pengaduan\StorePengaduanRequest;
use App\Http\Requests\Pengaduan\UpdatePengaduanRequest;

class PengaduanUserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['checkUser']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $pengaduan_terbaru = Pengaduan::latest()->paginate(5);
        return view('pages.frontsite.laporan.index', compact('pengaduan_terbaru'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $kategori_pengaduans = KategoriPengaduan::orderBy('nama', 'asc')->get();
        return view('pages.frontsite.laporan.create', compact('kategori_pengaduans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePengaduanRequest $request): RedirectResponse
    {
        // get all data from request
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

        $user_id = Auth::guard(session('guard'))->user()->id;

        $data['user_id'] = $user_id;

        $pengaduan = Pengaduan::create($data);

        toastr()->success('Berhasil membuat laporan');

        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengaduan $lapor)
    {
        $tanggal_kejadian = Carbon::parse($lapor->tanggal_kejadian)->format('F j, Y');
        return view('pages.frontsite.laporan.show', compact('lapor', 'tanggal_kejadian'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengaduan $lapor)
    {
        $auth_pengaduan = Auth::guard(session('guard'))->user()->pengaduan()->pluck('id');

        if (!$auth_pengaduan->contains($lapor->id)) {
            return back()->with('error', 'Kamu tidak memiliki akses!');
        }

        if ($lapor->status == 'selesai') {
            return back()->with('error', 'Status pengaduan sudah selesai.');
        }

        $kategori_pengaduans = KategoriPengaduan::orderBy('nama', 'asc')->get();
        return view('pages.frontsite.laporan.edit', compact('lapor', 'kategori_pengaduans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePengaduanRequest $request, Pengaduan $lapor): RedirectResponse
    {
        // get all data from request
        $data = $request->all();

        // upload process here
        // change format foto
        if (isset($data['bukti_foto'])) {

            // firts checking old bukti_foto to delete from storage
            $get_item = $lapor['bukti_foto'];

            // change file locations
            $data['bukti_foto'] = $request->file('bukti_foto')->store(
                'assets/file-pengaduan',
                'public'
            );

            // delete old bukti_foto from storage
            $data_old = 'storage/' . $get_item;

            if (File::exists($data_old)) {
                File::delete($data_old);
            } else {
                File::delete('storage/app/public/' . $get_item);
            }

            $lapor->update($data);

            toastr()->success('Berhasil Update Pengaduan!');

            return redirect()->route('laporan_kamu');
        } else {

            $lapor->update($data);

            toastr()->success('Berhasil Update Pengaduan!');

            return redirect()->route('laporan_kamu');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengaduan $lapor): RedirectResponse
    {
        // first checking old file to delete from storage
        $get_item = $lapor['bukti_foto'];

        $data = 'storage/' . $get_item;

        if (File::exists($data)) {
            File::delete($data);
        } else {
            File::delete('storage/app/public/' . $get_item);
        }

        $lapor->forceDelete();

        toastr()->success('Pengaduan Berhasil Dihapus!');

        return back();
    }

    public function laporan_kamu(): View
    {
        // get all laporan latest
        $laporans = Auth::guard(session('guard'))->user()->pengaduan()->latest()->paginate(5);

        // laporan status pending
        $laporan_pending = Auth::guard(session('guard'))->user()->pengaduan()->where('status', 'pending')->get();

        // laporan status ditolak
        $laporan_ditolak = Auth::guard(session('guard'))->user()->pengaduan()->where('status', 'ditolak')->get();

        // laporan status proses
        $laporan_proses = Auth::guard(session('guard'))->user()->pengaduan()->where('status', 'proses')->get();

        // laporan status selesai
        $laporan_selesai = Auth::guard(session('guard'))->user()->pengaduan()->where('status', 'selesai')->get();

        $status_laporan = [
            'pending' => $laporan_pending,
            'ditolak' => $laporan_ditolak,
            'proses' => $laporan_proses,
            'selesai' => $laporan_selesai,
        ];

        return view('pages.frontsite.laporan-kamu.index', compact('laporans', 'status_laporan'));
    }
}
