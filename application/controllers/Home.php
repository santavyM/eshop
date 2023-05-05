<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$viewData = [];
		$search = $this->input->get('search');
		$start = $this->input->get('per_page');
		$limit = $this->config->item('per_page');
		$where = [];

		if($search){
			$where['title LIKE'] = '%'. $search .'%';
		}


		$viewData['items'] = $this->db->where($where)->limit($start, $limit)->get('items')->result();
		$this->pagination->initialize([
			'base_url' => current_url() . ($search ? '?search='.$search : ''),
			'total_rows' => $this->db->where($where)->count_all_results('items')
		]);
		$viewData['pagination'] = $this->pagination->create_links();

		$categories = $this->db->get('categories')->result();

		$this->load->view('inc/header',['categories'=>$categories]);
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
						'id' => $this->input->post(''),
						'title' => $this->input->post('title'),
						'price' => $this->input->post('price'),
						'description' => $this->input->post('description'),
						'image' => $upload['data']
					];
					$this->db->insert('items', $insertData);
				}
			}
		$this->load->view('inc/header');
		$this->load->view('inc/footer');
		$this->load->view('add_item', $viewData);
	}

	public function add_category()
	{
		$viewData = [];
		$this->load->helper('form');
		$this->load->library('form_validation');

		
		$this->form_validation->set_rules('title', 'title', 'required|min_length[3]|max_length[30]');
		
		if ($this->form_validation->run())
			{
				$insertData = [
				'title' => $this->input->post('title')
				];
				$this->db->insert('categories', $insertData);
			}
			
		$this->load->view('inc/header');
		$this->load->view('inc/footer');
		$this->load->view('add_category', $viewData);
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
