<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		$this->load->model('m_post');
		$data['get_data'] = $this->m_post->get_data_all();
		$this->load->view('dashboard/index', $data);
	}
}
