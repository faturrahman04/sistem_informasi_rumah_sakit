<?php

namespace App\Models;

use CodeIgniter\Model;

class User_model extends Model
{
  protected $table      = 'users';
  protected $primaryKey = 'id_user';
  protected $allowedFields = [
    'username', 'email', 'password'
  ];
}
