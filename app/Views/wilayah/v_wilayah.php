<?php
$csv = [
  'name' => 'csv',
  'id'   => 'csv'
];

$nama_daerah = [
  'name' => 'nama_daerah',
  'id'   => 'nama_daerah',
  'class' => 'form-control text-dark fw-bold',
  'value' => null,
  'placeholder' => 'Daerah/Jalan'
];

$lat = [
  'name' => 'latitude',
  'id'   => 'latitude',
  'class' => 'form-control text-dark fw-bold',
  'value' => null,
  'placeholder' => 'latitude'
];

$long = [
  'name' => 'longitude',
  'id'   => 'longitude',
  'class' => 'form-control text-dark fw-bold',
  'value' => null,
  'placeholder' => 'longitude'
];

$desk = [
  'name' => 'deskripsi',
  'id'   => 'deskripsi',
  'class' => 'form-control text-dark fw-bold',
  'value' => null,
  'placeholder' => 'deskripsi'
];

$submit = [
  'name'  => 'submit',
  'id'    => 'submit',
  'value' => 'Submit',
  'class' => 'btn btn-primary',
  'type'  => 'submit'
];
?>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title">Data Wilayah</h4>
        <p class="card-category">
          Menu Data Wilayah
        </p>
      </div>
      <div class="card-body">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
          Tambah Data
        </button>
        <hr>

        <?php if (session()->getFlashdata('msg')) : ?>
          <div class="alert alert-success text-dark" role="alert">
            <?= session()->getFlashdata('msg'); ?>
          </div>
        <?php endif; ?>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Wilayah</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form action="/wilayah_data_save" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <?= form_label('Provinsi', 'provinsi'); ?><br>
                    <select id="provinsi" class="form-control text-dark fw-bold p-2" name="provinsi" aria-readonly="true">
                      <?php foreach ($prov as $row) : ?>
                        <option value="<?= $row->provinsi_id; ?>"><?= $row->nama; ?></option>
                      <?php endforeach; ?>
                    </select><br>
                    <?= form_label('Kota', 'kota'); ?><br>
                    <select id="kabkota" class="form-control text-dark fw-bold p-2" name="kabkota" aria-readonly="true">
                      <?php foreach ($kabkota as $row) : ?>
                        <option value="<?= $row->kabupaten_kota_id; ?>"><?= $row->nama; ?></option>
                      <?php endforeach; ?>
                    </select><br>
                    <?= form_label('Kecamatan', 'kecamatan'); ?><br>
                    <select id="kecamatan" class="form-control text-dark fw-bold p-2" name="kecamatan">
                      <option value="">-- Pilih Kecamatan --</option>
                      <?php foreach ($kecamatan as $row) : ?>
                        <option value="<?= $row->kecamatan_id; ?>"><?= $row->nama; ?></option>
                      <?php endforeach; ?>
                    </select><br>
                    <?= form_label('Kelurahan', 'kelurahan'); ?><br>
                    <select id="kelurahan" class="form-control text-dark fw-bold p-2" name="kelurahan">
                      <option value="">-- Pilih Kelurahan --</option>
                      <?php foreach ($kelurahan as $row) : ?>
                        <option value="<?= $row->kelurahan_id; ?>"><?= $row->nama; ?></option>
                      <?php endforeach; ?>
                    </select><br>
                    <div class="col">
                      <?= form_label('Nama Jalan/Daerah', 'Nama Jalan/Daerah'); ?>
                      <input type="text" class="form-control text-dark fw-bold p-2" name="nama_daerah" id=" nama_daerah" placeholder="Nama Jalan/Daerah">
                    </div>
                    <div class="row">
                      <div class="col">
                        <?= form_label('Latitude', 'Latitude'); ?>
                        <input type="text" class="form-control text-dark fw-bold p-2" name="latitude" id=" latitude" placeholder="Latitude / Garis Lintang">
                      </div>
                      <div class="col">
                        <?= form_label('Longitude', 'longitude'); ?>
                        <input type="text" class="form-control text-dark fw-bold p-2" name="longitude" id=" longitude" placeholder="Longitude / Garis bujur">
                      </div>
                    </div>
                    <div class="col">
                      <?= form_label('Deskripsi', 'deskripsi'); ?>
                      <input type="text" class="form-control text-dark fw-bold p-2" name="deskripsi" id=" deskripsi" placeholder="Pembunuhan / Begal / Pencurian">
                    </div>
                    <?= form_label('Gambar', 'gambar'); ?>
                    <input type="file" class="form-control text-dark fw-bold mb-5 p-2" id="gambar" name="gambar">
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="Submit" class="btn btn-primary">Submit</button>
              </div>
              </form>
            </div>
          </div>
        </div>

        <div class="table-responsive">
          <table class="table table-striped">
            <thead class="text-primary">
              <tr>
                <th>No</th>
                <th>Provinsi</th>
                <th>Kota/Kabupaten</th>
                <th>Kecamatan</th>
                <th>Kelurahan</th>
                <th>Daerah/Jalan</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($content as $row => $value) : ?>
                <tr>
                  <td><?= $row + 1; ?></td>
                  <td><?= $value->nama; ?></td>
                  <td><?= $value->kknama; ?></td>
                  <td><?= $value->kecnama; ?></td>
                  <td><?= $value->kelnama; ?></td>
                  <td><?= $value->nama_daerah; ?></td>
                  <td><a href="/detailWilayah/<?= $value->id; ?>" class="btn btn-primary">Detail</a></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>