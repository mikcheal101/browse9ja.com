<?php

class Company extends CI_Model {

	public function addCompany ($image, $logo) {
		$this->db->trans_start ();
			$this->db->insert ('users', [
				'username'	=> $this->input->post ('username'),
				'password'	=> md5 ($this->input->post ('password')),
			]);
			$this->db->insert ('company', [
				'area'		=> $this->input->post ('area'),
				'email'		=> $this->input->post ('email'),
				'name'		=> $this->input->post ('name'),
				'rc_number'	=> $this->input->post ('rc_number'),
				'state'		=> $this->input->post ('state'),
				'street'	=> $this->input->post ('street'),
				'tel'		=> $this->input->post ('tel'),
				'user'		=> $this->db->insert_id (),
				'image'		=> $image,
				'logo'		=> $logo
			]);
		$this->db->trans_complete ();
		return $this->db->trans_status ();
	}

	public function updateProfile ($me, $image, $logo) {
		$this->db->trans_start ();	
			$user 		= ['username' => $this->input->post ('username')];
			$new_pwd	= md5 ($this->input->post ('password'));

			if ($new_pwd !== $me['password']) $user['password'] = $new_pwd;

			$this->db->update ('users', $user, [
				'__id' => $me['user'] 
			]);

			$company = [
				'area' 		=> $this->input->post ('area'),
				'email' 	=> $this->input->post ('email'),
				'name' 		=> $this->input->post ('name'),
				'state'		=> $this->input->post ('state'),
				'street' 	=> $this->input->post ('street'),
				'tel'		=> $this->input->post ('tel'),
			];
			if ($image !== null) {
				$company['image'] = $image;
			}
			if ($logo !== null) {
				$company['logo'] = $logo;
			}

			$this->db->update ('company', $company, ['__id' => $me['__id']]);
		$this->db->trans_complete ();
		return $this->db->trans_status ();
	}

	public function profile ($user_id) {
		$this->db->select ('*');
		$this->db->from ('users');
		$this->db->where (['__id' => $user_id]);
		$this->db->join ('company', 'company.user = users.__id');
		$array = $this->db->get ()->result_array ();

		return count ($array) > 0 ? $array[0] : null;
	}
}