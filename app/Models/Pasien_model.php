<?php

namespace App\Models;

use CodeIgniter\Model;

class Pasien_model extends Model
{
  protected $table      = 'pasien';
  protected $primaryKey = 'id_pasien';
  protected $allowedFields = [
    'nama_pasien', 'no_pasien', 'lahir_pasien', 'jenkel_pasien', 'alamat_pasien', 'telpon_pasien', 'goldar_pasien'
  ];

  public function getPasien()
  {
    return $this->findAll();
  }

  public function deletePasien($id)
  {
    return $this->delete($id);
  }
}
