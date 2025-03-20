<?php

namespace App\Http\Controllers;

use App\Models\Survei;
use App\Models\PertanyaanSurvei;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;

class SurveiController extends Controller
{
    public function index()
    {
        $surveis = Survei::with('pertanyaan')->get();
        return View::make('surveis.index', compact('surveis'));
    }

    public function create()
    {
        return View::make('surveis.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'pertanyaan' => 'required|array|min:1',
            'pertanyaan.*' => 'required|string'
        ]);

        $survei = Survei::create($request->only(['nama', 'deskripsi', 'tanggal_mulai', 'tanggal_selesai']));

        foreach ($request->pertanyaan as $pertanyaan) {
            PertanyaanSurvei::create([
                'survei_id' => $survei->id,
                'teks_pertanyaan' => $pertanyaan,
                'tipe_pertanyaan' => 'Essay'
            ]);
        }

        return Redirect::route('surveis.index')->with('success', 'Survei berhasil dibuat!');
    }

    public function edit(Survei $survei)
    {
        return View::make('surveis.edit', compact('survei'));
    }

    public function update(Request $request, Survei $survei)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai'
        ]);

        $survei->update($request->only(['nama', 'deskripsi', 'tanggal_mulai', 'tanggal_selesai']));

        return Redirect::route('surveis.index')->with('success', 'Survei berhasil diperbarui!');
    }

    public function destroy(Survei $survei)
    {
        $survei->delete();
        return Redirect::route('surveis.index')->with('success', 'Survei dihapus!');
    }
}
