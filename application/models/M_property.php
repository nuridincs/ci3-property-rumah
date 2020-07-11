<?php

class M_property extends CI_Model
{
  public function getData($table)
  {
    $query = $this->db->get($table);

    return $query->result();
  }

  public function getDetail($id)
  {
    $query = $this->db->select('*')
              ->from('app_list_property')
              ->join('app_blok', 'app_blok.id_property=app_list_property.id')
              ->where('app_list_property.id', $id)
              ->where('app_blok.status_blok', '1')
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

  public function getDataTrx()
  {
    $query = $this->db->select('*, app_trx.id as id_trx')
              ->from('app_list_property')
              ->join('app_blok', 'app_blok.id_property=app_list_property.id')
              ->join('app_trx', 'app_trx.id_blok=app_blok.id')
              ->join('app_tenor', 'app_tenor.id=app_trx.id_tenor')
              ->join('app_user', 'app_user.id=app_trx.id_user')
              ->join('app_document', 'app_document.id_trx=app_trx.id')
              ->where('app_user.id', $this->session->userdata('id'))
              ->get();

    return $query->result();
  }

  public function getBooking($id_blok)
  {
    $query = $this->db->select('*')
        ->from('app_list_property')
        ->join('app_blok', 'app_blok.id_property=app_list_property.id')
        ->where('app_blok.id', $id_blok)
        ->get();

    return $query->row();
  }

  public function getUser()
  {
    $query = $this->db->select('*')
        ->from('app_user')
        ->where('id', $this->session->userdata('id'))
        ->get();

    return $query->row();
  }

  public function getDetailByID($table, $idName, $id)
  {
    $query = $this->db->select('*')
        ->from($table)
        ->where($idName, $id)
        ->get();

    return $query->row();
  }
}
