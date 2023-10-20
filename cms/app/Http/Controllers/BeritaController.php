<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
{
    $beritas = Berita::all();
    return view('berita.index', compact('beritas'));
}

public function create()
{
    return view('berita.create');
}

public function store(Request $request)
{
    $validatedData = $request->validate([
        'judul' => 'required',
        'isi' => 'required',
    ]);

    Berita::create($validatedData);

    return redirect()->route('berita.index');
}

public function edit(Berita $berita)
{
    return view('berita.edit', compact('berita'));
}

public function update(Request $request, Berita $berita)
{
    $validatedData = $request->validate([
        'judul' => 'required',
        'isi' => 'required',
    ]);

    $berita->update($validatedData);

    return redirect()->route('berita.index');
}

public function destroy(Berita $berita)
{
    $berita->delete();

    return redirect()->route('berita.index');
}

}
