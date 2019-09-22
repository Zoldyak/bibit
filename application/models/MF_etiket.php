<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MF_etiket extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }
  function list_etiket($id){
    $query1=$this->db->select('*')
       ->from('transaksi as t1')
       ->where('t1.id_transaksi',$id)
       ->join('pemasanan as t2', 't1.id_transaksi = t2.id_transaksi')
       ->get();
       return $query1;
  }
  function cektanggalsampai($id){
    $query1=$this->db->select('*')
       ->from('transaksi as t1')
       ->where('t1.id_transaksi',$id)
        ->where('t2.status','Barang Telah Diterima ')
       ->join('log_transaksi as t2', 't1.id_transaksi = t2.id_transaksi','LEFT')
       ->join('pemasanan as t3', 't1.id_transaksi = t3.id_transaksi')
       ->order_by('id_log','DESC')
       ->limit(1)
       ->get();
       return $query1;
  }
  function cektransaksi($id){
    $query1=$this->db->select('*')
       ->from('transaksi as t1')
       ->where('t1.id_transaksi',$id)
       ->join('log_transaksi as t2', 't1.id_transaksi = t2.id_transaksi','LEFT')
        ->join('pemasanan as t3', 't1.id_transaksi = t3.id_transaksi')
       ->get();
       return $query1;
  }

}
