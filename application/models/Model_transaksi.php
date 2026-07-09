<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_transaksi extends CI_Model
{
    public function dataTransaksi()
    {
        $sql = "SELECT transaksi.id_order,transaksi.nama_customer,transaksi.status_order,transaksi.nominal,transaksi.keterangan,transaksi.timestamp FROM `transaksi`;";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function simpan($data = array())
    {
        $jumlah = count($data);

        if ($jumlah > 0) {
            $this->db->insert_batch('a_kelas', $data);
        }
    }
}
