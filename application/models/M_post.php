<?php

class M_post extends CI_Model
{
    protected $table = 'post';

    public function insert()
    {
        $title = $this->input->post('txttitle', true);
        $content = $this->input->post('txtcontent', true);

        $data = array(
            'title' => $title,
            'content' => $content,
            'date' => date('Y-m-d H:m:s'),
            'username' => $this->session->userdata('username')
        );

        $this->db->insert($this->table, $data);
    }

    public function get_data()
    {
        $session_username = $this->session->userdata('username');

        $sql = $this->db->get_where($this->table, array('username' => $session_username))->result();
        return $sql;
    }

    public function get_data_all()
    {
        $sql = $this->db->get($this->table)->result();
        return $sql;
    }

    public function get_data_by_id($id)
    {
        $sql = $this->db->get_where($this->table, array('idpost' => $id))->row();
        return $sql;
    }

    public function update($id)
    {
        $title = $this->input->post('txttitle', true);
        $content = $this->input->post('txtcontent', true);

        $data = array(
            'title' => $title,
            'content' => $content,
            'date' => date('Y-m-d H:m:s'),
            'username' => $this->session->userdata('username')
        );

        $this->db->update($this->table, $data, array('idpost' => $id));
    }
}
