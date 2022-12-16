<?php

namespace App\Imports;

use Modules\Admin\Entities\Dosen;
use Modules\Admin\Entities\Matkul;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MatkulImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Matkul([
            'semester' => $row['semester'],
            'nama' => $row['nama'],
            'kode' => $row['kode'],
            'sks' => $row['sks'],
            'dosen_kds' => $row['dosen_kds'],
        ]);
    }
}
