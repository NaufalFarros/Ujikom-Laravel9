<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Ramsey\Uuid\v1;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = \DB::table('artikels')
        ->join('users', 'users.id', '=', 'artikels.user_id')
        ->select('artikels.*', 'users.name as penulis')
        ->get();
// dd($data);



        return view('pages.artikel.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.artikel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $judul_artikel = $request->judul_artikel;
        $isi_artikel = $request->isi_artikel;
        $user_id = Auth::user()->id;
        $data = [
            'judul_artikel' => $judul_artikel,
            'isi_artikel' => $isi_artikel,
            'user_id' => $user_id,
        ];
        // simpan databse
        Artikel::create($data);
        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd($id);
        $data = Artikel::find($id);
        return view('pages.artikel.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $id_artikel = $id;
        $judul_artikel = $request->judul_artikel;
        $isi_artikel = $request->isi_artikel;
        $user_id = Auth::user()->id;
        $data = [
            'judul_artikel' => $judul_artikel,
            'isi_artikel' => $isi_artikel,
            'user_id' => $user_id,
        ];
        // simpan databse
        Artikel::where('id', $id_artikel)->update($data);

        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil diupdate');
        // dd($id);
        // dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        $find_data = Artikel::find($id);

        if ($find_data) {
            Artikel::destroy($id);
            return redirect()->route('artikel.index')->with('success', 'Artikel berhasil dihapus');
        } else {
            return redirect()->route('artikel.index')->with('error', 'Artikel gagal dihapus');
        }
    }
}
