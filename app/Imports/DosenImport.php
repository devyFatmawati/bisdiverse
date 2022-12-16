<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Modules\Admin\Entities\Dosen;

class DosenImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Dosen([
            'nama' => $row['nama'],
            'kds' => $row['kds'],
            'nidn_nidk' => $row['nidn_nidk'],
        ]);
    }
}
