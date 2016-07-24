<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homes extends CI_Controller {

    public function __construct()
    {
            parent::__construct();
            $this->load->model('user');
            $this->load->helper('url_helper');
            $this->load->library('unit_test');
            $this->load->library('session');
    }
    
    public function index()
    {
        if($this->session->has_userdata('user_id')) 
        {
            redirect('homes/user_view');
        } 
        else
        {
           redirect('homes/login');
        }
    }
    
    public function login() {
        if(!empty($_POST)) 
        {
            $email = $this->input->post('email');
            $pass = $this->input->post('pass');
            $v = $this->is_user($email, $pass);
            if($v !== false) {
                $this->session->set_userdata('user_id', $v);
                redirect('homes/index');
            }
            else
            {
                $data['message'] = 'Sorry, Email or Password did not match';
                $this->load->helper('form');
                $this->load->view('templates/header');
                $this->load->view('homes/login', $data);
                $this->load->view('templates/footer');
            }            
        }
        else 
        {
            $this->load->helper('form');
            $this->load->view('templates/header');
            $this->load->view('homes/login');
            $this->load->view('templates/footer');
        }
        
    }
    
    public function is_user($email, $pass) {
        $value = $this->user->is_user($email, $pass);
        return $value;
    }


    public function logout() {
        $this->session->sess_destroy();
        redirect('homes/index');
    }
    
    public function user_view() {
       $user_id = $this->session->user_id;
       $data['data'] = $this->user_data($user_id);
       $this->load->view('templates/header');
       $this->load->view('homes/user_view', $data);
       $this->load->view('templates/footer');
    }
    
    public function user_data($user_id) {
        $data = $this->user->get_user_news_article($user_id);
        return $data;
    }
        
    public function account_activation() {
        
    }
    
    public function forget_password() {
        
    }
        
        
        
        
        
}
