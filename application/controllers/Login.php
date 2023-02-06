<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_login');
    }

    public function index()
    {
        $this->ceklogin();

        $this->load->library('form_validation');
        $this->form_validation->set_rules('txtusername', 'Username', 'required|trim');
        $this->form_validation->set_rules('txtpassword', 'Password', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('vlogin');
        } else {
            $this->m_login->ceklogin();
        }
    }

    public function register()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('txtnamalengkap', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('txtusername', 'Username', 'required|trim');
        $this->form_validation->set_rules('txtpassword', 'Password', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('vlogin');
        } else {
            $this->m_login->register_user();
        }
    }

    public function ceklogin()
    {

        $session_level = $this->session->userdata('level');
        if ($session_level) {
            redirect('login');
        }
        // $this->load->view('auth/index');
    }

    public function logout()
    {
        session_destroy();
        redirect('login');
    }

    public function tes()
	{
		echo password_hash('user', PASSWORD_DEFAULT);
	}
}
