<?php

class UserController extends CI_Controller {

	public function __construct () {
		parent::__construct ();
	}

	public function index () {
		$this->load->view ('header/head', []);
		$this->load->view ('home', []);
	}

	public function signIn () {
		$this->load->view ('header/head', []);
		$this->load->view ('signin', []);
	}

	public function signUp () {

		$this->load->view ('header/head', []);
		$this->load->view ('signup', []);
	}
}