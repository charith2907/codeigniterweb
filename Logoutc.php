<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logoutc extends CI_Controller {


	public function index()
	{
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('firstName');
        $this->session->unset_userdata('lastName');
        $this->session->unset_userdata('inputEmail');
        $this->session->unset_userdata('loggedin');
        $this->session->unset_userdata('admin');
        
        redirect('Loginc/index');

	

	}
}