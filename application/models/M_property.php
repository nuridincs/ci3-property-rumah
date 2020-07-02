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
