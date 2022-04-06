<?php

namespace App\Http\Controllers;

use App\Models\Perwalian;
use Illuminate\Http\Request;

class PerwalianController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view perwalian', ['only' => ['index']]);
        $this->middleware('permission:create perwalian', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit perwalian', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete perwalian', ['only' => ['destroy']]);
    } 
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perwalians = Perwalian::latest()->get();
        return view('perwalians.index', compact('perwalians'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        // $perwalians = perwalian::pluck('nama', 'dosen_id');
        // $dosen = Perwalian::with('dosen')->select(['nama', 'dosen_id'])->get();
        // var_dump($dosen);die;
        return view('perwalians.create');
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
            'judul' => 'required|string|',
            'isi_perwalian' => 'required',
            'mahasiswa_id' => 'required',
            'dosen_id' =>'required'
        ]);

        $perwalian = Perwalian::create([
            'judul' => $request->judul,
            'isi_perwalian' => $request->isi_perwalian,
            'mahasiswa_id' => $request->mahasiswa_id,
            'dosen_id' => $request->dosen_id,
        ]);

        if ($perwalian) {
            return redirect()
                ->route('perwalian.index')
                ->with([
                    'success' => 'Data perwalian berhasil diinput'
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
        $perwalian = Perwalian::findOrFail($id);
        return view('perwalians.edit', compact('perwalian'));
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
            'judul' => 'required|string|',
            'isi_perwalian' => 'required',
            'mahasiswa_id' => 'required',
            'dosen_id' =>'required'
        ]);

        $perwalian = Perwalian::findOrFail($id);

        $perwalian->update([
            'judul' => $request->judul,
            'isi_perwalian' => $request->isi_perwalian,
            'mahasiswa_id' => $request->mahasiswa_id,
            'dosen_id' => $request->dosen_id,
        ]);

        if ($perwalian) {
            return redirect()
                ->route('perwalian.index')
                ->with([
                    'success' => 'Data perwalian berhasil diubah'
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
        $perwalian = Perwalian::findOrFail($id);
        $perwalian->delete();

        if ($perwalian) {
            return redirect()
                ->route('perwalian.index')
                ->with([
                    'success' => 'Data perwalian berhasil dihapus'
                ]);
        } else {
            return redirect()
                ->route('perwalian.index')
                ->with([
                    'error' => 'Maaf Coba Lagi'
                ]);
        }
    }
}
