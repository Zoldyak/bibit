<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MA_Slide extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }
  function list_slide(){
    $query1=$this->db->select('*')
       ->from('slide as t1')
       ->join('sub_ketegori as t2', 't1.id_subketegori = t2.id_subketegori')
       ->get();
    return $query1;
  }
  function input_data($dataform){
    $this->db->insert('slide',$dataform);
  }
  function list_edit($id){
    $query1=$this->db->select('*')
       ->from('slide as t1')
        ->where('t1.id_slide',$id)
       ->join('sub_ketegori as t2', 't1.id_subketegori = t2.id_subketegori')
       ->get();
      return $query1;
  }
  function update_data($where,$dataform){
    $this->db->where($where);
  $this->db->update('slide',$dataform);
}
 function updatests($where,$updatemax)
{
  $this->db->where($where);
$this->db->update('slide',$updatemax);
}
function delete($where){
  $this->db->where($where);
  $this->db->delete('slide');
}
function maxid(){
  $this->db->select_max('id_slide');
  $query2=$this->db->get('slide',1);
      return $query2;
}
  function list_subproduk_ketegori(){
    return $this->db->get('sub_ketegori');
  }
}
