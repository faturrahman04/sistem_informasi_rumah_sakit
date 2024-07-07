<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Dokter</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <!-- Button trigger modal -->
  <div class="keyword-box">
    <button type="button" class="btn btn-tambah" data-bs-toggle="modal" data-bs-target="#tambahdatadokter">
      Tambah Data
    </button>
    <form action="<?= base_url('/admin/dokter/search') ?>" method="get">
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
            <th scope="col">Nama Lengkap</th>
            <th scope="col">No Dokter</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">Phone Number</th>
            <th scope="col">Provinsi</th>
            <th scope="col">Spesialisasi</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($dokter as $databases) : $no++ ?>
            <tr>
              <th scope="row"><?= $no; ?></th>
              <td><?= $databases['nama_dokter']; ?></td>
              <td><?= $databases['no_dokter']; ?></td>
              <td><?= $databases['jenkel_dokter']; ?></td>
              <td><?= $databases['no_telepon']; ?></td>
              <td><?= $databases['alamat']; ?></td>
              <td><?= $databases['spesialisasi']; ?></td>
              <td>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateModal<?php echo $databases['id_dokter'] ?>">
                  Edit
                </button>
                | <a class="btn btn-danger" href="<?= base_url('admin/dokter/delete' . $databases['id_dokter']); ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Delete</a>
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>



  <!-- Modal Tambah Data -->
  <div class="modal fade" id="tambahdatadokter" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="border-radius: 8px;">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #ef444d;">
          <h1 class="modal-title fs-5" id="exampleModalLabel" style="font-weight: 600; text-align: center; color: #f2f9ef;">Form Tambah Data Dokter</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="/admin/dokter/tambahdokter" method="post">
            <div class="mb-3">
              <label for="nama_dokter" class="form-label">Nama Lengkap</label>
              <input type="text" class="form-control" id="nama_dokter" name="nama_dokter" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="no_dokter" class="form-label">Nomor Dokter</label>
              <input type="text" class="form-control" id="no_dokter" name="no_dokter">
            </div>
            <div class="mb-3">
              <label for="jenkel_dokter" class="form-label">Jenis Kelamin</label>
              <select class="form-select" aria-label="Default select example" name="jenkel_dokter" required>
                <option selected>Jenis Kelamin</option>
                <option value="Laki - Laki">Laki - Laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="no_telepon" class="form-label">Phone Number</label>
              <input type="text" class="form-control" id="no_telepon" name="no_telepon">
            </div>
            <div class="mb-3">
              <label for="alamat" class="form-label">Provinsi</label>
              <input type="text" class="form-control" id="alamat" name="alamat">
            </div>
            <div class="mb-3">
              <label for="spesialisasi" class="form-label">Spesialisasi</label>
              <select class="form-select" aria-label="Default select example" name="spesialisasi" required>
                <option selected>Spesialisasi</option>
                <option value="Dermatologi">Dermatologi</option>
                <option value="Neurologi">Neurologi</option>
                <option value="Imunologi">Imunologi</option>
                <option value="Psikiatri">Psikiatri</option>
                <option value="Ortopedi">Ortopedi</option>
                <option value="Bedah Umum">Bedah Umum</option>
                <option value="Nefrologi">Nefrologi</option>
              </select>
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




  <!-- Modal Update -->
  <?php $no = 0;
  foreach ($dokter as $databases) : $no++ ?>
    <div class="modal fade" id="updateModal<?php echo $databases['id_dokter'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header" style="background-color: #ef444d;">
            <h1 class="modal-title fs-5" id="exampleModalLabel" style="color: #f2f9ef; font-weight: 600;">Edit Data</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="<?= base_url('/admin/dokter/updatedokter/' . $databases['id_dokter']) ?>" method="post">
              <div class="mb-3">
                <label for="nama_dokter" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama_dokter" name="nama_dokter" aria-describedby="emailHelp" value="<?= $databases['nama_dokter'] ?>">
              </div>
              <div class="mb-3">
                <label for="no_dokter" class="form-label">Nomor Dokter</label>
                <input type="text" class="form-control" id="no_dokter" name="no_dokter" value="<?= $databases['no_dokter'] ?>">
              </div>
              <div class="mb-3">
                <label for="jenkel_dokter" class="form-label">Jenis Kelamin</label>
                <select class="form-select" aria-label="Default select example" name="jenkel_dokter" required>
                  <option selected value="">Jenis Kelamin</option>
                  <option value="Laki - Laki">Laki - Laki</option>
                  <option value="Perempuan">Perempuan</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="no_telepon" class="form-label">Phone Number</label>
                <input type="text" class="form-control" id="no_telepon" name="no_telepon" value="<?= $databases['no_telepon'] ?>">
              </div>
              <div class="mb-3">
                <label for="alamat" class="form-label">Provinsi</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $databases['alamat'] ?>">
              </div>
              <div class="mb-3">
                <label for="spesialisasi" class="form-label">Spesialisasi</label>
                <select class="form-select" aria-label="Default select example" name="spesialisasi" required>
                  <option selected value="">Spesialisasi</option>
                  <option value="Dermatologi">Dermatologi</option>
                  <option value="Neurologi">Neurologi</option>
                  <option value="Imunologi">Imunologi</option>
                  <option value="Psikiatri">Psikiatri</option>
                  <option value="Ortopedi">Ortopedi</option>
                  <option value="Bedah Umum">Bedah Umum</option>
                  <option value="Nefrologi">Nefrologi</option>
                </select>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Simpan Pembaruan</button>
          </div>
          </form>
        </div>
      </div>
    </div>
  <?php endforeach ?>