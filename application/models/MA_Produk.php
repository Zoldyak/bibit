<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MA_Produk extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }
  function list_produk(){


  $query1=$this->db->select('*')
     ->from('produk as t1')
     ->join('kategori as t2', 't1.id_ketegori = t2.id_ketegori')
     ->join('sub_ketegori as t3', 't1.id_subketegori = t3.id_subketegori')
     ->get();
  return $query1;
  }
  function input_data($dataform){
    $this->db->insert('produk',$dataform);
  }
  function list_edit($id){
    $query1=$this->db->select('*')
       ->from('produk as t1')
        ->where('t1.id_produk',$id)
       ->join('kategori as t2', 't1.id_ketegori = t2.id_ketegori')
       ->join('sub_ketegori as t3', 't1.id_subketegori = t3.id_subketegori')
       ->get();
      return $query1;
  }
  function update_data($where,$dataform){
    $this->db->where($where);
  $this->db->update('produk',$dataform);
  }
  function delete($where){
    $this->db->where($where);
    $this->db->delete('produk');
  }
  function list_produk_ketegori(){
    $query1 = $this->db->get('kategori');
    return $query1;
  }
  function list_produk_subketegori($id){
    $hasil=$this->db->query("SELECT * FROM sub_ketegori WHERE id_ketegori='$id'");
    return $hasil->result();
  }


}
