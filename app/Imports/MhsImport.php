<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\Batch;

class MhsImport implements ToModel
{
    private $current = 0;

    public function model(array $row)
    {
        $this->current++;
        if ($this->current > 1) {
            return new Batch([
                'id_batch' => $row[1],
                'nama_mhs' => $row[2],
                'tahun_angkatan' => $row[3],
                'program_studi' => $row[4],
                'status' => $row[5],
                'sks' => $row[6],
                'ipk' => $row[7],
            ]);
}
}
}