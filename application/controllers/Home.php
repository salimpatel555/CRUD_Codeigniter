<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model'); 
		$this->load->library('upload');
		$this->load->library('email');

	}

	
	public function index(){
		$data['user']= $this->User_model->show();
		$this->load->view('index',$data);
	}


	public function add(){		
		$this->form_validation->set_rules('firstname', 'First Name', 'required');
		$this->form_validation->set_rules('lastname', 'Last Name', 'required');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email|is_unique[crud.email]');		
		// $this->form_validation->set_rules('image', 'Image', 'required');
		// print_r($this->form_validation->run());
		$data = array(
			'first_name' =>$this->input->post('firstname'),
			'last_name' =>$this->input->post('lastname'),
			'email' =>$this->input->post('email'),
		);
		if (!empty($_FILES['image']['name'])) {
			$config['upload_path']   = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = 4096;
            $config['max_width']     = 2000;
            $config['max_height']    = 2000;
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('image')) {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('error', $error);
                redirect('home/add');
            } else {
                $post_image            = $this->upload->data();
                $data['image'] = $post_image['file_name'];
            }
		}
		if($this->form_validation->run()== true){
			$data = $this->User_model->add($data);
			$this->session->set_flashdata('message', 'Product Inserted Sucessfully');
            redirect('home');
		}else{
			$this->session->set_flashdata('error', validation_errors());
            $this->load->view('add');
		}			
		
	}


	public function edit($id){
		$data['user']= $this->User_model->get_user($id);
		// print_r($data); exit;
		$this->load->view('edit',$data);
	}


	public function update($id){
		$this->form_validation->set_rules('firstname', 'First Name','required');
		$this->form_validation->set_rules('lastname','Last Name', 'required');
		$this->form_validation->set_rules('email','Email','required');

		$data = array(
			'first_name'=> $this->input->post('firstname'),
			'last_name'=> $this->input->post('lastname'),
			'email'=> $this->input->post('email'),
		);

		if($this->form_validation->run()== true){
			$this->User_model->update_user($id,$data);
			$this->session->set_flashdata('message','Product Updated Sucessfully');
			redirect('home');
		}else{
			$this->session->set_flashdata('error', validation_errors());
			redirect('home/edit');
		}

	}

	public function delete($id){
		$this->User_model->delete_user($id);
		$this->session->set_flashdata('message','Product Deleted Sucessfully');
		redirect('home');
	}



    public function send_email(){

		$config = array(
			'protocol'  => 'smtp',
			'smtp_host' => 'ssl://smtp.gmail.com',
			'smtp_port' => 465,
			'smtp_user' => 'salimpatels512@gmail.com',
			'smtp_pass' => 'salim@512#@',
			'mailtype'  => 'html',
			'charset'   => 'utf-8'
		);
		
		$this->email->initialize($config);
	
        $this->email->to('salimpatels512@gmail.com');
		$this->email->from('salimshaikh512512@gmail.com');
		$this->email->subject('Email Subject');
		$this->email->message('Hello This Email Message');
		if($this->email->send()){
			echo 'Email Send SuccessFully';
		}else{
			print_r($this->email->print_debugger());
		}

	
	}


} 


	