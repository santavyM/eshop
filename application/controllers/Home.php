<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->load->view('home');
	}

	public function add_item()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation
			->set_rules('title', 'Title', 'required|min_length[3]|max_length[30]')
			->set_rules('description', 'description', 'required')
			->set_rules('price', 'Price', 'required|numeric|greater_than[0]');

		if ($this->form_validation->run())
			{

			}
		$this->load->view('add_item');
	}
}
