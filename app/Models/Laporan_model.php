<?php

namespace App\Models;

use CodeIgniter\Model;

class Laporan_model extends Model
{
  protected $table      = 'laporan';
  protected $primaryKey = 'id_laporan';
  protected $allowedFields = [
    'id_pasien', 'id_dokter', 'id_suster', 'id_kamar', 'id_obat', 'tanggal_masuk', 'keterangan'
  ];

  public function getLaporan()
  {
    return $this->select('laporan.*, dokter.nama_dokter, suster.nama_suster, kamar.no_kamar, obat.nama_obat, pasien.nama_pasien')
      ->join('dokter', 'dokter.id_dokter = laporan.id_dokter')
      ->join('suster', 'suster.id_suster = laporan.id_suster')
      ->join('kamar', 'kamar.id_kamar = laporan.id_kamar')
      ->join('obat', 'obat.id_obat = laporan.id_obat')
      ->join('pasien', 'pasien.id_pasien = laporan.id_pasien')
      ->findAll();
  }

  public function deleteLaporan($id)
  {
    return $this->delete($id);
  }
}
