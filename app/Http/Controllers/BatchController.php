<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        if ($search) {
            $data['batch'] = Batch::where('id_batch', 'like', "%{$search}%")->get();
        } else {
            $data['batch'] = Batch::all();
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

    public function template(Request $request)
    {
        $search = $request->get('search');

        $query = batch::with('batch');
        
        $query = batch::query();
        
        if ($search) {
            $query->where('nim_mhs', 'like', "%{$search}%")
                  ->orWhere('nama_mhs', 'like', "%{$search}%");
        }
        
        $data['mahasiswa'] = $query->get();
        $data['batch'] = $query->get();
        
        return view('layouts.batch.template', $data);
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
            'upload' => 'required|file',
        ]);
    
        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->move(public_path('filebatch'), $filename);
        } else {
            return redirect()->back()->with('error', 'Gagal mengunggah file.');
        }
    
        $batch = new Batch();
        $batch->id_batch = $request->id_batch;
        $batch->nama_mhs = $request->nama_mhs;
        $batch->tahun_angkatan = $request->tahun_angkatan;
        $batch->program_studi = $request->program_studi;
        $batch->status = $request->status;
        $batch->sks = $request->sks;
        $batch->ipk = $request->ipk;
        $batch->upload = 'filebatch/' . $filename;
    
        if ($batch->save()) {
            return redirect()->route('batch.index')->with('message', 'Data Batch Berhasil Dibuat.');
        } else {
            return redirect()->back()->with('error', 'Gagal Menambah Data Batch.');
        }
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $batch = Batch::find($id);
        return view('layouts.batch.edit', compact('batch'));    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $batch = Batch::find($id);
        if (!$batch) {
            return redirect()->back()->with('error', 'Batch tidak ditemukan');
        }
    
        $validatedData = $request->validate([
            'id_batch' => 'required',
            'nama_mhs' => 'required',
            'tahun_angkatan' => 'required',
            'program_studi' => 'required',
            'status' => 'required',
            'sks' => 'required',
            'ipk' => 'required',
            'upload' => 'file',
        ]);
    
        if ($request->hasFile('upload')) {
            // Delete old file
            if ($batch->upload && file_exists(public_path($batch->upload))) {
                unlink(public_path($batch->upload));
            }
            // Store new file
            $file = $request->file('upload');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->move(public_path('filebatch'), $filename);
            $batch->upload = 'filebatch/' . $filename;
        }
    
        $batch->id_batch = $request->id_batch;
        $batch->nama_mhs = $request->nama_mhs;
        $batch->tahun_angkatan = $request->tahun_angkatan;
        $batch->program_studi = $request->program_studi;
        $batch->status = $request->status;
        $batch->sks = $request->sks;
        $batch->ipk = $request->ipk;
        $batch->save();
    
        return redirect()->route('batch.index')->with('message', 'Edit Batch Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $batch = Batch::find($id);
        if (!$batch) {
            return redirect()->back()->with('error', 'Batch tidak ditemukan');
        }

        try {
            if ($batch->upload) {
                Storage::disk('public')->delete($batch->upload);
            }
            $batch->delete();
            session()->flash('message', 'Delete Batch berhasil');
            return redirect()->route('batch.index');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Delete Batch gagal');
        }
    }
}
