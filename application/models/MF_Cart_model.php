<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MF_Cart_model extends CI_Model
{

    public function __construct()
    {
        //$this->load->database();
    }

    function update_cart($rowid, $qty, $price, $amount, $picture)
    {
        $data = array(
            'rowid' => $rowid,
            'qty' => $qty,
            'picture' => $picture,
            'price' => $price,
            'amount' => $amount
        );

        $this->cart->update($data);
    }

    function list_transaksi(){
       $query=$this->db->query('SELECT max(`id_transaksi`) as maxid FROM `transaksi`');
       return $query;
    }
}
