<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\mahasiswa;

class UserImport implements ToModel
{
    private $current = 0;

    public function model(array $row)
    {
        $this->current++;
        if ($this->current > 1) {
            return new mahasiswa([
                'id_batch' => $row[1],
                'nim_mhs' => $row[2],
                'nama_mhs' => $row[3],
                'tempat_lahir' => $row[4],
                'tgl_lahir' => $row[5],
                'ipk' => $row[6],
                'jml_smstr_aktif' => $row[7],
                'jml_cuti' => $row[8],
                'kode_prodi' => $row[9],
                'nama_prodi' => $row[10],
                'nama_pt' => $row[11],
            ]);
}
}
}