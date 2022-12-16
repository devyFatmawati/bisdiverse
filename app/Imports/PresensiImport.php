<?php

namespace App\Imports;

use Modules\Admin\Entities\Dosen;
use Modules\Admin\Entities\Matkul;
use Modules\Admin\Entities\Presensi;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PresensiImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Presensi([
            'nama' => $row['nama'],
            'npm' => $row['npm'],
            'kelas' => $row['kelas'],
            'matkul_kode' => $row['matkul_kode'],
            'no_rfid' => $row['no_rfid'],
            'jenis_ujian' => $row['jenis_ujian'],
            'created_at' => $row['created_at'],
        ]);
    }
}
