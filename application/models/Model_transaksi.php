<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_transaksi extends CI_Model
{
    public function countNominalTransaksi()
    {
        $sql = "SELECT SUM(transaksi.nominal) AS jumlah_nominal_transaksi FROM `transaksi`
WHERE keterangan='SELESAI';";
        $query = $this->db->query($sql);
        return $query->row_array();
    }

    public function dataTransaksi()
    {
        $sql = "SELECT transaksi.id_order,transaksi.nama_customer,transaksi.status_order,transaksi.nominal,
transaksi.keterangan,transaksi.timestamp,
CONCAT(
    DAY(transaksi.timestamp), ' ',
    CASE MONTH(transaksi.timestamp)
        WHEN 1 THEN 'Januari'
        WHEN 2 THEN 'Februari'
        WHEN 3 THEN 'Maret'
        WHEN 4 THEN 'April'
        WHEN 5 THEN 'Mei'
        WHEN 6 THEN 'Juni'
        WHEN 7 THEN 'Juli'
        WHEN 8 THEN 'Agustus'
        WHEN 9 THEN 'September'
        WHEN 10 THEN 'Oktober'
        WHEN 11 THEN 'November'
        WHEN 12 THEN 'Desember'
    END,
    ' ',
    YEAR(transaksi.timestamp)
) AS tanggal
FROM `transaksi`;";
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
