<?php

namespace App\Http\Controllers\Backsite;

use App\Models\Petugas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Petugas\StorePetugasRequest;

class PetugasController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $petugas = Petugas::orderBy('nama', 'asc')->get();
        return view('pages.backsite.management-access.user.index', compact('petugas'));
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
    public function store(StorePetugasRequest $request)
    {
        $data = $request->all();

        $data['password'] = Hash::make($data['password']);

        $petugas = Petugas::create($data);

        toastr()->success('Petugas Berhasil Dibuat!');

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
    public function edit(Petugas $user)
    {
        return view('pages.backsite.management-access.user.edit', compact('user'));
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
