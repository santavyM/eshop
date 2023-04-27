<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$viewData = [];
		$viewData['items'] = $this->db->limit(9)->get('items')->result();
		$this->pagination->initalize([
			'base_url' => current_url();
			'total_rows' => $this->db->count_all_results('items');
		]);
		$viewData['pagination'] = $this->pagination->create_links();
		$this->load->view('inc/header');
		$this->load->view('home', $viewData);
		$this->load->view('inc/footer');
	}

	public function add_item()
	{
		$viewData = [];
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('title', 'title', 'required|min_length[3]|max_length[30]');
		$this->form_validation->set_rules('description', 'description', 'required');
		$this->form_validation->set_rules('price', 'price', 'required|numeric|greater_than[0]');

		if ($this->form_validation->run())
			{
				$upload = $this->do_upload();
				if(isset($upload['error']))
				{
					$viewData['error'] = $upload['error'];
				}else{
					$insertData = [
						'title' => $this->input->post('title'),
						'price' => $this->input->post('price'),
						'description' => $this->input->post('description'),
						'image' => $upload['data']
					];
					echo var_dump($insertData);
					$this->db->insert('items', $insertData);
				}
			}
		$this->load->view('inc/header');
		$this->load->view('inc/footer');
		$this->load->view('add_item', $viewData);
	}

	private function do_upload()
        {
	$config = [
		'upload_path' => './uploads/',
		'allowed_types' => 'gif|jpg|png',
		'max_size' => 1024,
		'encrypt_name' => true
	];

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('image'))
                {
					return array('error' => $this->upload->display_errors($this->config->item("error_prefix"), $this->config->item("error_suffix")));
				}
				else
				{
					return array('data' => $this->upload->data('file_name'));
                }
        }
}
