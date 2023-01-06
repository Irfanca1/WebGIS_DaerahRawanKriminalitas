<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Wilayah extends Model
{
    protected $table = 'region';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id', 'provinsi_id', 'kabupaten_kota_id', 'kecamatan_id', 'kelurahan_id', 'nrp', 'nama_daerah', 'latitude', 'longitude', 'deskripsi', 'gambar'
    ];
    protected $returnType = 'App\Entities\Wilayah';
    protected $useTimeStamp = false;

    public function get_data_kecamatan()
    {
        $query = $this->db->table('kecamatan')
            ->select('*')
            ->orderBy('nama', 'asc')
            ->get();
        return $query;
    }

    public function get_data_kelurahan()
    {
        $query = $this->db->table('kelurahan')
            ->select('*')
            ->orderBy('nama', 'asc')
            ->get();
        return $query;
    }

    public function get_data_prov()
    {
        $query = $this->db->table('provinsi')
            ->select('*')
            ->orderBy('nama', 'asc')
            ->get();
        return $query;
    }

    public function get_data_kota()
    {
        $query = $this->db->table('kabupaten_kota')
            ->select('*')
            ->orderBy('nama', 'asc')
            ->get();
        return $query;
    }

    public function get_wilayah($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }

    public function pencarian($keyword)
    {
        $builder = $this->builder();
        $builder->select('region.nama_daerah, provinsi.nama, provinsi.provinsi_id, 
        kabupaten_kota.nama as kknama, kabupaten_kota.kabupaten_kota_id, kecamatan.nama as kecnama,
        kelurahan.nama as kelnama, region.deskripsi, region.latitude, region.longitude, region.nama_daerah, 
        region.gambar, region.id');
        $builder->join('provinsi', 'provinsi.provinsi_id = region.id');
        $builder->join('kabupaten_kota', 'kabupaten_kota.kabupaten_kota_id = region.id');
        $builder->join('kecamatan', 'kecamatan.kecamatan_id = region.id');
        $builder->join('kelurahan', 'kelurahan.kelurahan_id = region.id');
        $query = $builder->get()->getResult();

        if ($keyword != '') {
            $builder->like('nama_daerah', $keyword);
        }
    }
}
