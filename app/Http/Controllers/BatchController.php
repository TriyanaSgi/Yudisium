<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
use App\Imports\MhsImport;

class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        if ($search) {
            \Log::info('Searching batch', ['search' => $search]);
            $data['batch'] = Batch::where('id_batch', 'like', "%{$search}%")->get();
        } else {
            \Log::info('Fetching all batches');
            $data['batch'] = Batch::all();
        }
        return view('layouts.batch.index', $data);
    }

    public function import()
    {
        \Log::info('Displaying import view');
        return view('layouts.batch.import');
    }

    public function import_post(Request $request)
    {
        \Log::info('Import started.');

        $validator = Validator::make($request->all(), [
            'excel_file' => 'required|file|mimes:xlsx,csv,xls',
        ], [
            'excel_file.required' => 'The Excel file is required.',
            'excel_file.file' => 'The uploaded file must be a valid file.',
            'excel_file.mimes' => 'The file must be a file of type: xlsx, csv, xls.',
        ]);

        if ($validator->fails()) {
            \Log::info('Validation failed.', $validator->errors()->toArray());
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            \Log::info('Validation passed.');
            $file = $request->file('excel_file');
            \Log::info('File uploaded.', ['file' => $file->getClientOriginalName()]);

            Excel::import(new MhsImport, $file, null, \Maatwebsite\Excel\Excel::XLSX);
            \Log::info('File imported successfully.');

            return redirect()->route('batch.index')->with('success', 'File imported successfully!');
        } catch (\Exception $e) {
            \Log::error('Error importing file: ' . $e->getMessage());
            return redirect()->back()->with('error', 'There was an error importing the file: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        \Log::info('Displaying create batch form');
        return view('layouts.batch.create');
    }

    public function template(Request $request)
    {
        $search = $request->get('search');
        \Log::info('Fetching batch template', ['search' => $search]);

        $query = Batch::query();
        
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
        \Log::info('Storing new batch', $request->all());

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
            \Log::info('File uploaded', ['filename' => $filename]);
        } else {
            \Log::error('Failed to upload file');
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
            \Log::info('Batch stored successfully', ['batch' => $batch]);
            return redirect()->route('batch.index')->with('message', 'Data Batch Berhasil Dibuat.');
        } else {
            \Log::error('Failed to store batch', ['batch' => $batch]);
            return redirect()->back()->with('error', 'Gagal Menambah Data Batch.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        \Log::info('Fetching batch for edit', ['id' => $id]);
        $batch = Batch::find($id);
        if (!$batch) {
            \Log::error('Batch not found', ['id' => $id]);
            return redirect()->back()->with('error', 'Batch tidak ditemukan');
        }
        return view('layouts.batch.edit', compact('batch'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        \Log::info('Updating batch', ['id' => $id]);

        $batch = Batch::find($id);
        if (!$batch) {
            \Log::error('Batch not found', ['id' => $id]);
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
            \Log::info('New file uploaded', ['filename' => $filename]);
        }

        $batch->id_batch = $request->id_batch;
        $batch->nama_mhs = $request->nama_mhs;
        $batch->tahun_angkatan = $request->tahun_angkatan;
        $batch->program_studi = $request->program_studi;
        $batch->status = $request->status;
        $batch->sks = $request->sks;
        $batch->ipk = $request->ipk;
        $batch->save();

        \Log::info('Batch updated successfully', ['batch' => $batch]);
        return redirect()->route('batch.index')->with('message', 'Edit Batch Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        \Log::info('Deleting batch', ['id' => $id]);

        $batch = Batch::find($id);
        if (!$batch) {
            \Log::error('Batch not found', ['id' => $id]);
            return redirect()->back()->with('error', 'Batch tidak ditemukan');
        }

        try {
            if ($batch->upload && Storage::disk('public')->exists($batch->upload)) {
                Storage::disk('public')->delete($batch->upload);
            }
            $batch->delete();
            \Log::info('Batch deleted successfully', ['id' => $id]);
            session()->flash('message', 'Delete Batch berhasil');
            return redirect()->route('batch.index');
        } catch (\Exception $e) {
            \Log::error('Error deleting batch: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Delete Batch gagal');
}
}
}