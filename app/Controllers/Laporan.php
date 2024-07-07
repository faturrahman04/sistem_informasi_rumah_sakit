<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Dokter_model;
use App\Models\Suster_model;
use App\Models\Obat_model;
use App\Models\Kamar_model;
use App\Models\Pasien_model;
use App\Models\Laporan_model;
use Dompdf\Dompdf;

class Laporan extends BaseController
{
  private $Laporan_model;

  public function __construct()
  {
    $this->Laporan_model = new Laporan_model();
  }
  public function index()
  {
    $title = [
      'title' => 'Laporan'
    ];
    $dokterModel = new Dokter_model();
    $susterModel = new Suster_model();
    $obatModel = new Obat_model();
    $kamarModel = new Kamar_model();
    $pasienModel = new Pasien_model();
    $laporanModel = new Laporan_model();

    $data['dokter'] = $dokterModel->findAll();
    $data['suster'] = $susterModel->findAll();
    $data['obat'] = $obatModel->findAll();
    $data['kamar'] = $kamarModel->findAll();
    $data['pasien'] = $pasienModel->findAll();
    $laporanModel = new Laporan_model();
    $data['laporan'] = $laporanModel->getLaporan();

    echo view('Template/Header', $title);
    echo view('laporan_form', $data);
    echo view('Template/Footer');
  }

  public function create()
  {
    $laporanModel = new Laporan_model();

    $data = [
      'id_pasien' => $this->request->getPost('id_pasien'),
      'id_dokter' => $this->request->getPost('id_dokter'),
      'id_suster' => $this->request->getPost('id_suster'),
      'id_obat' => $this->request->getPost('id_obat'),
      'id_kamar' => $this->request->getPost('id_kamar'),
      'tanggal_masuk' => $this->request->getPost('tanggal_masuk'),
      'keterangan' => $this->request->getPost('keterangan'),
    ];

    $laporanModel->insert($data);

    return redirect()->to('/admin/laporan');
  }

  public function deleteLaporan($id_laporan)
  {
    $this->Laporan_model->deleteLaporan($id_laporan);

    return redirect()->to('/admin/laporan')
      ->with('success', 'Item deleted successfully.');
  }

  public function generatePdf($id)
  {
    $laporanModel = new Laporan_model();
    $laporan = $laporanModel->getLaporan($id);

    $laporanModel = new Laporan_model();
    $dokterModel = new Dokter_model();
    $susterModel = new Suster_model();
    $obatModel = new Obat_model();
    $kamarModel = new Kamar_model();
    $pasienModel = new Pasien_model();

    $laporan = $laporanModel->find($id);
    if ($laporan) {
      $laporan['dokter'] = $dokterModel->find($laporan['id_dokter']);
      $laporan['suster'] = $susterModel->find($laporan['id_suster']);
      $laporan['obat'] = $obatModel->find($laporan['id_obat']);
      $laporan['kamar'] = $kamarModel->find($laporan['id_kamar']);
      $laporan['pasien'] = $pasienModel->find($laporan['id_pasien']);
    } else {
      return redirect()->back()->with('error', 'Laporan tidak ditemukan');
    }

    $data['laporan'] = $laporan;

    $html = view('laporan_pdf', $data);

    $dompdf = new Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();
    $dompdf->stream("laporan.pdf", ["Attachment" => 0]);
  }
}
