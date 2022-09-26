<?php

class Model_auth extends CI_Model
{

	function cek_user($username = null, $password = null)
	{

		$this->db->where(array('username' => $username, 'password' => $password));
		return $this->db->get('users2');
	}
	function update_password($id_user)
	{
		$password_lama = $this->input->post('old_password');
		$password_baru = $this->input->post('new_password');
		$cek = $this->db->get_where('users2', array('id_user' => $id_user, 'password' => md5($password_lama)))->num_rows();
		echo $cek;
		if ($cek != 0) {

			$data = array(
				'password' => md5($password_baru)
			);
			$this->db->update('users2', $data, array('id_user' => $id_user));
			$this->session->set_flashdata(
				'msg',

				'<div class="alert bg-green alert-dismissible" role="alert">

	              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

	                 <i class="material-icons" style="float:left; margin-right:10px">check</i> Password Berhasil Di Ubah !

	          </div>'
			);
			redirect('auth/changepassword');
		} else {
			$this->session->set_flashdata(
				'msg',

				'<div class="alert bg-red alert-dismissible" role="alert">

	              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

	                 <i class="material-icons" style="float:left; margin-right:10px">check</i> Password Lama Salah !

	          </div>'
			);
			redirect('auth/changepassword');
		}
	}
}
