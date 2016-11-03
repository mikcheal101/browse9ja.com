<?php

class Customer extends CI_Model {

	public function __construct () {
		parent::__construct ();
	}

	public function addCustomer ($customer_image) :boolean {

		$this->db->trans_start ();
			$this->db->insert ('users', [
				'username' 	=> $this->input->post ('username'),
				'password'	=> md5 ($this->input->post ('password')),
			]);

			$this->db->insert ('customers', [
				'image' 	=> $customer_image,
				'email'		=> $this->input->post ('email'),
				'name'		=> $this->input->post ('name'),
				'tel'		=> $this->input->post ('tel'),
				'ip'		=> '',
				'user'		=> $this->db->insert_id ()
			]);
		$this->db->trans_complete ();
		return $this->db->trans_status ();
	}

	public function profile ($user_id) {
		$this->db->select ('u.__id as id, u.username, u.password, u.ts, c.email, c.image, c.ip, c.name, c.tel, c.__id');
		$this->db->from ('users');
		$this->db->where (['__id' => $user_id]);
		$this->db->join ('customers', 'customers.user = users.__id');
		$array = $this->db->get ()->result_array ();

		return count ($array) > 0 ? $array[0] : null;
	}

	public function updateProfile ($me, $image) :boolean {
		$this->db->trans_start ();	

			$user 		= ['username' => $this->input->post ('username')];
			$new_pwd	= md5 ($this->input->post ('password'));

			if ($new_pwd !== $me['password']) $user['password'] = $new_pwd;

			$this->db->update ('users', $user, [
				'__id' => $me['user'] 
			]);

			$customer = [
				'email' 	=> $this->input->post ('email'),
				'name'		=> $this->input->post ('name'),
				'tel'		=> $this->input->post ('tel'),
			];
			if ($image !== null) {
				$customer['image'] = $image;
			}

			$this->db->update ('customers', $customer, ['__id' => $me['__id']]);
		$this->db->trans_complete ();
		return $this->db->trans_status ();
	}



}