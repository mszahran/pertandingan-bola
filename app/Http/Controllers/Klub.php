<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Klub as KlubModel;
use App\Models\Klasemen as KlasemenModel;

class Klub extends Controller
{
    public function index()
    {
        $this->data['dataKlub'] = KlubModel::all();

        return view('klub.views', $this->data);
    }

    public function create()
    {
        $this->data['action'] = route('klub.store');

        return view('klub.create', $this->data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_klub' => 'required|unique:klub,nama_klub',
            'nama_kota' => 'required',
        ], [
            'nama_klub.required' => 'Nama klub harus diisi.',
            'nama_klub.unique' => 'Nama klub sudah ada di database.',
            'nama_kota.required' => 'Nama kota harus diisi.',
        ]);

        try {
            // Create klub
            $klub = KlubModel::create([
                'nama_klub' => $request->nama_klub,
                'kota_klub' => $request->nama_kota,
            ]);

            // Retrieve klub ID
            $klubId = $klub->id;

            // Create initial klasemen for the klub
            KlasemenModel::create([
                'klub_id' => $klubId,
                'bertanding' => 0,
                'menang' => 0,
                'draw' => 0,
                'kalah' => 0,
                'jumlah_goal' => 0,
                'jumlah_kebobolan' => 0,
                'point' => 0,
            ]);

            // Redirect to index page with success message
            return redirect()
                ->route('klub.index')
                ->with([
                    'success' => 'Klub baru telah berhasil ditambahkan.'
                ]);
        } catch (\Exception $e) {
            // Redirect back with error message and input data
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Terjadi masalah saat menyimpan data klub.'
                ]);
        }
    }

    public function edit($id)
    {
        $this->data['action'] = route('klub.update', $id);

        $klub = KlubModel::findOrFail($id);

        return view('klub.edit', $this->data, compact('klub'));
    }

    public function update(Request $request, $id)
    {
        $klub = KlubModel::findOrFail($id);

        if ($request->nama_klub == $klub->nama_klub) {
            $request->validate([
                'nama_kota' => 'required',
            ], [
                'nama_kota.required' => 'Nama kota harus diisi.',
            ]);
        } else {
            $request->validate([
                'nama_klub' => 'required|unique:klub,nama_klub',
                'nama_kota' => 'required',
            ], [
                'nama_klub.required' => 'Nama klub harus diisi.',
                'nama_klub.unique' => 'Nama klub sudah ada di database.',
                'nama_kota.required' => 'Nama kota harus diisi.',
            ]);
        }

        try {
            $klub->update([
                'nama_klub' => $request->nama_klub,
                'kota_klub' => $request->nama_kota
            ]);

            // Redirect to index page with success message
            return redirect()
                ->route('klub.index')
                ->with([
                    'success' => 'Klub berhasil diperbarui.'
                ]);
        } catch (\Exception $e) {
            // Redirect back with error message and input data
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Terjadi masalah saat memperbarui klub.'
                ]);
        }
    }

    public function destroy(KlubModel $klub)
    {
        KlubModel::find($klub->id)->delete();

        return redirect()->route('klub.index')->with('success', 'Klub berhasil dihapus');
    }
}
