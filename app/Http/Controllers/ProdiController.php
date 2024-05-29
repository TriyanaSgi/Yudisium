<?php

namespace App\Http\Controllers;

use App\Models\prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        if ($search) {
            $data['data_prodi'] = prodi::where('kode_prodi', 'like', "%{$search}%")->get();
        } else {
            $data['data_prodi'] = prodi::all();
        }
        return view('layouts.prodi.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layouts.prodi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_prodi' => 'required',
            'kode_prodi' => 'required',
            'kode_pt' => 'required',
            'nama_pt' => 'required',
        ]);

        try {
            $data_prodi = new ProdiController();
            $data_prodi->nama_prodi = $request->nama_prodi;
            $data_prodi->kode_prodi = $request->kode_prodi;
            $data_prodi->kode_pt = $request->kode_pt;
            $data_prodi->nama_pt = $request->nama_pt;
            $data_prodi->save();

            $request->session()->flash('message', 'Data Berhasil Disimpan!');

            return redirect()->route('prodi.index');
        } catch (\Exception $e) {
            $request->session()->flash('error', 'Gagal Menambahkan data.');

            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(prodi $data_prodi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $data_prodi = prodi::find($id);

        return view('layouts.prodi.edit', compact('data_prodi'));    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data_prodi = prodi::find($id);
        if (!$data_prodi) {
            return redirect()->back()->with('error', 'PT tidak ditemukan');
        }
    
        try {
            $validatedData = $request->validate([
                'nama_prodi' => 'required',
                'kode_prodi' => 'required',
                'kode_pt' => 'required',
                'nama_pt' => 'required',
            ]);
            $data_prodi->nama_prodi = $request->nama_prodi;
            $data_prodi->kode_prodi = $request->kode_prodi;
            $data_prodi->kode_pt = $request->kode_pt;
            $data_prodi->nama_pt = $request->nama_pt;
            $data_prodi->save();
    
            return redirect()->route('prodi.index')->with('message', 'Edit Data Berhasil');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Edit Data Gagal');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data_prodi = prodi::find($id);
        if (!$data_prodi) {
            return redirect()->back()->with('error', 'PT tidak ditemukan');
        }
    
        try {
            $data_prodi->delete();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Delete data gagal');
        }
    
        session()->flash('message', 'Delete data berhasil');
        return redirect()->route('prodi.index');
    }
}
