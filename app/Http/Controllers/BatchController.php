<?php

namespace App\Http\Controllers;

use App\Models\batch;
use Illuminate\Http\Request;

class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        if ($search) {
            $data['batch'] = batch::where('id_batch', 'like', "%{$search}%")->get();
        } else {
            $data['batch'] = batch::all();
        }
        return view('layouts.batch.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layouts.batch.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_batch' => 'required',
            'nama_mhs' => 'required',
            'tahun_angkatan' => 'required',
            'program_studi' => 'required',
            'status' => 'required',
            'sks' => 'required',
            'ipk' => 'required',
        ]);

        try {
            $batch = new BatchController();
            $batch->id_batch = $request->id_batch;
            $batch->nama_mhs = $request->nama_mhs;
            $batch->tahun_angkatan = $request->tahun_angkatan;
            $batch->program_studi = $request->program_studi;
            $batch->status = $request->status;
            $batch->sks = $request->sks;
            $batch->ipk = $request->ipk;
            $batch->save();

            $request->session()->flash('message', 'Data Berhasil Disimpan!');

            return redirect()->route('batch.index');
        } catch (\Exception $e) {
            $request->session()->flash('error', 'Gagal Menambahkan data.');

            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(batch $batch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $data_pt = batch::find($id);

        return view('layouts.batch.edit', compact('batch'));    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $batch = batch::find($id);
        if (!$batch) {
            return redirect()->back()->with('error', 'Batch tidak ditemukan');
        }
    
        try {
            $validatedData = $request->validate([
                'id_batch' => 'required',
                'nama_mhs' => 'required',
                'tahun_angkatan' => 'required',
                'program_studi' => 'required',
                'status' => 'required',
                'sks' => 'required',
                'ipk' => 'required',
            ]);
            $batch->id_batch = $request->id_batch;
            $batch->nama_mhs = $request->nama_mhs;
            $batch->tahun_angkatan = $request->tahun_angkatan;
            $batch->program_studi = $request->program_studi;
            $batch->status = $request->status;
            $batch->sks = $request->sks;
            $batch->ipk = $request->ipk;
            $batch->save();
    
            return redirect()->route('batch.index')->with('message', 'Edit Batch Berhasil');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Edit Batch Gagal');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $batch = batch::find($id);
        if (!$batch) {
            return redirect()->back()->with('error', 'PT tidak ditemukan');
        }
    
        try {
            $batch->delete();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Delete Batch gagal');
        }
    
        session()->flash('message', 'Delete Batch berhasil');
        return redirect()->route('batch.index');
    }
}
