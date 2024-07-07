<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Kamar</h1>
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
    <button type="button" class="btn btn-tambah" data-bs-toggle="modal" data-bs-target="#tambahdatakamar">
      Tambah Data
    </button>
    <form action="<?= base_url('/admin/kamar/search') ?>" method="get">
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
            <th scope="col">No Kamar</th>
            <th scope="col">Jenis Kamar</th>
            <th scope="col">Lokasi Kamar</th>
            <th scope="col">Tarif per Malam</th>
            <th scope="col">Fasilitas</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($kamar as $databases) : $no++ ?>
            <tr>
              <th scope="row"><?= $no; ?></th>
              <td><?= $databases['no_kamar']; ?></td>
              <td><?= $databases['jenis_kamar']; ?></td>
              <td><?= $databases['lokasi_kamar']; ?></td>
              <td><?= $databases['tarif']; ?></td>
              <td><?= $databases['fasilitas']; ?></td>
              <td>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateModal<?php echo $databases['id_kamar'] ?>">
                  Edit
                </button>
                | <a class="btn btn-danger" href="<?= base_url('admin/kamar/delete' . $databases['id_kamar']); ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Delete</a>
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>



  <!-- Modal Tambah Data -->
  <div class="modal fade" id="tambahdatakamar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="border-radius: 8px;">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #ef444d;">
          <h1 class="modal-title fs-5" id="exampleModalLabel" style="font-weight: 600; text-align: center; color: #f2f9ef;">Form Tambah Data Kamar</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="/admin/kamar/tambahkamar" method="post">
            <div class="mb-3">
              <label for="no_kamar" class="form-label">Nomor Kamar</label>
              <input type="text" class="form-control" id="no_kamar" name="no_kamar" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="jenis_kamar" class="form-label">Jenis Kamar</label>
              <select class="form-select" aria-label="Default select example" name="jenis_kamar" required>
                <option selected value="">Jenis Kamar</option>
                <option value="VIP">VIP</option>
                <option value="Kelas 1">Kelas 1</option>
                <option value="Kelas 2">Kelas 2</option>
                <option value="Kelas 3">Kelas 3</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="lokasi_kamar" class="form-label">Lokasi Kamar</label>
              <input type="text" class="form-control" id="lokasi_kamar" name="lokasi_kamar">
            </div>

            <div class="mb-3">
              <label for="tarif" class="form-label">Tarif per Malam</label>
              <input type="text" class="form-control" id="tarif" name="tarif">
            </div>
            <div class="mb-3">
              <label for="fasilitas" class="form-label">Fasilitas</label>
              <input type="text" class="form-control" id="fasilitas" name="fasilitas">
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
  foreach ($kamar as $databases) : $no++ ?>
    <div class="modal fade" id="updateModal<?php echo $databases['id_kamar'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header" style="background-color: #ef444d;">
            <h1 class="modal-title fs-5" id="exampleModalLabel" style="color: #f2f9ef; font-weight: 600;">Edit Data</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="<?= base_url('/admin/kamar/updatekamar/' . $databases['id_kamar']) ?>" method="post">
              <div class="mb-3">
                <label for="no_kamar" class="form-label">Nomor Kamar</label>
                <input type="text" class="form-control" id="no_kamar" name="no_kamar" aria-describedby="emailHelp" value="<?= $databases['no_kamar'] ?>">
              </div>
              <div class="mb-3">
                <label for="jenis_kamar" class="form-label">Jenis Kamar</label>
                <select class="form-select" aria-label="Default select example" name="jenis_kamar" required>
                  <option selected value="">Jenis Kamar</option>
                  <option value="VIP">VIP</option>
                  <option value="Kelas 1">Kelas 1</option>
                  <option value="Kelas 2">Kelas 2</option>
                  <option value="Kelas 3">Kelas 3</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="lokasi_kamar" class="form-label">Lokasi Kamar</label>
                <input type="text" class="form-control" id="lokasi_kamar" name="lokasi_kamar" value="<?= $databases['lokasi_kamar'] ?>">
              </div>

              <div class="mb-3">
                <label for="tarif" class="form-label">Tarif</label>
                <input type="text" class="form-control" id="tarif" name="tarif" value="<?= $databases['tarif'] ?>">
              </div>
              <div class="mb-3">
                <label for="fasilitas" class="form-label">Fasilitas</label>
                <input type="text" class="form-control" id="fasilitas" name="fasilitas" value="<?= $databases['fasilitas'] ?>">
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