<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title">Detail Wilayah</h4>
        <p class="card-category">
          Menu Detail Wilayah
        </p>
      </div>
      <div class="card-body">
        <a href="<?= base_url('/wilayah'); ?>" class="btn btn-primary">Kembali</a>
        <hr>
        <div class="row">
          <div class="col">
            <img src="/img/<?= $dWilayah->gambar; ?>" width="300" alt="Gambar 1">
          </div>
          <div class="col">
            <p>Di daerah <?= $dWilayah->nama_daerah; ?> Sering terjadi <?= $dWilayah->deskripsi; ?></p>
          </div>
        </div>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead class="text-primary">
              <tr>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>Deskripsi</th>
                <th>Action</th>
              </tr>
            </thead>
            <tr>
              <td><?= $dWilayah->latitude; ?></td>
              <td><?= $dWilayah->longitude; ?></td>
              <td><?= $dWilayah->deskripsi; ?></td>
              <td>
                <a href="/editWilayah/<?= $dWilayah->id; ?>"><i class="bi bi-pencil-fill text-primary fs-5"></i></a>
                <a href="/wilayahDelete/<?= $dWilayah->id; ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus?')"><i class="bi bi-trash3-fill ms-3 remove text-danger fs-5"></i></a>
              </td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>