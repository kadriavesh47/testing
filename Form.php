<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends CI_Controller {

	public function index()
	{
		$this->load->helper('form');

        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Username', 'required|alpha|callback_username_check',array('required'=>'Please enter username'));
		$this->form_validation->set_rules('password', 'Password', 'required|numeric|min_length[5]',array('required'=>'Please enter password'));
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|numeric|min_length[5]|matches[password]',array('required'=>'Please enter confirm password'));
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email',array('required'=>'Please enter email'));

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('myform');
        }
        else
        {
            //$this->load->view('formsuccess');
            redirect('login/login_page');
        }
	}

	public function username_check($str)
    {
        if ($str == 'test')
        {
            $this->form_validation->set_message('username_check', 'The {field} field can not be the word "test", already exist');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }
}
