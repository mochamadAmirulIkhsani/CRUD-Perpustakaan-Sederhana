<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Penerbit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allBuku = Buku::all();
        return view('buku.index', compact('allBuku'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $penerbit = Penerbit::all();
        $kategori = Kategori::all();
        return view('buku.create', compact('penerbit', 'kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validasi
        $validatedData = request()->validate([
            'judul' => 'required|max:100',
            'pengarang' => 'required|max:100',
            'tahun_terbit' => 'required|integer:4',
            'kategori_id' => 'required',
            'penerbit_id' => 'required',
            'file_cover' => 'nullable|image|mimes:jpeg,png,jpg|max:1024',
        ]);

        //upload file cover
        if (request()->hasFile('file_cover')) {
            $validatedData['cover'] = request()->file('file_cover')->store('cover', 'public');
        }

        // hapus file_cover dari array validasi
        unset($validatedData['file_cover']);

        // simpan data
        Buku::create($validatedData);

        // redirect ke index buku
        return redirect()->route('buku.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Buku $buku)
    {
        return view('buku.show', compact('buku'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buku $buku)
    {
        $penerbit = Penerbit::all();
        $kategori = Kategori::all();
        return view('buku.edit', compact('buku', 'penerbit', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Buku $buku)
    {
         // validasi
        $validatedData = request()->validate([
            'judul' => 'required|max:100',
            'pengarang' => 'required|max:100',
            'tahun_terbit' => 'required|integer:4',
            'kategori_id' => 'required',
            'penerbit_id' => 'required',
            'file_cover' => 'nullable|image|mimes:jpeg,png,jpg|max:1024',
        ]);

         //upload file cover
        if (request()->hasFile('file_cover')) {
            $validatedData['cover'] = request()->file('file_cover')->store('cover', 'public');

            if ($request->cover_lama) {
                Storage::delete('public/' . $request->cover_lama);
            }
        }

        // hapus file_cover dari array validasi
        unset($validatedData['file_cover']);

        // update data
        $buku->update($validatedData);

        // redirect ke index buku
        return redirect()->route('buku.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buku $buku)
    {
        if ($buku->cover && Storage::exists('public/' . $buku->cover)) {
            Storage::delete('public/' . $buku->cover);
        }
        // proses delete data
        $buku->delete();
        return redirect()->route('buku.index');
    }
}
