<?php

class M_login extends CI_Model
{
	public function ceklogin()
	{
		$user = $this->input->post('txtusername', true);
		$pass = $this->input->post('txtpassword', true);

		$this->db->where(array('username' => $user));
		$query = $this->db->get('account');

		// $query = $this->db->get_where('user', array('username' => $user, 'role' =>'admin'));
		if ($query->num_rows() == 0) {
			// alert html
			$msg = '
				<div class="alert alert-danger alert-dismissable">
					<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
					<strong>Gagal!</strong> Username tidak ditemukan !
				</div>
				';
			// set flashdata
			$this->session->set_flashdata('msg', $msg);
			// redirect
			redirect(base_url('login'));
		} else {
			$role = $query->row()->role;
			if ($role == 'admin') {
				$get_password = $query->row()->password;
				$validasi = password_verify($pass, $get_password);
				if ($validasi) {
					// set session data
					$sess_data['status'] = 'login';
					$sess_data['username'] = $query->row()->username;
					$sess_data['nama'] = $query->row()->name;
					$sess_data['role'] = 'admin';
					$sess_data['last_login_time'] = time();

					$this->session->set_userdata($sess_data);

					echo '<script>window.location.href="' . base_url() . 'post";</script>';
				} else {
					// alert html
					$msg = '
					<div class="alert alert-danger alert-dismissable">
					<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
						<strong>Gagal!</strong> Password salah !
					</div>
							';
					// set flashdata
					$this->session->set_flashdata('msg', $msg);
					// redirect
					redirect(base_url('login'));
				}
			} elseif ($role == 'author') {
				$get_password = $query->row()->password;
				$validasi = password_verify($pass, $get_password);
				if ($validasi) {
					// set session data
					$sess_data['status'] = 'login';
					$sess_data['username'] = $query->row()->username;
					$sess_data['nama'] = $query->row()->name;
					$sess_data['role'] = 'author';
					$sess_data['last_login_time'] = time();

					$this->session->set_userdata($sess_data);

					echo '<script>window.location.href="' . base_url() . 'post";</script>';
				} else {
					// alert html
					$msg = '
					<div class="alert alert-danger alert-dismissable">
					<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
						<strong>Gagal!</strong> Password salah !
					</div>
							';
					// set flashdata
					$this->session->set_flashdata('msg', $msg);
					// redirect
					redirect(base_url('login'));
				}
			}
		}
	}
}
