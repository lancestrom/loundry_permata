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