<?php

namespace App\Http\Controllers;

use App\Models\Provinsi;
use Illuminate\Http\Request;

class ProvinsiController extends Controller
{
    public function index()
    {
        $provinsis = Provinsi::paginate(10);

        return view('provinsi.index', ['provinsis' => $provinsis]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|unique:provinsis',
            'nama' => 'required',
        ]);

        Provinsi::create([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'active' => $request->active ? true : false
        ]);

        return redirect()->route('provinsi-index');
    }

    public function getDataProvinsi($id)
    {
        $provinsi = Provinsi::findOrFail($id);

        return response()->json(
            $provinsi
        );
    }


    public function update(Request $request, $id)
    {
        $provinsi = Provinsi::findOrFail($id);

        $provinsi->update([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'active' => $request->active ? true : false
        ]);

        return redirect()->route('provinsi-index');
    }

    public function destroy($id)
    {
        $provinsi = Provinsi::findOrFail($id);

        $provinsi->delete();

        return redirect()->route('provinsi-index');
    }
}
