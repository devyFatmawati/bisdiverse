<?php

namespace App\Imports;

use Modules\Admin\Entities\Mahasiswa;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MahasiswaImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Mahasiswa([
            'nama' => $row['nama'],
            'npm' => $row['npm'],
            'no_rfid' => $row['no_rfid'],
            'no_rfid_cadangan' => $row['no_rfid_cadangan'],
            'tahun_masuk' => $row['tahun_masuk'],
            'kelas' => $row['kelas'],
            'no_ktp' => $row['no_ktp'],
            'alamat' => $row['alamat'],
            'kabkota' => $row['kabkota'],
            'kecamatan' => $row['kecamatan'],
            'desa' => $row['desa'],
            'rt' => $row['rt'],
            'rw' => $row['rw'],
            'kode_pos' => $row['kode_pos'],
            'no_telp' => $row['no_telp'],
            'tempat_lahir' => $row['tempat_lahir'],
            'tgl_lahir' => $row['tgl_lahir'],
            'ibu_kandung' => $row['ibu_kandung'],
            'nama_ot' => $row['nama_ot'],
            'hubungan_ot' => $row['hubungan_ot'],
            'no_telp_ot' => $row['no_telp_ot'],
            'asal_sekolah' => $row['asal_sekolah']
        ]);
    }
}
