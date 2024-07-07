<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Pasien</h1>
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
    <button type="button" class="btn btn-tambah" data-bs-toggle="modal" data-bs-target="#tambahdatapasien">
      Tambah Data
    </button>
    <form action="<?= base_url('/admin/pasien/search') ?>" method="get">
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
            <th scope="col">No Pasien</th>
            <th scope="col">Tanggal Lahir</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">Provinsi</th>
            <th scope="col">Phone Number</th>
            <th scope="col">Golongan Darah</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($pasien as $databases) : $no++ ?>
            <tr>
              <th scope="row"><?= $no; ?></th>
              <td><?= $databases['nama_pasien']; ?></td>
              <td><?= $databases['no_pasien']; ?></td>
              <td><?= $databases['lahir_pasien']; ?></td>
              <td><?= $databases['jenkel_pasien']; ?></td>
              <td><?= $databases['alamat_pasien']; ?></td>
              <td><?= $databases['telpon_pasien']; ?></td>
              <td><?= $databases['goldar_pasien']; ?></td>
              <td>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateModal<?php echo $databases['id_pasien'] ?>">
                  Edit
                </button>
                | <a class="btn btn-danger" href="<?= base_url('admin/pasien/delete' . $databases['id_pasien']); ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Delete</a>
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>



  <!-- Modal Tambah Data -->
  <div class="modal fade" id="tambahdatapasien" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="border-radius: 8px;">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #ef444d;">
          <h1 class="modal-title fs-5" id="exampleModalLabel" style="font-weight: 600; text-align: center; color: #f2f9ef;">Form Tambah Data Pasien</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="/admin/pasien/tambahpasien" method="post">
            <div class="mb-3">
              <label for="nama_pasien" class="form-label">Nama Lengkap</label>
              <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="no_pasien" class="form-label">Nomor Pasien</label>
              <input type="text" class="form-control" id="no_pasien" name="no_pasien">
            </div>
            <div class="mb-3">
              <label for="lahir_pasien" class="form-label">Tanggal Lahir</label>
              <input type="date" class="form-control" id="lahir_pasien" name="lahir_pasien">
            </div>
            <div class="mb-3">
              <label for="jenkel_pasien" class="form-label">Jenis Kelamin</label>
              <select class="form-select" aria-label="Default select example" name="jenkel_pasien" required>
                <option selected>Jenis Kelamin</option>
                <option value="Laki - Laki">Laki - Laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="alamat_pasien" class="form-label">Provinsi</label>
              <input type="text" class="form-control" id="alamat_pasien" name="alamat_pasien">
            </div>
            <div class="mb-3">
              <label for="telpon_pasien" class="form-label">Phone Number</label>
              <input type="text" class="form-control" id="telpon_pasien" name="telpon_pasien">
            </div>
            <div class="mb-3">
              <label for="goldar_pasien" class="form-label">Golongan Darah</label>
              <input type="text" class="form-control" id="goldar_pasien" name="goldar_pasien">
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
  foreach ($pasien as $databases) : $no++ ?>
    <div class="modal fade" id="updateModal<?php echo $databases['id_pasien'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header" style="background-color: #ef444d;">
            <h1 class="modal-title fs-5" id="exampleModalLabel" style="color: #f2f9ef; font-weight: 600;">Edit Data</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="<?= base_url('/admin/pasien/updatepasien/' . $databases['id_pasien']) ?>" method="post">
              <div class="mb-3">
                <label for="nama_pasien" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" aria-describedby="emailHelp" value="<?= $databases['nama_pasien'] ?>">
              </div>
              <div class="mb-3">
                <label for="no_pasien" class="form-label">Nomor Pasien</label>
                <input type="text" class="form-control" id="no_pasien" name="no_pasien" value="<?= $databases['no_pasien'] ?>">
              </div>
              <div class="mb-3">
                <label for="lahir_pasien" class="form-label">Nomor Pasien</label>
                <input type="date" class="form-control" id="lahir_pasien" name="lahir_pasien" value="<?= $databases['lahir_pasien'] ?>">
              </div>
              <div class="mb-3">
                <label for="jenkel_pasien" class="form-label">Jenis Kelamin</label>
                <select class="form-select" aria-label="Default select example" name="jenkel_pasien" required>
                  <option selected value="">Jenis Kelamin</option>
                  <option value="Laki - Laki">Laki - Laki</option>
                  <option value="Perempuan">Perempuan</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="alamat_pasien" class="form-label">Provinsi</label>
                <input type="text" class="form-control" id="alamat_pasien" name="alamat_pasien" value="<?= $databases['alamat_pasien'] ?>">
              </div>
              <div class="mb-3">
                <label for="telpon_pasien" class="form-label">Phone Number</label>
                <input type="text" class="form-control" id="telpon_pasien" name="telpon_pasien" value="<?= $databases['telpon_pasien'] ?>">
              </div>
              <div class="mb-3">
                <label for="goldar_pasien" class="form-label">Provinsi</label>
                <input type="text" class="form-control" id="goldar_pasien" name="goldar_pasien" value="<?= $databases['goldar_pasien'] ?>">
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