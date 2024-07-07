<?php

namespace App\Controllers;

use App\Models\Dokter_model;
use App\Models\Pasien_model;
use App\Models\Suster_model;
use App\Models\Kamar_model;
use App\Models\Obat_model;

class Admin extends BaseController
{
  private $Dokter_model, $Suster_model, $Pasien_model, $Kamar_model, $Obat_model;
  public function __construct()
  {
    $this->Dokter_model = new Dokter_model();
    $this->Suster_model = new Suster_model();
    $this->Pasien_model = new Pasien_model();
    $this->Kamar_model = new Kamar_model();
    $this->Obat_model = new Obat_model();
  }
  public function homeAdmin()
  {
    $data = [
      'title' => 'Home | Admin Page',
    ];
    echo view('Template/Header', $data);
    echo view('admin/home_admin');
    echo view('Template/Footer');
  }

  // dokter controller
  public function dokter()
  {
    $data = [
      'title' => 'Daftar Dokter',
    ];
    $Dokter_model = new Dokter_model();
    $databases['dokter'] = $Dokter_model->findAll();
    $databases['dokter'] = $this->Dokter_model->getDokter();
    echo view('Template/Header', $data);
    echo view('admin/dokter/dokter', $databases);
    echo view('Template/Footer');
  }

  public function tambahDokter()
  {
    $Dokter_model = new Dokter_model();
    $data = [
      'nama_dokter' => $this->request->getPost('nama_dokter'),
      'no_dokter' => $this->request->getPost('no_dokter'),
      'jenkel_dokter' => $this->request->getPost('jenkel_dokter'),
      'no_telepon' => $this->request->getPost('no_telepon'),
      'alamat' => $this->request->getPost('alamat'),
      'spesialisasi' => $this->request->getPost('spesialisasi'),
    ];

    $Dokter_model->insert($data);
    return redirect()->to('/admin/dokter');
  }

  public function updateDokter($id_dokter)
  {
    $data = [
      'nama_dokter' => $this->request->getPost('nama_dokter'),
      'no_dokter' => $this->request->getPost('no_dokter'),
      'jenkel_dokter' => $this->request->getPost('jenkel_dokter'),
      'no_telepon' => $this->request->getPost('no_telepon'),
      'alamat' => $this->request->getPost('alamat'),
      'spesialisasi' => $this->request->getPost('spesialisasi'),
    ];
    $Dokter_model = new Dokter_model();
    $Dokter_model->update($id_dokter, $data);
    return redirect()->to('/admin/dokter')
      ->with('success', 'Item updated successfully.');
  }

  public function deleteDokter($id_dokter)
  {
    $this->Dokter_model->deleteDokter($id_dokter);

    return redirect()->to('/admin/dokter')
      ->with('success', 'Item deleted successfully.');
  }

  public function viewdokter()
  {
    $databases['dokter'] = $this->Dokter_model->getDokter();
    $data = [
      'title' => 'Admin | Insert Data Dokter',
    ];
    echo view('Template/Header', $data);
    echo view('admin/dokter/view', $databases);
    echo view('Template/Footer');
  }

  public function searchdokter()
  {
    $keyword = $this->request->getGet('keyword');

    $Dokter_model = new Dokter_model();

    if (!empty($keyword)) {
      $databases['dokter'] = $Dokter_model->like('nama_dokter', $keyword)->findAll();
      $databases['keyword'] = $keyword;
    } else {
      $databases['dokter'] = $Dokter_model->findAll();
      $databases['keyword'] = '';
    }

    $data = [
      'title' => 'Search'
    ];
    echo view('Template/Header', $data);
    echo view('admin/dokter/view', $databases);
    echo view('Template/Footer');
  }
  // dokter controller

  // Suster controller
  public function suster()
  { //last
    $data = [
      'title' => 'Daftar Suster',
    ];
    $databases['suster'] = $this->Suster_model->getSuster();
    echo view('Template/Header', $data);
    echo view('admin/suster/suster', $databases);
    echo view('Template/Footer');
  }

  public function tambahSuster()
  {
    $Suster_model = new Suster_model();
    $data = [
      'nama_suster' => $this->request->getPost('nama_suster'),
      'no_suster' => $this->request->getPost('no_suster'),
      'telepon_suster' => $this->request->getPost('telepon_suster'),
      'email_suster' => $this->request->getPost('email_suster'),
      'provinsi' => $this->request->getPost('provinsi'),
    ];

    $Suster_model->insert($data);
    return redirect()->to('/admin/suster');
  }

  public function updateSuster($id_suster)
  {
    $data = [
      'nama_suster' => $this->request->getPost('nama_suster'),
      'no_suster' => $this->request->getPost('no_suster'),
      'telepon_suster' => $this->request->getPost('telepon_suster'),
      'email_suster' => $this->request->getPost('email_suster'),
      'provinsi' => $this->request->getPost('provinsi'),
    ];
    $Suster_model = new Suster_model();
    $Suster_model->update($id_suster, $data);
    return redirect()->to('/admin/suster')
      ->with('success', 'Item updated successfully.');
  }

  public function deleteSuster($id_suster)
  {
    $this->Suster_model->deleteSuster($id_suster);

    return redirect()->to('/admin/suster')
      ->with('success', 'Item deleted successfully.');
  }

  public function viewsuster()
  {
    $databases['suster'] = $this->Suster_model->getSuster();
    $data = [
      'title' => 'Admin | Insert Data Suster',
    ];
    echo view('Template/Header', $data);
    echo view('admin/suster/view', $databases);
    echo view('Template/Footer');
  }

  public function searchsuster()
  {
    $keyword = $this->request->getGet('keyword');

    $Suster_model = new Suster_model();

    if (!empty($keyword)) {
      $databases['suster'] = $Suster_model->like('nama_suster', $keyword)->findAll();
      $databases['keyword'] = $keyword;
    } else {
      $databases['suster'] = $Suster_model->findAll();
      $databases['keyword'] = '';
    }

    $data = [
      'title' => 'Search'
    ];
    echo view('Template/Header', $data);
    echo view('admin/suster/view', $databases);
    echo view('Template/Footer');
  }
  // Suster controller

  // Pasien controller
  public function pasien()
  {
    $data = [
      'title' => 'Daftar Pasien',
    ];
    $Pasien_model = new Pasien_model();
    $databases['pasien'] = $Pasien_model->findAll();
    $databases['pasien'] = $this->Pasien_model->getPasien();
    echo view('Template/Header', $data);
    echo view('admin/pasien/pasien', $databases);
    echo view('Template/Footer');
  }

  public function tambahPasien()
  {
    $Pasien_model = new Pasien_model();
    $data = [
      'nama_pasien' => $this->request->getPost('nama_pasien'),
      'no_pasien' => $this->request->getPost('no_pasien'),
      'lahir_pasien' => $this->request->getPost('lahir_pasien'),
      'jenkel_pasien' => $this->request->getPost('jenkel_pasien'),
      'alamat_pasien' => $this->request->getPost('alamat_pasien'),
      'telpon_pasien' => $this->request->getPost('telpon_pasien'),
      'goldar_pasien' => $this->request->getPost('goldar_pasien'),
    ];

    $Pasien_model->insert($data);
    return redirect()->to('/admin/pasien');
  }

  public function updatePasien($id_pasien)
  {
    $data = [
      'nama_pasien' => $this->request->getPost('nama_pasien'),
      'no_pasien' => $this->request->getPost('no_pasien'),
      'lahir_pasien' => $this->request->getPost('lahir_pasien'),
      'jenkel_pasien' => $this->request->getPost('jenkel_pasien'),
      'alamat_pasien' => $this->request->getPost('alamat_pasien'),
      'telpon_pasien' => $this->request->getPost('telpon_pasien'),
      'goldar_pasien' => $this->request->getPost('goldar_pasien'),
    ];
    $Pasien_model = new Pasien_model();
    $Pasien_model->update($id_pasien, $data);
    return redirect()->to('/admin/pasien')
      ->with('success', 'Item updated successfully.');
  }

  public function deletePasien($id_pasien)
  {
    $this->Pasien_model->deletePasien($id_pasien);

    return redirect()->to('/admin/pasien')
      ->with('success', 'Item deleted successfully.');
  }

  public function viewpasien()
  {
    $databases['pasien'] = $this->Suster_model->getPasien();
    $data = [
      'title' => 'Admin | Insert Data Pasien',
    ];
    echo view('Template/Header', $data);
    echo view('admin/pasien/view', $databases);
    echo view('Template/Footer');
  }

  public function searchpasien()
  {
    $keyword = $this->request->getGet('keyword');

    $Pasien_model = new Pasien_model();

    if (!empty($keyword)) {
      $databases['pasien'] = $Pasien_model->like('nama_pasien', $keyword)->findAll();
      $databases['keyword'] = $keyword;
    } else {
      $databases['pasien'] = $Pasien_model->findAll();
      $databases['keyword'] = '';
    }

    $data = [
      'title' => 'Search'
    ];
    echo view('Template/Header', $data);
    echo view('admin/pasien/view', $databases);
    echo view('Template/Footer');
  }
  // Pasien controller

  // Kamar controller
  public function kamar()
  {
    $data = [
      'title' => 'Daftar Kamar',
    ];
    $Kamar_model = new Kamar_model();
    $databases['kamar'] = $Kamar_model->findAll();
    $databases['kamar'] = $this->Kamar_model->getkamar();
    echo view('Template/Header', $data);
    echo view('admin/kamar/kamar', $databases);
    echo view('Template/Footer');
  }

  public function tambahKamar()
  {
    $Kamar_model = new Kamar_model();
    $data = [
      'no_kamar' => $this->request->getPost('no_kamar'),
      'jenis_kamar' => $this->request->getPost('jenis_kamar'),
      'lokasi_kamar' => $this->request->getPost('lokasi_kamar'),
      'tarif' => $this->request->getPost('tarif'),
      'fasilitas' => $this->request->getPost('fasilitas'),
    ];

    $Kamar_model->insert($data);
    return redirect()->to('/admin/kamar');
  }

  public function updateKamar($id_kamar)
  {
    $data = [
      'no_kamar' => $this->request->getPost('no_kamar'),
      'jenis_kamar' => $this->request->getPost('jenis_kamar'),
      'lokasi_kamar' => $this->request->getPost('lokasi_kamar'),
      'tarif' => $this->request->getPost('tarif'),
      'fasilitas' => $this->request->getPost('fasilitas'),
    ];
    $Kamar_model = new Kamar_model();
    $Kamar_model->update($id_kamar, $data);
    return redirect()->to('/admin/kamar')
      ->with('success', 'Item updated successfully.');
  }

  public function deleteKamar($id_kamar)
  {
    $this->Kamar_model->deleteKamar($id_kamar);

    return redirect()->to('/admin/kamar')
      ->with('success', 'Item deleted successfully.');
  }

  public function viewkamar()
  {
    $databases['kamar'] = $this->Kamar_model->getKamar();
    $data = [
      'title' => 'Admin | Insert Data Kamar',
    ];
    echo view('Template/Header', $data);
    echo view('admin/kamar/view', $databases);
    echo view('Template/Footer');
  }

  public function searchkamar()
  {
    $keyword = $this->request->getGet('keyword');

    $Kamar_model = new Kamar_model();

    if (!empty($keyword)) {
      $databases['kamar'] = $Kamar_model->like('no_kamar', $keyword)->findAll();
      $databases['keyword'] = $keyword;
    } else {
      $databases['kamar'] = $Kamar_model->findAll();
      $databases['keyword'] = '';
    }

    $data = [
      'title' => 'Search'
    ];
    echo view('Template/Header', $data);
    echo view('admin/kamar/view', $databases);
    echo view('Template/Footer');
  }
  // Kamar controller

  // Obat Controller
  public function obat()
  {
    $data = [
      'title' => 'Daftar Obat',
    ];
    $Obat_model = new Obat_model();
    $databases['obat'] = $Obat_model->findAll();
    $databases['obat'] = $this->Obat_model->getObat();
    echo view('Template/Header', $data);
    echo view('admin/obat/obat', $databases);
    echo view('Template/Footer');
  }

  public function tambahObat()
  {
    $Obat_model = new Obat_model();
    $data = [
      'nama_obat' => $this->request->getPost('nama_obat'),
      'jenis_obat' => $this->request->getPost('jenis_obat'),
      'kategori_obat' => $this->request->getPost('kategori_obat'),
      'komposisi' => $this->request->getPost('komposisi'),
      'dosis' => $this->request->getPost('dosis'),
      'indikasi' => $this->request->getPost('indikasi'),
      'tgl_kadaluarsa' => $this->request->getPost('tgl_kadaluarsa'),
      'harga' => $this->request->getPost('harga'),
      'catatan_tambahan' => $this->request->getPost('catatan_tambahan'),
    ];

    $Obat_model->insert($data);
    return redirect()->to('/admin/obat');
  }

  public function updateObat($id_obat)
  {
    $data = [
      'nama_obat' => $this->request->getPost('nama_obat'),
      'jenis_obat' => $this->request->getPost('jenis_obat'),
      'kategori_obat' => $this->request->getPost('kategori_obat'),
      'komposisi' => $this->request->getPost('komposisi'),
      'dosis' => $this->request->getPost('dosis'),
      'indikasi' => $this->request->getPost('indikasi'),
      'tgl_kadaluarsa' => $this->request->getPost('tgl_kadaluarsa'),
      'harga' => $this->request->getPost('harga'),
      'catatan_tambahan' => $this->request->getPost('catatan_tambahan'),
    ];
    $Obat_model = new Obat_model();
    $Obat_model->update($id_obat, $data);
    return redirect()->to('/admin/obat')
      ->with('success', 'Item updated successfully.');
  }

  public function deleteObat($id_obat)
  {
    $this->Obat_model->deleteObat($id_obat);

    return redirect()->to('/admin/obat')
      ->with('success', 'Item deleted successfully.');
  }

  public function viewobat()
  {
    $databases['obat'] = $this->Obat_model->getObat();
    $data = [
      'title' => 'Admin | Insert Data Obat',
    ];
    echo view('Template/Header', $data);
    echo view('admin/obat/view', $databases);
    echo view('Template/Footer');
  }

  public function searchobat()
  {
    $keyword = $this->request->getGet('keyword');

    $Obat_model = new Obat_model();

    if (!empty($keyword)) {
      $databases['obat'] = $Obat_model->like('nama_obat', $keyword)->findAll();
      $databases['keyword'] = $keyword;
    } else {
      $databases['obat'] = $Obat_model->findAll();
      $databases['keyword'] = '';
    }

    $data = [
      'title' => 'Search'
    ];
    echo view('Template/Header', $data);
    echo view('admin/obat/view', $databases);
    echo view('Template/Footer');
  }
  // Obat Controller
}
