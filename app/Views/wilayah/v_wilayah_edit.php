<?php
$csv = [
    'name' => 'csv',
    'id'   => 'csv'
];

$lat = [
    'name' => 'latitude',
    'id'   => 'latitude',
    'class' => 'form-control',
    'value' => null,
    'placeholder' => 'latitude'
];

$long = [
    'name' => 'longitude',
    'id'   => 'longitude',
    'class' => 'form-control',
    'value' => null,
    'placeholder' => 'longitude'
];

$desk = [
    'name' => 'deskripsi',
    'id'   => 'deskripsi',
    'class' => 'form-control',
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
                <a href="<?= base_url('/wilayah'); ?>" class="btn btn-primary mb-5 mt-3">Kembali</a>
                <h4 class="card-title">Edit Data</h4>
                <p class="card-category">
                    Menu Edit Data
                </p>
            </div>

            <?php if (session()->getFlashdata('msg')) : ?>
                <div class="alert alert-success text-dark" role="alert">
                    <?= session()->getFlashdata('msg'); ?>
                </div>
            <?php endif; ?>

            <div class="card-body">
                <form action="/wilayah/wilayahUpdate/<?= $wilayah->id; ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="hidden" name="gambarLama" value="<?= $wilayah->gambar; ?>">
                        <?= form_label('Kecamatan', 'kecamatan'); ?><br>
                        <select id="kecamatan" class="form-control fw-bold p-2" name="kecamatan">
                            <option value="" hidden></option>
                            <?php foreach ($kecamatan as $row) : ?>
                                <option value="<?= $row->kecamatan_id; ?>" <?= $row->kecamatan_id == 1553 ? 'selected' : null ?>><?= $row->nama; ?></option>
                            <?php endforeach; ?>
                        </select><br>
                        <?= form_label('Kelurahan', 'kelurahan'); ?><br>
                        <select id="kelurahan" class="form-control fw-bold p-2" name="kelurahan">
                            <option value="" hidden></option>
                            <?php foreach ($kelurahan as $row) : ?>
                                <option value="<?= $row->kelurahan_id; ?>" <?= $wilayah->id == $row->kelurahan_id ? 'selected' : null ?>>
                                    <?= $row->nama; ?>
                                </option>
                            <?php endforeach; ?>
                        </select><br>

                        <div class="col">
                            <?= form_label('Nama Jalan/Daerah', 'Nama Jalan/Daerah'); ?>
                            <input type="text" class="form-control fw-bold p-2" name="nama_daerah" id=" nama_daerah" placeholder="Nama Jalan/Daerah" value="<?= (old('nama_daerah')) ? old('nama_daerah') : $wilayah->nama_daerah; ?>">
                        </div>
                        <div class="row">
                            <div class="col">
                                <?= form_label('Latitude', 'Latitude'); ?>
                                <input type="text" class="form-control fw-bold p-2" name="latitude" id=" latitude" placeholder="Latitude / Garis Lintang" value="<?= (old('latitude')) ? old('latitude') : $wilayah->latitude; ?>">
                            </div>
                            <div class="col">
                                <?= form_label('Longitude', 'longitude'); ?>
                                <input type="text" class="form-control fw-bold p-2" name="longitude" id=" longitude" placeholder="Longitude / Garis Bujur" value="<?= (old('longitude')) ? old('longitude') : $wilayah->longitude; ?>">
                            </div>
                        </div>
                        <div class="col">
                            <?= form_label('Deskripsi', 'deskripsi'); ?>
                            <input type="text" class="form-control fw-bold p-2" name="deskripsi" id=" deskripsi" placeholder="Pembunuhan / Begal / Pencurian" value="<?= (old('deskripsi')) ? old('deskripsi') : $wilayah->deskripsi; ?>">
                        </div>
                        <?= form_label('Gambar', 'gambar'); ?>
                        <input type="file" class="form-control fw-bold p-2 d-inline-block" id="gambar" name="gambar" value="<?= (old('gambar')); ?>">
                        <img src="/img/<?= $wilayah->gambar; ?>" width="200" class="d-inline-block mb-5" alt="Gambar 1">
                    </div>
                    <?= form_submit($submit); ?>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>