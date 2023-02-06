<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Post extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_post');
    }

    public function index()
    {
        $data['title'] = 'Post';
        $data['get_data'] = $this->m_post->get_data();
        $this->load->view('template/header', $data);
        $this->load->view('post/index', $data);
        $this->load->view('template/footer', $data);
    }

    public function add()
    {
        $data['title'] = 'Akun';

        $this->load->library('form_validation');
        $this->form_validation->set_rules('txttitle', 'Title', 'required|trim');
        $this->form_validation->set_rules('txtcontent', 'Content', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('post/add', $data);
            $this->load->view('template/footer', $data);
        } else {
            $this->m_post->insert();
            $msg = '
            <div class="alert alert-success">
                <strong>Success!</strong> berhasil tambah data.
            </div>
            ';
            $this->session->set_flashdata('msg', $msg);
            redirect('post');
        }
    }

    public  function edit($id)
    {
        $data['title'] = 'Akun';
        $data['get_data_by_id'] = $this->m_post->get_data_by_id($id);
        $this->load->view('template/header', $data);
        $this->load->view('post/edit', $data);
        $this->load->view('template/footer', $data);
    }

    public function proses_edit($id)
    {
        $this->m_post->update($id);
        $msg = '
            <div class="alert alert-success">
                <strong>Success!</strong> berhasil edit data.
            </div>
            ';
        $this->session->set_flashdata('msg', $msg);
        redirect('post');
    }

    public function delete($id)
    {
        $this->db->delete('post', array('idpost' => $id));
        $msg = '
            <div class="alert alert-success">
                <strong>Success!</strong> berhasil hapus data.
            </div>
            ';
        $this->session->set_flashdata('msg', $msg);
        redirect('post');
    }
}
