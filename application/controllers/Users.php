<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct()
    {
            parent::__construct();
            $this->load->model('user_model');
            $this->load->helper('url_helper');
            $this->load->library('unit_test');
            $this->load->library('session');
    }
    
    
    public function add()
    {
        if(!empty($_POST)) 
        {
            $first_name = $this->input->post('first_name');
            $last_name = $this->input->post('last_name');
            $email = $this->input->post('email');
            $pass = $this->input->post('pass');
            $id = $this->add_user($first_name, $last_name, $email, $pass);
            $this->session->set_userdata('user_id', $id);
            redirect('homes/index');
        } 
        else 
        {
            $this->load->helper('form');
            $this->load->view('templates/header');
            $this->load->view('users/add');
            $this->load->view('templates/footer');
        }
    }
    
    public function add_user($first, $last, $email, $pass) 
    {
        $code = time().rand(1,10000);
        $value = $this->user_model->add_new_user($first, $last, $email, $pass, $code);
        return $value;     
    }
    
    
    
    
    
        
}
