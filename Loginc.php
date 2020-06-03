<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loginc extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 **/
	public function index()
	{
		
	
		$this->load->view('Login');	

	}

	public function loginusers()
	{

		$this->form_validation->set_rules('inputEmail', 'Email address', 'required');
		$this->form_validation->set_rules('inputPassword', 'Password', 'required');


		if ($this->form_validation->run() == FALSE)
                {
					


                        $this->load->view('Login');
                }
                else
                {

					

						$this->load->model('Model_login');
						$result = $this->Model_login->getuserdata();

						if($result != false){

							$user_data = array(
								'user_id' => $result->id,
								'firstName' => $result->firstName,
								'lastName' => $result->lastName,
								'inputEmail' => $result->inputEmail,
								'loggedin' => TRUE
					
							);
							$this->session->set_userdata($user_data);
							redirect('Dashboardc/index');



						}else{

							$this->session->set_flashdata('errormsg','Entered email and password incorrect,Try Agian');
							redirect('Loginc/index');

						}
					

                }
			

	}



}
