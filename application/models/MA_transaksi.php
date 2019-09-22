<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MA_transaksi extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }
  function listall_transaksi(){
    // $where = array('status_pembayaran' => 'Lunas');
    $query1=$this->db->distinct('t2.tanggal_pemesanan')
    ->select('t2.tanggal_pemesanan,
    t1.tanggal,
t1.id_transaksi,
t1.username,
t1.tottal_bayar,
t1.total_transfer,
t1.Status_pengiriman,
t1.bukti,
t3.alamat,
t1.status_pembayaran')
       ->from('transaksi as t1')
       // ->where($where)
       ->join('pemasanan as t2', 't1.id_transaksi = t2.id_transaksi')
       ->join('user as t3', 't1.username = t3.username')
       ->get();
    return $query1;
  }
  function listid_transaksi($id){
    $where = array('status_pembayaran' => 'Lunas',
    't1.id_transaksi'=> $id);

    $query1=$this->db->distinct('t2.tanggal_pemesanan')
    ->select('t2.tanggal_pemesanan,
    t1.tanggal,
t1.id_transaksi,
t1.username,
t1.tottal_bayar,
t1.total_transfer,
t1.Status_pengiriman,
t1.bukti,
t3.alamat,
t1.status_pembayaran')
       ->from('transaksi as t1')
       ->where($where)
       ->join('pemasanan as t2', 't1.id_transaksi = t2.id_transaksi')
              ->join('user as t3', 't1.username = t3.username')
       ->get();

    return $query1;
  }

  function detail_list($id){
    $query1=$this->db->select('*')
       ->from('transaksi as t1')
       ->where('t1.id_transaksi',$id)
       ->join('pemasanan as t2', 't1.id_transaksi = t2.id_transaksi')
       ->get();
       return $query1;
  }

  function detail_update($id){
    return $this->db->get_where('transaksi',array('id_transaksi'=>$id));
  }
  function update_notif($where,$dataform){
        $this->db->where($where);
      $this->db->update('transaksi',$dataform);
  }
  function update_data($where,$dataform){
    $this->db->where($where);
  $this->db->update('transaksi',$dataform);
  }
  function update_batal($where,$dataform){
    $this->db->where($where);
  $this->db->update('transaksi',$dataform);
  }

}
