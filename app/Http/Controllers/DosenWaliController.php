<?php

namespace App\Http\Controllers;

use App\Models\DosenWali;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenWaliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dosenWali = DosenWali::with(['dosen', 'mahasiswa'])->get();
        return view('dosen_wali.index', compact('dosenWali'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mahasiswas = Mahasiswa::all();
        $dosens = Dosen::all();
        return view('dosen_wali.create', compact('mahasiswas', 'dosens'));
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
            'dosen_id' => 'required',
            'mahasiswa_id' => 'required',
        ]);

        $dosenWali = DosenWali::create([
            'dosen_id' => $request->dosen_id,
            'mahasiswa_id' => $request->mahasiswa_id,
        ]);

        if ($dosenWali) {
            return redirect()
                ->route('dosen_wali.index')
                ->with([
                    'success' => 'Data Dosen Wali berhasil diinput'
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
        $dosenWali = DosenWali::findOrFail($id);
        $dosens = Dosen::all();
        $mahasiswas = Mahasiswa::all();
        // dd($dosens);die;
        return view('dosen_wali.edit', compact(['dosenWali', 'dosens', 'mahasiswas']));
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
            'dosen_id' => 'required',
            'mahasiswa_id' => 'required',
        ]);

        $dosenWali = DosenWali::findOrFail($id);
        $dosenWali->update([
            'dosen_id' => $request->dosen_id,
            'mahasiswa_id' => $request->mahasiswa_id,
        ]);

        if ($dosenWali) {
            return redirect()
                ->route('dosen_wali.index')
                ->with([
                    'success' => 'Data Dosen Wali berhasil diinput'
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
        $dosenWali = DosenWali::findOrFail($id);
        $dosenWali->delete();

        if ($dosenWali) {
            return redirect()
                ->route('dosen_wali.index')
                ->with([
                    'success' => 'Data Dosen Wali berhasil dihapus'
                ]);
        } else {
            return redirect()
                ->route('dosen_wali.index')
                ->with([
                    'error' => 'Maaf Coba Lagi'
                ]);
        }
    }
}
