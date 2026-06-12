<?php

namespace App\Http\Controllers;

use App\Models\KegiatanMagang;
use Illuminate\Http\Request;

class KegiatanMagangController extends Controller
{
    public function index(Request $request)
    {
        $query = KegiatanMagang::query();

        if ($request->judul) {

            $query->where(
                'judul_kegiatan',
                'like',
                '%' . $request->judul . '%'
            );
        }

        if ($request->tanggal) {

            $query->where(
                'tanggal',
                $request->tanggal
            );
        }

        $kegiatan = $query
            ->latest()
            ->paginate(10);

        return view(
            'kegiatan.index',
            compact('kegiatan')
        );
    }

    public function create()
    {
        return view('kegiatan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'judul_kegiatan' => 'required',
            'deskripsi_kegiatan' => 'required',
            'status' => 'required'
        ]);

        KegiatanMagang::create(
            $request->all()
        );

        return redirect('/kegiatan')
            ->with(
                'success',
                'Data berhasil ditambahkan'
            );
    }

    public function show($id)
    {
        $kegiatan =
            KegiatanMagang::findOrFail($id);

        return view(
            'kegiatan.show',
            compact('kegiatan')
        );
    }

    public function edit($id)
    {
        $kegiatan =
            KegiatanMagang::findOrFail($id);

        return view(
            'kegiatan.edit',
            compact('kegiatan')
        );
    }

    public function update(
        Request $request,
        $id
    ) {

        $kegiatan =
            KegiatanMagang::findOrFail($id);

        $kegiatan->update(
            $request->all()
        );

        return redirect('/kegiatan')
            ->with(
                'success',
                'Data berhasil diperbarui'
            );
    }

    public function destroy($id)
    {
        $kegiatan =
            KegiatanMagang::findOrFail($id);

        $kegiatan->delete();

        return redirect('/kegiatan')
            ->with(
                'success',
                'Data berhasil dihapus'
            );
    }
}