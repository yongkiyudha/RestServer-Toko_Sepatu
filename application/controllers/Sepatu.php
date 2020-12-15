<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Don't forget include/define REST_Controller path

/**
 *
 * Controller Sepatu
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller REST
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @author    Raul Guerrero <r.g.c@me.com>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */
use chriskacerguis\RestServer\RestController;
class Sepatu extends RestController
{
    
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Sepatu_model','spt');
  }

  public function index_get()
  {
    $id = $this->get('id');
    if ($id == null) 
    {
      $p = $this->get('page');
      $p = (empty($p) ? 1 : $p);
      $total_data = $this->spt->count();
      $total_page = ceil($total_data / 5);
      $start = ($p - 1)* 5;  
      $list = $this->spt->get(null, 5, $start);
      $data = [
        'status' => true,
        'page' => $p,
        'total_data' => $total_data,
        'total_page' => $total_page,
        'data' => $list 
      ];
      $this->response($data,RestController::HTTP_OK);
    }
    else 
    {
      $data = $this->spt->get($id);
      if($data)
      {
        $this->response(['status => true', 'data' => $list],RestController::HTTP_OK);
      }
      else
      {
        $this->response(['status => false', 'msg' => $id.' Tidak Ditemukan'],RestController::HTTP_NOT_FOUND);
      }
    }
    
    
  }

  public function index_post()
  {
    $data = [
      'id_sepatu' => $this->post('id_sepatu'),
      'merk' => $this->post('merk'),
      'ukuran' => $this->post('ukuran'),
      'warna' => $this->post('warna'),
      'harga' => $this->post('harga')
    ];
    $simpan = $this->spt->add($data);
    if ($simpan['status'])
    {
      $this->response(['status' => true, 'msg' => $simpan['data']. 'Data telah ditambahkan'], RestController::HTTP_CREATED);
    }
    else
    {
      $this->response(['status' => false, 'msg' => $simpan['msg']], RestController::HTTP_INTERNAL_ERROR);
    }
  }

  public function index_put()
  {
    $data = [
      'id_sepatu' => $this->put('id_sepatu'),
      'merk' => $this->put('merk'),
      'ukuran' => $this->put('ukuran'),
      'warna' => $this->put('warna'),
      'harga' => $this->put('harga')
    ];
    $id = $this->put('id');
    $simpan = $this->spt->update($id, $data);
    if ($simpan['status'])
    {
      $status = (int)$simpan['data'];
      if ($status > 0)
      $this->response(['status' => true, 'msg' => $simpan['data']. 'Data telah dirubah'], RestController::HTTP_OK);
      else
      $this->response(['status' => false, 'msg' =>'Tidak ada data yang dirubah'], RestController::HTTP_BAD_REQUEST);
    }
    else
    {
      $this->response(['status' => false, 'msg' => $simpan['msg']], RestController::HTTP_INTERNAL_ERROR);
    }
  }

  public function index_delete()
  {
    $id = $this->delete('id');
    if ($id === null)
    {
      $this->response(['status' => false, 'msg' =>'Masukkan nim yang akan di hapus'], RestController::HTTP_BAD_REQUEST);
    }
    $delete = $this->spt->delete($id);
    if ($delete['status'])
    {
      $status = (int)$delete ['data'];
      if ($status > 0)
      $this->response(['status' => true, 'msg' => $id. 'Data telah dihapus '], RestController::HTTP_OK);
      else
      $this->response(['status' => false, 'msg' =>'Tidak ada data yang dihapus'], RestController::HTTP_BAD_REQUEST);
    }
    else
    {
      $this->response(['status' => false, 'msg' => $delete['msg']], RestController::HTTP_INTERNAL_ERROR);
    }
  }

}


/* End of file Sepatu.php */
/* Location: ./application/controllers/Sepatu.php */