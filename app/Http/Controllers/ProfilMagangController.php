<?php

namespace App\Http\Controllers;

use App\Models\ProfilMagang;
use Illuminate\Http\Request;

class ProfilMagangController extends Controller
{
    public function index()
    {
        $profil = ProfilMagang::first();

        return view(
            'profil.index',
            compact('profil')
        );
    }

    public function edit()
    {
        $profil = ProfilMagang::first();

        return view(
            'profil.edit',
            compact('profil')
        );
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama_mahasiswa' => 'required',
            'nim' => 'required',
            'program_studi' => 'required',
            'universitas' => 'required',
            'perusahaan' => 'required',
            'pembimbing' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required'
        ]);

        $profil = ProfilMagang::first();

        $profil->update($request->all());

        return redirect('/profil')
            ->with(
                'success',
                'Profil berhasil diperbarui'
            );
    }
}