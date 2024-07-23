<?php

namespace App\Http\Controllers;

use App\Models\Klub as KlubModel;
use App\Models\Klasemen as KlasemenModel;
use App\Models\Pertandingan as PertandinganModel;
use Illuminate\Http\Request;

class Skor extends Controller
{
    public function index()
    {
        $this->data['action'] = route('skor.store');
        $this->data['dataKlub'] = KlubModel::all();

        return view('skor.single-create', $this->data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'klub_1' => 'required',
            'klub_2' => [
                'required',
                function ($attribute, $value, $fail) use ($request) {
                    if ($value == $request->klub_1) {
                        $fail('Klub 1 dan Klub 2 tidak boleh sama.');
                    }
                },
            ],
            'skor_1' => 'required|integer|min:0',
            'skor_2' => 'required|integer|min:0',
        ]);

        try {
            $klubSatu = KlasemenModel::where('klub_id', $request->klub_1)->firstOrFail();
            $klubDua = KlasemenModel::where('klub_id', $request->klub_2)->firstOrFail();

            switch (true) {
                case ($request->skor_1 > $request->skor_2):
                    $klubSatu->update([
                        'bertanding' => $klubSatu->bertanding + 1,
                        'menang' => $klubSatu->menang + 1,
                        'draw' => $klubSatu->draw + 0,
                        'kalah' => $klubSatu->kalah + 0,
                        'jumlah_goal' => $klubSatu->jumlah_goal + $request->skor_1,
                        'jumlah_kebobolan' => $klubSatu->jumlah_kebobolan + $request->skor_2,
                        'point' => $klubSatu->point + 3,
                    ]);

                    $klubDua->update([
                        'bertanding' => $klubDua->bertanding + 1,
                        'menang' => $klubDua->menang + 0,
                        'draw' => $klubDua->draw + 0,
                        'kalah' => $klubDua->kalah + 1,
                        'jumlah_goal' => $klubDua->jumlah_goal + $request->skor_2,
                        'jumlah_kebobolan' => $klubDua->jumlah_kebobolan + $request->skor_1,
                        'point' => 0,
                    ]);
                    break;

                case ($request->skor_2 > $request->skor_1):
                    $klubSatu->update([
                        'bertanding' => $klubSatu->bertanding + 1,
                        'menang' => $klubSatu->menang + 0,
                        'draw' => $klubSatu->draw + 0,
                        'kalah' => $klubSatu->kalah + 1,
                        'jumlah_goal' => $klubSatu->jumlah_goal + $request->skor_1,
                        'jumlah_kebobolan' => $klubSatu->jumlah_kebobolan + $request->skor_2,
                        'point' => 0,
                    ]);

                    $klubDua->update([
                        'bertanding' => $klubDua->bertanding + 1,
                        'menang' => $klubDua->menang + 1,
                        'draw' => $klubDua->draw + 0,
                        'kalah' => $klubDua->kalah + 0,
                        'jumlah_goal' => $klubDua->jumlah_goal + $request->skor_2,
                        'jumlah_kebobolan' => $klubDua->jumlah_kebobolan + $request->skor_1,
                        'point' => 3,
                    ]);
                    break;

                case ($request->skor_1 == $request->skor_2):
                    $klubSatu->update([
                        'bertanding' => $klubSatu->bertanding + 1,
                        'menang' => $klubSatu->menang + 0,
                        'draw' => $klubSatu->draw + 1,
                        'kalah' => $klubSatu->kalah + 0,
                        'jumlah_goal' => $klubSatu->jumlah_goal + $request->skor_1,
                        'jumlah_kebobolan' => $klubSatu->jumlah_kebobolan + $request->skor_2,
                        'point' => 1,
                    ]);

                    $klubDua->update([
                        'bertanding' => $klubDua->bertanding + 1,
                        'menang' => $klubDua->menang + 0,
                        'draw' => $klubDua->draw + 1,
                        'kalah' => $klubDua->kalah + 0,
                        'jumlah_goal' => $klubDua->jumlah_goal + $request->skor_2,
                        'jumlah_kebobolan' => $klubDua->jumlah_kebobolan + $request->skor_1,
                        'point' => 1,
                    ]);
                    break;

                default:
                    break;
            }

            PertandinganModel::create([
                'klub_id_1' => $request->klub_1,
                'klub_id_2' => $request->klub_2,
                'skor_klub_1' => $request->skor_1,
                'skor_klub_2' => $request->skor_2,
            ]);

            return redirect()
                ->route('home')
                ->with([
                    'success' => 'Skor berhasil ditambahkan dan klasemen diperbarui.'
                ]);
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Terjadi masalah saat menyimpan skor dan memperbarui klasemen.'
                ]);
        }
    }
}
