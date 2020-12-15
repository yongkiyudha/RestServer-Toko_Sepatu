<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Sepatu_model
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Sepatu_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  public function get($id = null, $limit = 5, $offset = 0)
  {
    if ($id == null )
    {
      return $this->db->get('tb_sepatu', $limit , $offset)->result();
    }
    else
    {
      return $this->db->get_where('tb_sepatu', ['id_sepatu' => $id]);
    }
    
  }

  public function count()
  {
    return $this->db->get('tb_sepatu')->num_rows();
  }

  public function add($data)
  {
    try
    {
      $this->db->insert('tb_sepatu', $data);
      $error = $this->db->error();
      if (!empty($error['code']))
      {
        throw new exception ('Terjadi Kesalahan : '. $error['message']);
        return false;
      }
      return ['status' => true, 'data' => $this->db->affected_rows()];
    }
    catch (exception $ex)
    {
      return ['status' => false, 'msg' => $ex->getMessage()];
    }
  }

  public function update($id, $data)
  {
    try
    {
      $this->db->update('tb_sepatu', $data, ['id_sepatu' => $id]);
      $error = $this->db->error();
      if (!empty($error['code']))
      {
        throw new exception ('Terjadi Kesalahan : '. $error['message']);
        return false;
      }
      return ['status' => true, 'data' => $this->db->affected_rows()];
    }
    catch (exception $ex)
    {
      return ['status' => false, 'msg' => $ex->getMessage()];
    }
  }

  public function delete($id)
  {
    try
    {
      $this->db->delete('tb_sepatu',['id_sepatu' => $id]);
      $error = $this->db->error();
      if (!empty($error['code']))
      {
        throw new exception ('Terjadi Kesalahan : '. $error['message']);
        return false;
      }
      return ['status' => true, 'data' => $this->db->affected_rows()];
    }
    catch (exception $ex)
    {
      return ['status' => false, 'msg' => $ex->getMessage()];
    }
  }

}

/* End of file Sepatu_model.php */
/* Location: ./application/models/Sepatu_model.php */