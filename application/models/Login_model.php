<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function cek_user()
	{
		$login = $this->db->join('level','level.id_level=admin.id_level')
						->where('username', $this->input->post('username'))
						->where('password', $this->input->post('password'))
						->get('admin');

		if ($this->db->affected_rows()>0) 
		{
			$dt_admin=$login->row();
			$array = array('id_admin' => $dt_admin->id_admin,
							'username' => $dt_admin->username,
							'password' => $dt_admin->password,
							'nama_level' => $dt_admin->nama_level,
							'login_admin' => true 
						);

			$this->session->set_userdata($array);
			return true;
		}
		else
		{
			return false;
		}


	}

}