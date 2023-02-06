<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akun extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_akun');
    }

    public function index()
    {
        $data['title'] = 'Akun';
        $data['get_data'] = $this->m_akun->get_data();
        $this->load->view('template/header', $data);
        $this->load->view('akun/index', $data);
        $this->load->view('template/footer', $data);
    }

    public function add()
    {
        $data['title'] = 'Akun';

        $this->load->library('form_validation');
        $this->form_validation->set_rules('txtnama', 'Name', 'required|trim');
        $this->form_validation->set_rules('txtrole', 'Role', 'required|trim');
        $this->form_validation->set_rules('txtusername', 'Username', 'required|trim');
        $this->form_validation->set_rules('txtpassword', 'Password', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('akun/add', $data);
            $this->load->view('template/footer', $data);
        } else {
            $this->m_akun->insert();
            $msg = '
            <div class="alert alert-success">
                <strong>Success!</strong> berhasil tambah data.
            </div>
            ';
            $this->session->set_flashdata('msg', $msg);
            redirect('akun');
        }
    }

    public  function edit($username)
    {
        $data['title'] = 'Akun';
        $data['get_data_by_username'] = $this->m_akun->get_data_by_username($username);
        $this->load->view('template/header', $data);
        $this->load->view('akun/edit', $data);
        $this->load->view('template/footer', $data);
    }

    public function proses_edit($username)
    {
        $this->m_akun->update($username);
        $msg = '
            <div class="alert alert-success">
                <strong>Success!</strong> berhasil edit data.
            </div>
            ';
        $this->session->set_flashdata('msg', $msg);
        redirect('akun');
    }

    public function delete($username)
    {
        $this->db->delete('account', array('username' => $username));
        $msg = '
            <div class="alert alert-success">
                <strong>Success!</strong> berhasil hapus data.
            </div>
            ';
        $this->session->set_flashdata('msg', $msg);
        redirect('akun');
    }
}
