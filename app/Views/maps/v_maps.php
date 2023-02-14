<?= $this->section('head'); ?>
<script src="<?= base_url(); ?>/leaflet/leaflet.js"></script>
<link rel="stylesheet" href="<?= base_url(); ?>/leaflet/leaflet.css">
<!-- Plugin Control Search -->
<script src="<?= base_url(); ?>/leaflet-search/src/leaflet-search.js"></script>
<style>
    #maps {
        height: 500px;
    }
</style>
<div id="maps"></div>

<script>
    let map = L.map('maps').setView({
        lon: 107.633545,
        lat: -6.943097
    }, 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '© <a href="https://openstreetmap.org/copyright" target="_blank"> OpenStreetMap'
    }).addTo(map);

    <?php foreach ($dataWilayah as $row) : ?>
        L.marker({
            lon: <?= $row->longitude; ?>,
            lat: <?= $row->latitude; ?>
        }).bindPopup('<br> <img src="<?= base_url(); ?>/img/<?= $row->gambar; ?>" width="200"> <br> <h5><center>Rawan <?= $row->deskripsi; ?> </center></h5> <b>Daerah</b> : <?= $row->nama_daerah; ?> <br> <b>Kecamatan</b> : <?= $row->kecnama; ?> <br> <b>Kelurahan</b> : <?= $row->kelnama; ?>').addTo(map);
    <?php endforeach; ?>
</script>