<?php

namespace App\Controllers;

class Maps extends BaseController
{
    protected $builder, $db;
    public function __construct()
    {
        helper('form');
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('region');
    }

    public function index()
    {
        $this->builder->select('region.nama_daerah, provinsi.nama, provinsi.provinsi_id, 
        kabupaten_kota.nama as kknama, kabupaten_kota.kabupaten_kota_id, kecamatan.nama as kecnama,
        kelurahan.nama as kelnama, region.deskripsi, region.latitude, region.longitude, region.nama_daerah, 
        region.gambar');
        $this->builder->join('provinsi', 'provinsi.provinsi_id = region.provinsi_id');
        $this->builder->join('kabupaten_kota', 'kabupaten_kota.kabupaten_kota_id = region.kabupaten_kota_id');
        $this->builder->join('kecamatan', 'kecamatan.kecamatan_id = region.kecamatan_id');
        $this->builder->join('kelurahan', 'kelurahan.kelurahan_id = region.kelurahan_id');
        $query = $this->builder->get();
        $data = [
            'title' => 'Maps',
            'dataWilayah' => $query->getResult(),
        ];

        echo view('templates/header', $data);
        echo view('maps/v_maps');
        echo view('templates/footer');
    }
}
