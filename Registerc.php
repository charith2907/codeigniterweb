<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registerc extends CI_Controller {


	public function index()
	{

		$this->load->view('Register');	

	}

	public function registerusers()
	{
		$this->form_validation->set_rules('firstName', 'First name', 'required');
		$this->form_validation->set_rules('lastName', 'Last name', 'required');
		$this->form_validation->set_rules('inputEmail', 'Email address', 'required|valid_email|is_unique[users.inputEmail]');
		$this->form_validation->set_rules('inputPassword', 'Password', 'required|min_length[6]');
		$this->form_validation->set_rules('confirmPassword', 'Confirm password', 'required|matches[inputPassword]');		

		if ($this->form_validation->run() == FALSE)
                {
                        $this->load->view('Register');
                }
                else
                {

						$this->load->model('Model_register');
						$response=$this->Model_register->insertdata();

						if($response){

							$this->session->set_flashdata('msg','Registered Successfully ,Please Login');
							redirect('Loginc/index');

						}else{

							$this->session->set_flashdata('msg','Registeration not successfull,Try Agian');
							redirect('Registerc/index');

						}


                }
			

	}



}