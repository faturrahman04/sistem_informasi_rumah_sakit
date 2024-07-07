<?php

namespace App\Models;

use CodeIgniter\Model;

class Suster_model extends Model
{
  protected $table      = 'suster';
  protected $primaryKey = 'id_suster';
  protected $allowedFields = ['nama_suster', 'no_suster', 'telepon_suster', 'email_suster', 'provinsi'];

  public function getSuster()
  {
    return $this->findAll();
  }

  public function deleteSuster($id)
  {
    return $this->delete($id);
  }
}
