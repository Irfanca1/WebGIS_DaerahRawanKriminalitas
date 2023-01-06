<?php

namespace App\Controllers;

class Wilayah extends BaseController
{

  protected $builder, $db;
  public function __construct()
  {
    helper('form');
    $this->db = \Config\Database::connect();
    $this->builder = $this->db->table('region');
  }

  public function wilayah_data_read()
  {
    $this->builder->select('region.nama_daerah, provinsi.nama, provinsi.provinsi_id, 
        kabupaten_kota.nama as kknama, kabupaten_kota.kabupaten_kota_id, kecamatan.nama as kecnama,
        kelurahan.nama as kelnama, region.deskripsi, region.latitude, region.longitude, region.nama_daerah, 
        region.gambar, region.id');
    $this->builder->join('provinsi', 'provinsi.provinsi_id = region.provinsi_id');
    $this->builder->join('kabupaten_kota', 'kabupaten_kota.kabupaten_kota_id = region.kabupaten_kota_id');
    $this->builder->join('kecamatan', 'kecamatan.kecamatan_id = region.kecamatan_id');
    $this->builder->join('kelurahan', 'kelurahan.kelurahan_id = region.kelurahan_id');
    $query = $this->builder->get();

    $dataModel = new \App\Models\M_Wilayah();
    $data = [
      'title'     => 'Data Wilayah',
      'content'   => $query->getResult(),
      'prov'      => $dataModel->get_data_prov()->getResult(),
      'kabkota'   => $dataModel->get_data_kota()->getResult(),
      'kecamatan' => $dataModel->get_data_kecamatan()->getResult(),
      'kelurahan' => $dataModel->get_data_kelurahan()->getResult(),
      'validation' => \Config\Services::validation()
    ];

    echo view('templates/header', $data);
    echo view('wilayah/v_wilayah');
    echo view('templates/footer');
  }

  public function wilayah_data_save()
  {
    if (!$this->validate([
      'gambar' => [
        'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
        'errors' => [
          'max_size' => 'Ukuran gambar terlalu besar',
          'is_image' => 'Yang anda pilih bukan gambar',
          'mime_in' => 'Yang anda pilih bukan gambar'
        ]
      ]
    ])) {
      // return redirect()->to('/wilayah_data_import')->withInput();
    }

    // ambil gambar
    $fileSampul = $this->request->getFile('gambar');
    // apakah tidakl ada gambar yang di upload
    if ($fileSampul->getError() == 4) {
      $namaSampul = 'default.jpg';
    } else {
      //generate nama sampul random
      $namaSampul = $fileSampul->getRandomName();
      // pindahkan file ke folder public/img
      $fileSampul->move('img', $namaSampul);
    }

    if ($this->request->getPost()) {
      $modelMasterData = new \App\Models\M_Wilayah();
      $dataMaster = [
        'provinsi_id'       => $this->request->getPost('provinsi'),
        'kabupaten_kota_id' => $this->request->getPost('kabkota'),
        'kecamatan_id'      => $this->request->getPost('kecamatan'),
        'kelurahan_id'      => $this->request->getPost('kelurahan'),
        'users_id'               => session()->get('id'),
        'nama_daerah'       => $this->request->getPost('nama_daerah'),
        'latitude'          => $this->request->getPost('latitude'),
        'longitude'         => $this->request->getPost('longitude'),
        'deskripsi'         => $this->request->getPost('deskripsi'),
        'gambar'            => $namaSampul,
      ];
      $modelMasterData->save($dataMaster);
      // $id_masterData = $modelMasterData->insertID();
      session()->setFlashdata('msg', 'Data berhasil ditambahkan..');

      return redirect()->to('/wilayah');
    }
  }

  public function wilayah_detail($id)
  {
    $dataModel = new \App\Models\M_Wilayah();
    $data = [
      'title' => 'Detail Wilayah',
      'dWilayah' => $dataModel->get_wilayah($id)
    ];

    if (empty($data['dWilayah'])) {
      throw new \CodeIgniter\Exceptions\PageNotFoundException('Wilayah ' . $id . ' tidak ditemukan');
    }

    echo view('templates/header', $data);
    echo view('wilayah/v_wilayah_detail');
    echo view('templates/footer');
  }

  public function wilayah_edit($id)
  {
    $dataModel = new \App\Models\M_Wilayah();
    $this->builder->select('region.nama_daerah, kecamatan.nama as kecam_nama,
        kelurahan.nama as kelur_nama, region.deskripsi, region.latitude, region.longitude, region.nama_daerah, 
        region.gambar, region.id');
    $this->builder->join('kecamatan', 'kecamatan.kecamatan_id = region.kecamatan_id');
    $this->builder->join('kelurahan', 'kelurahan.kelurahan_id = region.kelurahan_id');
    $query = $this->builder->get();
    $data = [
      'title'       => 'Edit Wilayah',
      'validation'  => \Config\Services::validation(),
      'wilayah'     => $dataModel->get_wilayah($id),
      'wilayahkec'  => $query->getResult(),
      'kecamatan'   => $dataModel->get_data_kecamatan()->getResult(),
      'kelurahan'   => $dataModel->get_data_kelurahan()->getResult(),
    ];

    echo view('templates/header', $data);
    echo view('wilayah/v_wilayah_edit');
    echo view('templates/footer');
  }

  public function wilayahUpdate($id)
  {
    $fileGambar = $this->request->getFile('gambar');

    if ($fileGambar->getError() == 4) {
      $namaGambar = $this->request->getVar('gambarLama');
    } else if ($fileGambar != 'default.jpg') {
      $namaGambar = $fileGambar->getRandomName();
      $fileGambar->move('img', $namaGambar);
      // unlink('img/' . $this->request->getVar('gambarLama'));
    }

    $dataModel = new \App\Models\M_Wilayah();
    $dataModel->save([
      'id' => $id,
      'kecamatan_id'  => $this->request->getVar('kecamatan'),
      'kelurahan_id'  => $this->request->getVar('kelurahan'),
      'nama_daerah'   => $this->request->getVar('nama_daerah'),
      'latitude'      => $this->request->getVar('latitude'),
      'longitude'     => $this->request->getVar('longitude'),
      'deskripsi'     => $this->request->getVar('deskripsi'),
      'gambar'        => $namaGambar,
    ]);

    session()->setFlashdata('msg', 'Data berhasil diubah..');

    return redirect()->to('/wilayah');
  }

  public function wilayahDelete($id)
  {
    $dataModel = new \App\Models\M_Wilayah();
    $mWilayah = $dataModel->find($id);

    if ($mWilayah->gambar != 'default.jpg') {
      unlink('img/' . $mWilayah->gambar);
    }

    $dataModel->delete($id);
    session()->setFlashData('msg', 'Data berhasil dihapus..');

    return redirect()->to('/wilayah');
  }
}
