<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MProduk;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\API\ResponseTrait;

class ProdukController extends BaseController
{
    use ResponseTrait;

    protected $format = 'json';

    public function create()
    {
        $requestData = $this->request->getJson(true);

        if (empty($requestData)) {
            return $this->failValidationError('Data yang dikirim kosong.');
        }

        $data = [
            'kode_produk' => $requestData['kode_produk'] ?? null,
            'nama_produk' => $requestData['nama_produk'] ?? null,
            'harga' => $requestData['harga'] ?? null,
        ];

        $model = new MProduk();
        
        if (!$model->validate($data)) {
            return $this->failValidationError($model->errors());
        }

        $model->insert($data);
        $produk = $model->find($model->getInsertID());

        return $this->respondCreated([
            'status' => "success",
            'messages' => [
                'success' => 'Produk berhasil ditambahkan',
            ],
            'data' => $produk,
        ]);
    }

    public function list()
    {
        $model = new MProduk();
        $produk = $model->findAll();
        
        return $this->respond([
            'status' => "success",
            'data' => $produk,
        ]);
    }

    public function detail($id = null)
    {
        $model = new MProduk();
        $produk = $model->find($id);
        
        if ($produk) {
            return $this->respond([
                'status' => "success",
                'data' => $produk,
            ]);
        } else {
            return $this->failNotFound('Produk tidak ditemukan');
        }
    }

    public function ubah($id = null)
    {
        $requestData = $this->request->getJson(true);

        if (empty($requestData)) {
            return $this->failValidationError('Data yang dikirim kosong.');
        }

        $data = [
            'kode_produk' => $requestData['kode_produk'] ?? null,
            'nama_produk' => $requestData['nama_produk'] ?? null,
            'harga' => $requestData['harga'] ?? null,
        ];
        
        $model = new MProduk();
        
        if (!$model->update($id, $data)) {
            return $this->failValidationError($model->errors());
        }

        $produk = $model->find($id);

        if ($produk) {
            return $this->respond([
                'status' => "success",
                'messages' => [
                    'success' => 'Produk berhasil diubah',
                ],
                'data' => $produk,
            ]);
        } else {
            return $this->failNotFound('Produk tidak ditemukan setelah diubah');
        }
    }

    public function hapus($id = null)
    {
        $model = new MProduk();
        $produk = $model->find($id);
        
        if (!$produk) {
            return $this->failNotFound('Produk tidak ditemukan');
        }

        $model->delete($id);

        return $this->respondDeleted([
            'status' => "success",
            'messages' => [
                'success' => 'Produk berhasil dihapus',
            ],
            'data' => ['id' => $id],
        ]);
    }
}
