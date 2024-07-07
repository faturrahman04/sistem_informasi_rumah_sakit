<?php

namespace App\Models;

use CodeIgniter\Model;

class Obat_model extends Model
{
  protected $table      = 'obat';
  protected $primaryKey = 'id_obat';
  protected $allowedFields = [
    'nama_obat', 'jenis_obat', 'kategori_obat', 'komposisi', 'dosis', 'indikasi', 'tgl_kadaluarsa', 'harga', 'catatan_tambahan'
  ];

  public function getObat()
  {
    return $this->findAll();
  }

  public function deleteObat($id)
  {
    return $this->delete($id);
  }
}
