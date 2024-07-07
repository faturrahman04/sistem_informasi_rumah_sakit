<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Suster</h1>
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
    <button type="button" class="btn btn-tambah" data-bs-toggle="modal" data-bs-target="#tambahdatasuster">
      Tambah Data
    </button>
    <form action="<?= base_url('/admin/suster/search') ?>" method="get">
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
            <th scope="col">No Suster</th>
            <th scope="col">Phone Number</th>
            <th scope="col">Email</th>
            <th scope="col">Provinsi</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($suster as $databases) : $no++ ?>
            <tr>
              <th scope="row"><?= $no; ?></th>
              <td><?= $databases['nama_suster']; ?></td>
              <td><?= $databases['no_suster']; ?></td>
              <td><?= $databases['telepon_suster']; ?></td>
              <td><?= $databases['email_suster']; ?></td>
              <td><?= $databases['provinsi']; ?></td>
              <td>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateModal<?php echo $databases['id_suster'] ?>">
                  Edit
                </button>
                | <a class="btn btn-danger" href="<?= base_url('admin/suster/delete' . $databases['id_suster']); ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Delete</a>
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>



  <!-- Modal Tambah Data -->
  <div class="modal fade" id="tambahdatasuster" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="border-radius: 8px;">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #ef444d;">
          <h1 class="modal-title fs-5" id="exampleModalLabel" style="font-weight: 600; text-align: center; color: #f2f9ef;">Form Tambah Data Suster</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="/admin/suster/tambahsuster" method="post">
            <div class="mb-3">
              <label for="nama_suster" class="form-label">Nama Lengkap</label>
              <input type="text" class="form-control" id="nama_suster" name="nama_suster" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="no_suster" class="form-label">Nomor Dokter</label>
              <input type="text" class="form-control" id="no_suster" name="no_suster">
            </div>
            <div class="mb-3">
              <label for="telepon_suster" class="form-label">Phone Number</label>
              <input type="text" class="form-control" id="telepon_suster" name="telepon_suster">
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email_suster" name="email_suster">
            </div>
            <div class="mb-3">
              <label for="provinsi" class="form-label">Provinsi</label>
              <input type="text" class="form-control" id="provinsi" name="provinsi">
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
  foreach ($suster as $databases) : $no++ ?>
    <div class="modal fade" id="updateModal<?php echo $databases['id_suster'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header" style="background-color: #ef444d;">
            <h1 class="modal-title fs-5" id="exampleModalLabel" style="color: #f2f9ef; font-weight: 600;">Edit Data</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="<?= base_url('/admin/suster/updatesuster/' . $databases['id_suster']) ?>" method="post">
              <div class="mb-3">
                <label for="nama_suster" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama_suster" name="nama_suster" aria-describedby="emailHelp" value="<?= $databases['nama_suster'] ?>">
              </div>
              <div class="mb-3">
                <label for="no_suster" class="form-label">Nomor Suster</label>
                <input type="text" class="form-control" id="no_suster" name="no_suster" value="<?= $databases['no_suster'] ?>">
              </div>
              <div class="mb-3">
                <label for="telepon_suster" class="form-label">Phone Number</label>
                <input type="text" class="form-control" id="telepon_suster" name="telepon_suster" value="<?= $databases['telepon_suster'] ?>">
              </div>
              <div class="mb-3">
                <label for="email_suster" class="form-label">Email</label>
                <input type="email" class="form-control" id="email_suster" name="email_suster" value="<?= $databases['email_suster'] ?>">
              </div>
              <div class="mb-3">
                <label for="provinsi" class="form-label">Provinsi</label>
                <input type="text" class="form-control" id="provinsi" name="provinsi" value="<?= $databases['provinsi'] ?>">
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