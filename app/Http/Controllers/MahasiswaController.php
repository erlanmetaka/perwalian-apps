<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;
use DataTables;

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

    // public function index(Request $request)
    // {
    //     if ($request->ajax()) {
    //         $datas = Mahasiswa::all();
    //         return DataTables::of($datas)
    //             ->addIndexColumn() //memberikan penomoran
    //             ->addColumn('action', function($mahasiswa){
    //                 $btn = '<a href="'.route('mahasiswa.edit', $mahasiswa->id).'" class="edit btn btn-sm btn-primary" > <i class="fa fa-edit"></i> Edit</a>
    //                     <a href="javascript:void(0)" class="edit btn btn-sm btn-danger" onclick="hapus('.$mahasiswa->id.')" > <i class="fa fa-trash"></i> Hapus</a>';
    //                  return $btn;
    //          })
    //          ->rawColumns(['action'])
    //          ->make(true);
    //     }
    //     return view('mahasiswas.index');
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        return view('mahasiswas.create');
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
            'nim' => 'required',
            'jurusan' => 'required',
            'email' =>  ['required', 'string', 'email', 'max:255', 'unique:users'],
            'kontak' => 'required',
            'alamat' => 'required',
        ]);

        $mahasiswa = mahasiswa::create([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'jurusan' => $request->jurusan,
            'email' => $request->email,
            'kontak' => $request->kontak,
            'alamat' => $request->alamat
        ]);
        $user = User::create([
            'name' => $mahasiswa->nama,
            'email' => $mahasiswa->email,
            'password' => bcrypt('12345678'),
            'role_id' => 1,
            'user_id' => $mahasiswa->id
        ]); 
        $user->assignRole(1);

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
            'nim' => 'required',
            'jurusan' => 'required',
            // 'email' =>  ['required', 'string', 'email', 'max:255', 'unique:users'],
            'kontak' => 'required',
            'alamat' => 'required',
        ]);

        $mahasiswa = Mahasiswa::findOrFail($id);

        $mahasiswa->update([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'jurusan' => $request->jurusan,
            // 'email' => $request->email,
            'kontak' => $request->kontak,
            'alamat' => $request->alamat
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
