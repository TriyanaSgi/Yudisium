<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa;
use App\Models\batch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
use App\Imports\UserImport;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        if ($search) {
            \Log::info('Searching data', ['search' => $search]);
            $data['mahasiswa'] = mahasiswa::where('id_batch', 'like', "%{$search}%")->get();
        } else {
            \Log::info('Fetching all datas');
            $data['mahasiswa'] = mahasiswa::all();
        }
        return view('layouts.mahasiswa.index', $data);
    }

    public function import()
    {
        \Log::info('Displaying import view');
        return view('layouts.mahasiswa.import');
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

            Excel::import(new UserImport, $file, null, \Maatwebsite\Excel\Excel::XLSX);
            \Log::info('File imported successfully.');

            return redirect()->route('mahasiswa.index')->with('success', 'File imported successfully!');
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
        \Log::info('Displaying create data form');
        return view('layouts.mahasiswa.create');
    }

    public function verifikasi(Request $request)
    {
        $search = $request->get('search');

        $query = mahasiswa::with('batch');
        
        $query = mahasiswa::query();
        
        if ($search) {
            $query->where('nim_mhs', 'like', "%{$search}%")
                  ->orWhere('nama_mhs', 'like', "%{$search}%");
        }
        
        $data['mahasiswa'] = $query->get();
        $data['batch'] = $query->get();
        
        return view('layouts.mahasiswa.verifikasi', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        \Log::info('Storing new data', $request->all());

        $validatedData = $request->validate([
            'id_batch' => 'required',
            'nim_mhs' => 'required',
            'nama_mhs' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'ipk' => 'required',
            'jml_smstr_aktif' => 'required',
            'jml_cuti' => 'required',
            'kode_prodi' => 'required',
            'nama_prodi' => 'required',
            'nama_pt' => 'required',
        ]);

        $mahasiswa = new mahasiswa();
        $mahasiswa->id_batch = $request->id_batch;
        $mahasiswa->nim_mhs = $request->nim_mhs;
        $mahasiswa->nama_mhs = $request->nama_mhs;
        $mahasiswa->tempat_lahir = $request->tempat_lahir;
        $mahasiswa->tgl_lahir = $request->tgl_lahir;
        $mahasiswa->ipk = $request->ipk;
        $mahasiswa->jml_smstr_aktif = $request->jml_smstr_aktif;
        $mahasiswa->jml_cuti = $request->jml_cuti;
        $mahasiswa->kode_prodi = $request->kode_prodi;
        $mahasiswa->nama_prodi = $request->nama_prodi;
        $mahasiswa->nama_pt = $request->nama_pt;

        if ($mahasiswa->save()) {
            \Log::info('Mahasiswa stored successfully', ['mahasiswa' => $mahasiswa]);
            return redirect()->route('mahasiswa.index')->with('message', 'Data Mahasiswa Berhasil Dibuat.');
        } else {
            \Log::error('Failed to store mahasiswa', ['mahasiswa' => $mahasiswa]);
            return redirect()->back()->with('error', 'Gagal Menambah Data Mahasiswa.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        \Log::info('Fetching data for edit', ['id' => $id]);
        $mahasiswa = mahasiswa::find($id);
        if (!$mahasiswa) {
            \Log::error('Data not found', ['id' => $id]);
            return redirect()->back()->with('error', 'data tidak ditemukan');
        }
        return view('layouts.mahasiswa.edit', compact('mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        \Log::info('Updating data', ['id' => $id]);

        $mahasiswa = mahasiswa::find($id);
        if (!$mahasiswa) {
            \Log::error('Data not found', ['id' => $id]);
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }

        $validatedData = $request->validate([
            'id_batch' => 'required',
            'nim_mhs' => 'required',
            'nama_mhs' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'ipk' => 'required',
            'jml_smstr_aktif' => 'required',
            'jml_cuti' => 'required',
            'kode_prodi' => 'required',
            'nama_prodi' => 'required',
            'nama_pt' => 'required',
        ]);

        $mahasiswa->id_batch = $request->id_batch;
        $mahasiswa->nim_mhs = $request->nim_mhs;
        $mahasiswa->nama_mhs = $request->nama_mhs;
        $mahasiswa->tempat_lahir = $request->tempat_lahir;
        $mahasiswa->tgl_lahir = $request->tgl_lahir;
        $mahasiswa->ipk = $request->ipk;
        $mahasiswa->jml_smstr_aktif = $request->jml_smstr_aktif;
        $mahasiswa->jml_cuti = $request->jml_cuti;
        $mahasiswa->kode_prodi = $request->kode_prodi;
        $mahasiswa->nama_prodi = $request->nama_prodi;
        $mahasiswa->nama_pt = $request->nama_pt;
        $mahasiswa->save();

        \Log::info('Data updated successfully', ['mahasiswa' => $mahasiswa]);
        return redirect()->route('mahasiswa.index')->with('message', 'Edit Data Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        \Log::info('Deleting data', ['id' => $id]);

        $mahasiswa = mahasiswa::find($id);
        if (!$mahasiswa) {
            \Log::error('Data not found', ['id' => $id]);
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }

        try {
            if ($mahasiswa->upload && Storage::disk('public')->exists($mahasiswa->upload)) {
                Storage::disk('public')->delete($mahasiswa->upload);
            }
            $mahasiswa->delete();
            \Log::info('Data deleted successfully', ['id' => $id]);
            session()->flash('message', 'Delete Data berhasil');
            return redirect()->route('mahasiswa.index');
        } catch (\Exception $e) {
            \Log::error('Error deleting data: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Delete Data gagal');
}
}
}
