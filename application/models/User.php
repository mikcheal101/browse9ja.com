<?php

class User extends CI_Model {

	public function __construct () {
		parent::__construct ();
	}

	public function authenticate () {
		$user = [
			'username' => $this->input->post ('username'),
			'password' => md5 ($this->input->post ('password')),
		];

		$this->db->limit (1);
		$this->db->where ($user);
		$result = $this->db->get ('users')->result_array ();

		return (count ($result) > 0) ? result[0] : null;
	}

	public function loadInboxMessages ($user_id) {
		$this->db
			->select ('*')
			->from ('messages')
			->where (['reciever' => $user_id])
			->order_by ('ts_sent', 'DESC');
		$data = $this->db->get ()->result_array ();
		foreach ($data as $message) {
			$message['subject'] = base64_decode($message['subject']);
			$message['message'] = base64_decode($message['message']);
		}
		return $data;
	}

	public function loadOutboxMessages ($user_id) {
		$this->db
			->select ('*')
			->from ('messages')
			->where (['sender' => $user_id])
			->order_by ('ts_sent', 'DESC');
		$data = $this->db->get ()->result_array ();
		foreach ($data as $message) {
			$message['subject'] = base64_decode($message['subject']);
			$message['message'] = base64_decode($message['message']);
		}
		return $data;
	}

	public function getMessage ($message_id) {
		$this->db
			->select ('*')
			->from ('messages')
			->where (['__id' => $message_id])
			->limit (1);
		$data = $this->db->get ()->result_array ();
		foreach ($data as $message) {
			$message['subject'] = base64_decode($message['subject']);
			$message['message'] = base64_decode($message['message']);
		}
		return $data[0];
	}

	public function markMessageRead ($message_id) {
		$this->db->update ('messages', [
			'reciever_status' => 1
		], [
			'__id' => $message_id
		]);
	}

	public function sendMessage ($from) {
		$to 	= $this->input->post ('to');

		$this->db->insert ('messages', [
			'sender' 	=> $from,
			'reciever'	=> $to,
			'subject'	=> base64_encode ($this->input->post ('subject')),
			'message'	=> base64_encode ($this->input->post ('message'))
		]);
	}

	public function loadCompanies () {
		$this->db
			->select ('c.agent, c.area, c.email, c.image, c.logo, c.name, c.rc_number, c.state, c.street, c.tel, c.__id as id, u.__id, u.username, u.ts')
			->from ('company c')
			->join ('users u', 'u.__id = c.user');
		return $this->db->get ()->result_array ();
	}

	public function getCompany ($company_id) {
		$this->db
			->select ('c.agent, c.area, c.email, c.image, c.logo, c.name, c.rc_number, c.state, c.street, c.tel, c.__id as id, u.__id, u.username, u.ts')
			->from ('company c')
			->join ('users u', 'u.__id = c.user')
			->where (['__id' => $company_id])
			->limit (1);
		return $this->db->get ()->result_array ();
	}

}