<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dosens = Dosen::latest()->get();
        return view('dosens.index', compact('dosens'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dosens.create');
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
            'nip' => 'required'
        ]);

        $dosen = Dosen::create([
            'nama' => $request->nama,
            'nip' => $request->nip
        ]);

        if ($dosen) {
            return redirect()
                ->route('dosen.index')
                ->with([
                    'success' => 'Data Dosen berhasil diinput'
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
        $dosen = Dosen::findOrFail($id);
        return view('dosens.edit', compact('dosen'));
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
            'nip' => 'required'
        ]);

        $dosen = Dosen::findOrFail($id);

        $dosen->update([
            'nama' => $request->nama,
            'nip' => $request->nip
        ]);

        if ($dosen) {
            return redirect()
                ->route('dosen.index')
                ->with([
                    'success' => 'Data Dosen berhasil diubah'
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
        $dosen = Dosen::findOrFail($id);
        $dosen->delete();

        if ($dosen) {
            return redirect()
                ->route('dosen.index')
                ->with([
                    'success' => 'Data Dosen berhasil dihapus'
                ]);
        } else {
            return redirect()
                ->route('dosen.index')
                ->with([
                    'error' => 'Maaf Coba Lagi'
                ]);
        }
    }
}
