<?php

namespace App\Models;

use CodeIgniter\Model;

class Kamar_model extends Model
{
  protected $table      = 'kamar';
  protected $primaryKey = 'id_kamar';
  protected $allowedFields = [
    'no_kamar', 'jenis_kamar', 'lokasi_kamar', 'tarif', 'fasilitas'
  ];

  public function getKamar()
  {
    return $this->findAll();
  }

  public function deleteKamar($id)
  {
    return $this->delete($id);
  }
}
