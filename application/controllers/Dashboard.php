<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{


    public function index()
    {
        $isi['content'] = 'Admin/tampilan_home';
        $this->load->view('templates/header');
        $this->load->view('Admin/tampilan_dashboard', $isi);
        $this->load->view('templates/footer');
    }

    public function orders()
    {
        $isi['content'] = 'Admin/tampilan_orders';
        $this->load->view('templates/header');
        $this->load->view('Admin/tampilan_dashboard', $isi);
        $this->load->view('templates/footer');
    }

    public function simpan_order()
    {
        // Ambil data dari form
        $id_order = rand('000000', '999999');
        $nama_customer = $this->input->post('nama_customer');
        $status_order = $this->input->post('status_order');
        $nominal = $this->input->post('nominal');
        $status = 'proses';

        // Simpan data ke database
        $data = array(
            'id_order' => $id_order,
            'nama_customer' => $nama_customer,
            'status_order' => $status_order,
            'nominal' => $nominal,
            'keterangan' => $status
        );

        $this->db->insert('order', $data);

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