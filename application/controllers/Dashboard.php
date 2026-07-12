<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{


    public function index()
    {
        $this->Model_keamanan->getKeamanan();
        $isi['content'] = 'Admin/tampilan_home';
        $this->load->view('templates/header');
        $this->load->view('Admin/tampilan_dashboard', $isi);
        $this->load->view('templates/footer');
    }

    public function orders()
    {
        $this->Model_keamanan->getKeamanan();

        $isi['transaksi'] = $this->Model_transaksi->dataTransaksi();
        $isi['nominal_transaksi'] = $this->Model_transaksi->countNominalTransaksi();

        $isi['content'] = 'Admin/tampilan_orders';
        $this->load->view('templates/header');
        $this->load->view('Admin/tampilan_dashboard', $isi);
        $this->load->view('templates/footer');
    }

    public function simpan_order()
    {
        $this->Model_keamanan->getKeamanan();
        // Ambil data dari form
        $id_order = rand('111111', '999999');
        $nama_customer = $this->input->post('nama_customer');
        $status_order = $this->input->post('status_order');
        // Ambil raw input dan bersihkan semua karakter selain digit,
        // lalu cast ke integer untuk menjamin yang tersimpan adalah angka.
        $nominal_raw = $this->input->post('nominal');
        $nominal_digits = preg_replace('/[^0-9]/', '', (string) $nominal_raw);
        $nominal = ($nominal_digits === '') ? 0 : (int) $nominal_digits;
        $status = 'proses';

        // Simpan data ke database
        $data = array(
            'id_order' => $id_order,
            'nama_customer' => $nama_customer,
            'status_order' => $status_order,
            'nominal' => $nominal,
            'keterangan' => $status
        );

        $this->db->insert('transaksi', $data);

        // Redirect ke halaman orders
        redirect('Dashboard/orders');
    }

    public function hapus_transaksi()
    {
        $this->Model_keamanan->getKeamanan();
        $this->db->empty_table('transaksi');
        redirect('Dashboard/orders');
    }

    public function hapus_transaksi_id($id_order)
    {
        $this->Model_keamanan->getKeamanan();
        $this->db->where('id_order', $id_order);
        $this->db->delete('transaksi');
        redirect('Dashboard/orders');
    }

    public function ubah_transaksi()
    {
        $this->Model_keamanan->getKeamanan();
        $id_order = $this->input->post('id_order');
        $nama_customer = $this->input->post('nama_customer');
        $keterangan = "selesai";
        $nominal = $this->input->post('nominal');
        $timestamp = $this->input->post('timestamp');

        // Update data di database
        $data = array(
            'nama_customer' => $nama_customer,
            'keterangan' => $keterangan,
            'nominal' => $nominal,
            'timestamp' => $timestamp
        );

        $this->db->where('id_order', $id_order);
        $this->db->update('transaksi', $data);

        // Redirect ke halaman orders
        redirect('Dashboard/orders');
    }

    public function logout()
    {
        // Get session_id dari cookie
        $session_id = get_cookie('app_session_id');
        if ($session_id) {
            // Hapus session dari database berdasarkan session_id
            $this->Session_Model->delete_session($session_id);
        }        // Hapus cookie
        delete_cookie('app_session_id');        // Hapus session CodeIgniter
        $this->session->sess_destroy();        // Redirect ke login
        redirect('Login');
    }
}
