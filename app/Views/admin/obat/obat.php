<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Obat</h1>
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
    <button type="button" class="btn btn-tambah" data-bs-toggle="modal" data-bs-target="#tambahdataobat">
      Tambah Data
    </button>
    <form action="<?= base_url('/admin/obat/search') ?>" method="get">
      <label for="keyword" class="sr-only">Kata Kunci</label>
      <input type="text" class="form-control" id="keyword" name="keyword" placeholder="Cari Data">
    </form>
  </div>
  <div class="content" style="overflow-x: auto;">
    <div class="container-fluid">
      <?php $no = 0; ?>
      <div>
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama Obat</th>
              <th scope="col">Jenis Obat</th>
              <th scope="col">Kategori Obat</th>
              <th scope="col">Komposisi</th>
              <th scope="col">Dosis</th>
              <th scope="col">Indikasi</th>
              <th scope="col">Tanggal Kadaluarsa</th>
              <th scope="col">Harga</th>
              <th scope="col">Catatan Tambahan</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($obat as $databases) : $no++ ?>
              <tr>
                <th scope="row"><?= $no; ?></th>
                <td><?= $databases['nama_obat']; ?></td>
                <td><?= $databases['jenis_obat']; ?></td>
                <td><?= $databases['kategori_obat']; ?></td>
                <td><?= $databases['komposisi']; ?></td>
                <td><?= $databases['dosis']; ?></td>
                <td><?= $databases['indikasi']; ?></td>
                <td><?= $databases['tgl_kadaluarsa']; ?></td>
                <td><?= $databases['harga']; ?></td>
                <td><?= $databases['catatan_tambahan']; ?></td>
                <td>
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateModal<?php echo $databases['id_obat'] ?>">
                    Edit
                  </button>
                  | <a class="btn btn-danger" href="<?= base_url('admin/obat/delete' . $databases['id_obat']); ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Delete</a>
                </td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>



  <!-- Modal Tambah Data -->
  <div class="modal fade" id="tambahdataobat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="border-radius: 8px;">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #ef444d;">
          <h1 class="modal-title fs-5" id="exampleModalLabel" style="font-weight: 600; text-align: center; color: #f2f9ef;">Form Tambah Data Obat</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="/admin/obat/tambahobat" method="post">
            <div class="mb-3">
              <label for="nama_obat" class="form-label">Nama Obat</label>
              <input type="text" class="form-control" id="nama_obat" name="nama_obat" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="jenis_obat" class="form-label">Jenis Obat</label>
              <select class="form-select" aria-label="Default select example" name="jenis_obat" required>
                <option selected value="">Jenis Obat</option>
                <option value="Tablet">Tablet</option>
                <option value="Kapsul">Kapsul</option>
                <option value="Kapsul">Sirup</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="kategori_obat" class="form-label">Kategori Obat</label>
              <select class="form-select" aria-label="Default select example" name="kategori_obat" required>
                <option selected value="">Kategori Obat</option>
                <option value="Analgesik">Analgesik</option>
                <option value="Antibiotik">Antibiotik</option>
                <option value="Antihistamin">Antihistamin</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="komposisi" class="form-label">Komposisi</label>
              <input type="text" class="form-control" id="komposisi" name="komposisi">
            </div>
            <div class="mb-3">
              <label for="dosis" class="form-label">Dosis</label>
              <input type="text" class="form-control" id="dosis" name="dosis">
            </div>
            <div class="mb-3">
              <label for="indikasi" class="form-label">Indikasi</label>
              <input type="text" class="form-control" id="indikasi" name="indikasi">
            </div>
            <div class="mb-3">
              <label for="tgl_kadaluarsa" class="form-label">Tanggal Kadaluarsa</label>
              <input type="date" class="form-control" id="tgl_kadaluarsa" name="tgl_kadaluarsa">
            </div>
            <div class="mb-3">
              <label for="harga" class="form-label">Harga</label>
              <input type="text" class="form-control" id="harga" name="harga">
            </div>
            <div class="mb-3">
              <label for="catatan_tambahan" class="form-label">Catatan Tambahan</label>
              <input type="text" class="form-control" id="catatan_tambahan" name="catatan_tambahan">
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
  foreach ($obat as $databases) : $no++ ?>
    <div class="modal fade" id="updateModal<?php echo $databases['id_obat'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header" style="background-color: #ef444d;">
            <h1 class="modal-title fs-5" id="exampleModalLabel" style="color: #f2f9ef; font-weight: 600;">Edit Data</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="<?= base_url('/admin/obat/updateobat/' . $databases['id_obat']) ?>" method="post">
              <div class="mb-3">
                <label for="nama_obat" class="form-label">Nama Obat</label>
                <input type="text" class="form-control" id="nama_obat" name="nama_obat" aria-describedby="emailHelp" value="<?= $databases['nama_obat'] ?>">
              </div>
              <div class="mb-3">
                <label for="jenis_obat" class="form-label">Jenis Obat</label>
                <select class="form-select" aria-label="Default select example" name="jenis_obat" required>
                  <option selected value="">Jenis Obat</option>
                  <option value="Tablet">Tablet</option>
                  <option value="Kapsul">Kapsul</option>
                  <option value="Kapsul">Sirup</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="kategori_obat" class="form-label">Kategori Obat</label>
                <select class="form-select" aria-label="Default select example" name="kategori_obat" required>
                  <option selected value="">Kategori Obat</option>
                  <option value="Analgesik">Analgesik</option>
                  <option value="Antibiotik">Antibiotik</option>
                  <option value="Antihistamin">Antihistamin</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="komposisi" class="form-label">Komposisi</label>
                <input type="text" class="form-control" id="komposisi" name="komposisi" value="<?= $databases['komposisi'] ?>">
              </div>
              <div class="mb-3">
                <label for="dosis" class="form-label">Dosis</label>
                <input type="text" class="form-control" id="dosis" name="dosis" value="<?= $databases['dosis'] ?>">
              </div>
              <div class="mb-3">
                <label for="indikasi" class="form-label">Indikasi</label>
                <input type="text" class="form-control" id="indikasi" name="indikasi" value="<?= $databases['indikasi'] ?>">
              </div>
              <div class="mb-3">
                <label for="tgl_kadaluarsa" class="form-label">Tanggal Kadaluarsa</label>
                <input type="date" class="form-control" id="tgl_kadaluarsa" name="tgl_kadaluarsa" value="<?= $databases['tgl_kadaluarsa'] ?>">
              </div>
              <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="text" class="form-control" id="harga" name="harga" value="<?= $databases['harga'] ?>">
              </div>
              <div class="mb-3">
                <label for="catatan_tambahan" class="form-label">Catatan Tambahan</label>
                <input type="text" class="form-control" id="catatan_tambahan" name="catatan_tambahan" value="<?= $databases['catatan_tambahan'] ?>">
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