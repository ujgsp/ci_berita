<?php

class M_akun extends CI_Model
{
    protected $table = 'account';

    public function insert()
    {
        $nama = $this->input->post('txtnama', true);
        $role = $this->input->post('txtrole', true);
        $username = $this->input->post('txtusername', true);
        $password = password_hash($this->input->post('txtpassword', true), PASSWORD_DEFAULT);

        $data = array(
            'username' => $username,
            'password' => $password,
            'name' => $nama,
            'role' => $role
        );

        $this->db->insert($this->table, $data);
    }

    public function get_data()
    {
        $sql = $this->db->get($this->table)->result();
        return $sql;
    }

    public function get_data_by_username($username)
    {
        $sql = $this->db->get_where($this->table, array('username' => $username))->row();
        return $sql;
    }

    public function update($uname)
    {
        $nama = $this->input->post('txtnama', true);
        $role = $this->input->post('txtrole', true);
        // $username = $this->input->post('txtusername', true);
        $password = $this->input->post('txtpassword', true);

        // echo "nama : ". $nama. "</br>";
        // echo "role : ". $role. "</br>";
        // echo "username : ". $username. "</br>";
        // echo "password : ". $password. "</br>";

        if (empty($password)) {
            $data = array(
                // 'username' => $username,
                'name' => $nama,
                'role' => $role
            );
        } else {
            $data = array(
                // 'username' => $username,
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'name' => $nama,
                'role' => $role
            );
        }

        $this->db->update($this->table, $data, array('username' => $uname));
    }
}
