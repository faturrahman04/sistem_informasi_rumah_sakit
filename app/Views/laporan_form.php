<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Laporan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <div class="keyword-box">
    <button type="button" class="btn btn-tambah" data-bs-toggle="modal" data-bs-target="#tambahdatalaporan">
      Tambah Data
    </button>
    <form action="<?= base_url('/admin/laporan/search') ?>" method="get">
      <label for="keyword" class="sr-only">Kata Kunci</label>
      <input type="text" class="form-control" id="keyword" name="keyword" placeholder="Cari Data">
    </form>
  </div>
  <div class="content">
    <div class="container-fluid">
      <?php $no = 0; ?>
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Dokter</th>
            <th scope="col">Suster</th>
            <th scope="col">Obat</th>
            <th scope="col">Kamar</th>
            <th scope="col">Pasien</th>
            <th scope="col">Keterangan</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($laporan as $l) : $no++ ?>
            <tr>
              <th scope="row"><?= $no; ?></th>
              <td><?= $l['tanggal_masuk']; ?></td>
              <td><?= $l['nama_dokter']; ?></td>
              <td><?= $l['nama_suster']; ?></td>
              <td><?= $l['nama_obat']; ?></td>
              <td><?= $l['no_kamar']; ?></td>
              <td><?= $l['nama_pasien']; ?></td>
              <td><?= $l['keterangan']; ?></td>
              <td>
                <a class="btn btn-primary" href="/laporan/generatePdf/<?= $l['id_laporan'] ?>">PDF</a>
                | <a class="btn btn-danger" href="<?= base_url('admin/laporan/delete' . $l['id_laporan']); ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Delete</a>
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>



  <!-- Modal Tambah Data -->
  <div class="modal fade" id="tambahdatalaporan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="border-radius: 8px;">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #ef444d;">
          <h1 class="modal-title fs-5" id="exampleModalLabel" style="font-weight: 600; text-align: center; color: #f2f9ef;">Form Tambah Data Lpaoran</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="/laporan/create" method="post">
            <div class="mb-3">
              <label for="id_dokter" class="form-label">Dokter</label>
              <select name="id_dokter" id="id_dokter" class="form-select">
                <?php foreach ($dokter as $d) : ?>
                  <option value="<?= $d['id_dokter'] ?>"><?= $d['nama_dokter'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="mb-3">
              <label for="id_suster" class="form-label">Suster</label>
              <select name="id_suster" id="id_suster" class="form-select">
                <?php foreach ($suster as $s) : ?>
                  <option value="<?= $s['id_suster'] ?>"><?= $s['nama_suster'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="mb-3">
              <label for="id_obat" class="form-label">Obat</label>
              <select name="id_obat" id="id_obat" class="form-select">
                <?php foreach ($obat as $o) : ?>
                  <option value="<?= $o['id_obat'] ?>"><?= $o['nama_obat'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="mb-3">
              <label for="id_kamar" class="form-label">Kamar</label>
              <select name="id_kamar" id="id_kamar" class="form-select">
                <?php foreach ($kamar as $k) : ?>
                  <option value="<?= $k['id_kamar'] ?>"><?= $k['no_kamar'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="mb-3">
              <label for="id_pasien" class="form-label">Pasien</label>
              <select name="id_pasien" id="id_pasien" class="form-select">
                <?php foreach ($pasien as $p) : ?>
                  <option value="<?= $p['id_pasien'] ?>"><?= $p['nama_pasien'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="mb-3">
              <label for="tanggal_masuk" class="form-label">Tanggal</label>
              <input type="datetime-local" class="form-control" name="tanggal_masuk" id="tanggal_masuk">
            </div>
            <div class="mb-3">
              <label for="keterangan" class="form-label">Keterangan</label>
              <input type="text" class="form-control" name="keterangan" id="keterangan">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Tambah Data</button>
        </div>
        </form>
      </div>
    </div>
  </div>