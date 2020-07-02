<?php

class M_admin extends CI_Model
{
  public function getData($table)
  {
    $query = $this->db->get($table);

    return $query->result();
	}

  public function getDataById($table, $id_name, $id)
  {
		$query = $this->db->select('*')
						->from($table)
						->where($id_name, $id)
						->get();

    return $query->result();
  }

  public function getTrx()
  {
    $query = $this->db->select('*')
              ->from('app_trx')
              ->join('app_user', 'app_user.id=app_trx.id_user')
              ->join('app_blok', 'app_blok.id=app_trx.id_blok')
              ->join('app_list_property', 'app_list_property.id=app_blok.id_property')
              ->get();

    return $query->result();
  }

  public function getGallery($id)
  {
    $query = $this->db->select('*')
              ->from('app_list_property')
              ->join('app_blok', 'app_blok.id_property=app_list_property.id')
              ->where('app_list_property.id', $id)
              ->get();

    return $query->result();
  }
}
