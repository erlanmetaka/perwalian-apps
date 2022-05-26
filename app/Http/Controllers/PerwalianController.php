<?php

namespace App\Http\Controllers;

use App\Models\Perwalian;
use App\Models\DosenWali;
use App\Models\Dosen;
use Auth;
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
        // $perwalians = Perwalian::with('dosenWali')->where('mahasiswa_id', Auth::user()->user_id)->get();
        // dd($perwalians);die;
        return view('perwalians.index', compact('perwalians'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $user_id = Auth::user()->user_id;
        $dosenWali = DosenWali::with(['dosen','mahasiswa'])->where('mahasiswa_id','=', $user_id)->get();
        // dd($dosenWali[0]->dosen->nama);die;
        return view('perwalians.create', compact('dosenWali'));
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
            'jenis_perwalian' => 'required',
            'judul' => 'required|string|',
            'isi_perwalian' => 'required',
            'semester' => 'required',
            'tahun_ajaran' => 'required',
        ]);

        $user_id = Auth::user()->user_id;
        $dosenwali_id = DosenWali::select('id')->where('mahasiswa_id','=', $user_id)->firstOrFail();
        $perwalian = Perwalian::create([
            'jenis_perwalian' => $request->jenis_perwalian,
            'judul' => $request->judul,
            'isi_perwalian' => $request->isi_perwalian,
            'semester' => $request->semester,
            'tahun_ajaran' => $request->tahun_ajaran,
            'dosenwali_id' => $dosenwali_id->id,
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
        $user_id = Auth::user()->user_id;
        $dosenWali = DosenWali::with(['dosen','mahasiswa'])->where('mahasiswa_id','=', $user_id)->get();
        return view('perwalians.edit', compact(['perwalian', 'dosenWali']));
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
            'jenis_perwalian' => 'required',
            'judul' => 'required|string|',
            'isi_perwalian' => 'required',
            'semester' => 'required',
            'tahun_ajaran' => 'required',
        ]);

        $perwalian = Perwalian::findOrFail($id);
        $user_id = Auth::user()->user_id;
        $dosenwali_id = DosenWali::select('id')->where('mahasiswa_id','=', $user_id)->firstOrFail();
        $perwalian->update([
            'jenis_perwalian' => $request->jenis_perwalian,
            'judul' => $request->judul,
            'isi_perwalian' => $request->isi_perwalian,
            'semester' => $request->semester,
            'tahun_ajaran' => $request->tahun_ajaran,
            'dosenwali_id' => $dosenwali_id->id,
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

    public function history()
    {
        $perwalians = Perwalian::latest()->get();
        // $perwalians = Perwalian::with('dosenWali')->where('mahasiswa_id', Auth::user()->user_id)->get();
        // dd($perwalians);die;
        return view('perwalians.history', compact('perwalians'));
    }

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
