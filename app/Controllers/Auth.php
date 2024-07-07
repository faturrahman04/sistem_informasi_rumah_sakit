<?php

namespace App\Controllers;

use App\Models\User_model;

class Auth extends BaseController
{
  // Login
  public function loginPage()
  {
    $data = [
      'title' => 'Login Page',
    ];
    echo view('Auth/login', $data);
  }

  public function prosesLogin()
  {
    $session = session();
    $User_model = new User_model();
    $username = $this->request->getVar('username');
    $password = $this->request->getVar('password');

    $data = $User_model->where('username', $username)->first();

    if ($data) {
      $pass = $data['password'];
      $verify_pass = password_verify($password, $pass);

      if ($verify_pass) {
        $ses_data = [
          'username'     => $data['username'],
          'email'    => $data['email'],
          'logged_in'     => TRUE
        ];
        $session->set($ses_data);
        return redirect()->to('/admin');
      } else {
        $session->setFlashdata('msg', 'Password salah');
        return redirect()->to('/login');
      }
    } else {
      $session->setFlashdata('msg', 'Username tidak ditemukan');
      return redirect()->to('/login');
    }
  }

  // Login

  // Registrasi
  public function RegisPage()
  {
    $data = [
      'title' => 'Sign Up'
    ];
    echo view('Auth/registrasi', $data);
  }

  public function daftarData()
  {
    helper(['form']);
    $rules = [
      'username' => 'required|min_length[3]|max_length[20]|is_unique[users.username]',
      'email' => 'required|valid_email|is_unique[users.email]',
      'password' => 'required|min_length[6]|max_length[255]',
      'password_confirm' => 'matches[password]'
    ];

    if ($this->validate($rules)) {
      $User_model = new User_model();
      $data = [
        'username'      => $this->request->getVar('username'),
        'email'         => $this->request->getVar('email'),
        'password'      => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
      ];
      $User_model->save($data);
      return redirect()->to('/login');
    } else {
      $data['validation'] = $this->validator;
      echo view('Auth/registrasi', $data);
    }
  }

  public function logout()
  {
    $session = session();
    $session->destroy();
    return redirect()->to('/login');
  }

  // Registrasi


}
