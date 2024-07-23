<?php

namespace App\Http\Controllers;

use App\Models\Klasemen as KlasemenModel;
use App\Models\Klub as KlubModel;
use App\Models\Pertandingan as PertandinganModel;
use Illuminate\Http\Request;

class SkorMultiple extends Controller
{
    public function index()
    {
        $this->data['action'] = route('skor-multiple.store');
        $this->data['dataKlub'] = KlubModel::all();

        return view('skor.multi-create', $this->data);
    }

    public function store(Request $request)
    {
        try {
            foreach ($request->klub_1 as $key => $item) {
                PertandinganModel::create([
                    'klub_id_1' => $request->klub_1[$key],
                    'klub_id_2' => $request->klub_2[$key],
                    'skor_klub_1' => $request->skor_1[$key],
                    'skor_klub_2' => $request->skor_2[$key]
                ]);

                $klubSatu = KlasemenModel::where('klub_id', $request->klub_1[$key])->firstOrFail();
                $klubDua = KlasemenModel::where('klub_id', $request->klub_2[$key])->firstOrFail();

                switch (true) {
                    case ($request->skor_1[$key] > $request->skor_2[$key]):
                        $klubSatu->update([
                            'bertanding' => $klubSatu->bertanding + 1,
                            'menang' => $klubSatu->menang + 1,
                            'draw' => $klubSatu->draw + 0,
                            'kalah' => $klubSatu->kalah + 0,
                            'jumlah_goal' => $klubSatu->jumlah_goal + $request->skor_1[$key],
                            'jumlah_kebobolan' => $klubSatu->jumlah_kebobolan + $request->skor_2[$key],
                            'point' => $klubSatu->point + 3,
                        ]);

                        $klubDua->update([
                            'bertanding' => $klubDua->bertanding + 1,
                            'menang' => $klubDua->menang + 0,
                            'draw' => $klubDua->draw + 0,
                            'kalah' => $klubDua->kalah + 1,
                            'jumlah_goal' => $klubDua->jumlah_goal + $request->skor_2[$key],
                            'jumlah_kebobolan' => $klubDua->jumlah_kebobolan + $request->skor_1[$key],
                            'point' => 0,
                        ]);
                        break;

                    case ($request->skor_2[$key] > $request->skor_1[$key]):
                        $klubSatu->update([
                            'bertanding' => $klubSatu->bertanding + 1,
                            'menang' => $klubSatu->menang + 0,
                            'draw' => $klubSatu->draw + 0,
                            'kalah' => $klubSatu->kalah + 1,
                            'jumlah_goal' => $klubSatu->jumlah_goal + $request->skor_1[$key],
                            'jumlah_kebobolan' => $klubSatu->jumlah_kebobolan + $request->skor_2[$key],
                            'point' => 0,
                        ]);

                        $klubDua->update([
                            'bertanding' => $klubDua->bertanding + 1,
                            'menang' => $klubDua->menang + 1,
                            'draw' => $klubDua->draw + 0,
                            'kalah' => $klubDua->kalah + 0,
                            'jumlah_goal' => $klubDua->jumlah_goal + $request->skor_2[$key],
                            'jumlah_kebobolan' => $klubDua->jumlah_kebobolan + $request->skor_1[$key],
                            'point' => $klubDua->point + 3,
                        ]);
                        break;

                    case ($request->skor_1[$key] == $request->skor_2[$key]):
                        $klubSatu->update([
                            'bertanding' => $klubSatu->bertanding + 1,
                            'menang' => $klubSatu->menang + 0,
                            'draw' => $klubSatu->draw + 1,
                            'kalah' => $klubSatu->kalah + 0,
                            'jumlah_goal' => $klubSatu->jumlah_goal + $request->skor_1[$key],
                            'jumlah_kebobolan' => $klubSatu->jumlah_kebobolan + $request->skor_2[$key],
                            'point' => $klubSatu->point + 1,
                        ]);

                        $klubDua->update([
                            'bertanding' => $klubDua->bertanding + 1,
                            'menang' => $klubDua->menang + 0,
                            'draw' => $klubDua->draw + 1,
                            'kalah' => $klubDua->kalah + 0,
                            'jumlah_goal' => $klubDua->jumlah_goal + $request->skor_2[$key],
                            'jumlah_kebobolan' => $klubDua->jumlah_kebobolan + $request->skor_1[$key],
                            'point' => $klubDua->point + 1,
                        ]);
                        break;

                    default:
                        break;
                }
            }

            return redirect()->route('home')->with('success', 'Skor berhasil ditambahkan dan klasemen diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Terjadi masalah saat menyimpan skor dan memperbarui klasemen.');
        }
    }
}
