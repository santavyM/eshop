<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manager extends CI_Controller {
	private $userData;

	public function __construct(){
		parent::__construct();

		$this->userData = $this->session->userdata();

        
	}

	public function users(){
        $viewData = [];
        
        $start = $this->input->get('per_page');
		$limit = $this->config->item('per_page');

        $viewData['items'] = $this->db->limit($start, $limit)->get('users')->result();

        $this->pagination->initialize([
			'base_url' => base_url('manager/users'),
			'total_rows' => $this->db->count_all_results('users')
		]);
		$viewData['pagination'] = $this->pagination->create_links();

        $this->render('manager/users', $viewData);
    }

	public function delete_users($id)
	{
		$item = $this->db->select('email')->where('id', $id)->get('users')->row();
		if(is_object($item)){
			$this->db->delete('users', array('id' => $id));
			$this->add_alert('success', 'User delete successful');
		}
		redirect(base_url('manager/users'));

	}
	
	public function edit_user($id)
	{
		$viewData = [];

        $user = $this->db->where('id', $id)->get('users')->row();
        if(!is_object($user)){
            show_404();
        }

		$this->load->helper('form');
		$this->load->library('form_validation');

		
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('first_name', 'First name', 'required|trim');
		$this->form_validation->set_rules('last_name', 'Last name', 'required|trim');
		$this->form_validation->set_rules('level', 'level', 'required|trim|numeric');
		$this->form_validation->set_rules('password', 'Password', 'trim');

		if ($this->form_validation->run())
			{
				$data = [
					'email'		 	=> $this->input->post('email'),
					'first_name' 	=> $this->input->post('first_name'),
					'last_name' 	=> $this->input->post('last_name'),
					'level' 		=> $this->input->post('level')
				];

				$password = $this->input->post('password');
				if($password)
				{
					$data['password'] = md5(sha1($this->input->post('password')));
				}

				$this->db->where('id', $id)->update('users', $data);
				$viewData['success'] = 'User successfully updated';
				redirect(base_url('index.php/manager/users'));
			}
            $viewData['user'] = $user;

			$this->render('manager/edit_user', $viewData);
	}

    public function items(){
        $viewData = [];
        
        $start = $this->input->get('per_page');
		$limit = $this->config->item('per_page');

        $viewData['items'] = $this->db->limit($start, $limit)->get('items')->result();

        $this->pagination->initialize([
			'base_url' => base_url('manager/items'),
			'total_rows' => $this->db->count_all_results('items')
		]);
		$viewData['pagination'] = $this->pagination->create_links();

        $this->render('manager/items', $viewData);
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
					$this->db->insert('items', $insertData);
					redirect(base_url('index.php/manager/items'));

				}
			}

		$this->render('manager/add_item', $viewData);
	}

    public function edit_item($item_id)
	{
		$viewData = [];

        $item = $this->db->where('id', $item_id)->get('items')->row();
        if(!is_object($item)){
            show_404();
        }

		$this->load->helper('form');
		$this->load->library('form_validation');

		
		$this->form_validation->set_rules('title', 'title', 'required|min_length[3]|max_length[30]');
		$this->form_validation->set_rules('description', 'description', 'required');
		$this->form_validation->set_rules('price', 'price', 'required|numeric|greater_than[0]');

		if ($this->form_validation->run())
			{
				$updateData = [
					'title' => $this->input->post('title'),
					'price' => $this->input->post('price'),
					'description' => $this->input->post('description')
				];

				$upload = $this->do_upload();
				if(isset($upload['error']))
				{
					$viewData['error'] = $upload['error'];
				}else{
					$updateData['image'] = $upload['data'];
				}
				$this->db->where('id', $item_id)->update('items', $updateData);
				$viewData['success'] = 'item successfully updated';
				redirect(base_url('index.php/manager/items'));
			}
            $viewData['item'] = $item;

			$this->render('manager/edit_item', $viewData);
	}

	public function delete_item($item_id)
	{
		$item = $this->db->select('title')->where('id', $item_id)->get('items')->row();
		if(is_object($item)){
			$this->db->delete('items', array('id' => $item_id));
			$this->add_alert('success', 'item delete successful');
		}
		redirect(base_url('index.php/manager/items'));

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
				redirect(base_url('index.php/manager/categories'));
			}

		$this->render('manager/add_category', $viewData);
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

	private function add_alert($type, $message){
		$alert = ['type' => $type, 'message' => $message];
		$this->session->set_flashdata('alert', $alert);
	}

	private function render($page, $data = [])
	{
		$categories = $this->db->get('categories')->result();
		$headerData = [
			'categories' => $categories,
			'user' => $this->userData,
			'alert' => $this->session->flashdata('alert')
		];

		$this->load->view('inc/header', $headerData);
		$this->load->view($page, $data);
		$this->load->view('inc/footer');
	}
}
