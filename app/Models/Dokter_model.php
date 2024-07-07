<?php

namespace App\Models;

use CodeIgniter\Model;

class Dokter_model extends Model
{
  protected $table      = 'dokter';
  protected $primaryKey = 'id_dokter';
  protected $allowedFields = ['nama_dokter', 'no_dokter', 'jenkel_dokter', 'no_telepon', 'alamat', 'spesialisasi'];

  public function getDokter()
  {
    return $this->findAll();
  }

  public function deleteDokter($id)
  {
    return $this->delete($id);
  }
}
