<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahasiswas = Mahasiswa::latest()->get();
        return view('mahasiswas.index', compact('mahasiswas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        // $mahasiswas = Mahasiswa::pluck('nama', 'dosen_id');
        $dosen = Mahasiswa::with('dosen')->select(['nama', 'dosen_id'])->get();
        var_dump($dosen);die;
        return view('mahasiswas.create')->with($dosen);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|string|',
            'npm' => 'required',
            'jurusan' => 'required',
            'dosen_id' =>'required'
        ]);

        $mahasiswa = mahasiswa::create([
            'nama' => $request->nama,
            'npm' => $request->npm,
            'jurusan' => $request->jurusan,
            'dosen_id' => $request->dosen_id,
        ]);

        if ($mahasiswa) {
            return redirect()
                ->route('mahasiswa.index')
                ->with([
                    'success' => 'Data mahasiswa berhasil diinput'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Maaf Coba Lagi'
                ]);
        }
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
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('mahasiswas.edit', compact('mahasiswa'));
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
        $this->validate($request, [
            'nama' => 'required|string|',
            'npm' => 'required',
            'jurusan' => 'required',
            'dosen_id' => 'required',
        ]);

        $mahasiswa = Mahasiswa::findOrFail($id);

        $mahasiswa->update([
            'nama' => $request->nama,
            'npm' => $request->npm,
            'jurusan' => $request->jurusan,
            'dosen_id' => $request->dosen_id,
        ]);

        if ($mahasiswa) {
            return redirect()
                ->route('mahasiswa.index')
                ->with([
                    'success' => 'Data mahasiswa berhasil diubah'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Maaf Coba Lagi'
                ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();

        if ($mahasiswa) {
            return redirect()
                ->route('mahasiswa.index')
                ->with([
                    'success' => 'Data mahasiswa berhasil dihapus'
                ]);
        } else {
            return redirect()
                ->route('mahasiswa.index')
                ->with([
                    'error' => 'Maaf Coba Lagi'
                ]);
        }
    }
}
