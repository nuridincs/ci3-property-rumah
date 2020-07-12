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

    return $query->row();
  }

  public function getCustomer($table, $id_name, $id)
  {
		$query = $this->db->select('*')
						->from($table)
						->where($id_name, $id)
						->get();

    return $query->result();
  }

  public function getUser()
  {
		$query = $this->db->select('*')
						->from('app_user')
						->where_not_in('user_role', 'customer')
            ->get();

    return $query->result();
  }

  public function getTrx($request = '')
  {
    $query = $this->db->select('*, app_trx.id as id_trx')
              ->from('app_list_property')
              ->join('app_blok', 'app_blok.id_property=app_list_property.id')
              ->join('app_trx', 'app_trx.id_blok=app_blok.id')
              ->join('app_tenor', 'app_tenor.id=app_trx.id_tenor')
              ->join('app_user', 'app_user.id=app_trx.id_user')
              ->join('app_document', 'app_document.id_trx=app_trx.id')
              ->get();

    if ($request != '') {
      $date_from = date('Y-m-d', strtotime($request['date_from']));
      $date_to = date('Y-m-d', strtotime($request['date_to']));

      $query = $this->db->select('*, app_trx.id as id_trx')
        ->from('app_list_property')
        ->join('app_blok', 'app_blok.id_property=app_list_property.id')
        ->join('app_trx', 'app_trx.id_blok=app_blok.id')
        ->join('app_tenor', 'app_tenor.id=app_trx.id_tenor')
        ->join('app_user', 'app_user.id=app_trx.id_user')
        ->join('app_document', 'app_document.id_trx=app_trx.id')
        ->where('app_trx.created_at >=', $date_from)
        ->where('app_trx.created_at <=', $date_to)
        ->get();
    }

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
