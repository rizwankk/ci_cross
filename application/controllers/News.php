<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->helper('url_helper');
        $this->load->library('unit_test');
        $this->load->library('session');
    }

    public function index($user_id = NULL)
    {
            $this->load->view('welcome_message');
    }
        
    public function add() {
        if(!empty($_POST)) {
            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            //$config['max_size']             = 100;
            //$config['max_width']            = 1024;
            //$config['max_height']           = 768;
            $ext = pathinfo($_FILES["userfile"]['name'], PATHINFO_EXTENSION);
            $new_name = time()."-".rand(1,1000).".".$ext;
            //echo $new_name;            exit();
            $config['file_name'] = $new_name;
            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('userfile'))
            {
                echo "Error"; exit;
                    //$error = array('error' => $this->upload->display_errors());
                    //$this->load->view('upload_form', $error);
            }
            else
            {
                $title = $this->input->post('title');
                $photo = $new_name;
                $desc = $this->input->post('desc');
                $reporter = $this->input->post('reporter');
                $user_id = $name = $this->session->user_id;
                //echo $user_id. " --> " . $title. " " . $photo . " " . $desc . " " . $reporter;                exit();
                $v = $this->add_news_article($user_id, $title, $photo, $desc, $reporter);
                redirect('news/view/'.$v);
                //echo $v;                exit();
                    //$data = array('upload_data' => $this->upload->data());
                    //$this->load->view('upload_success', $data);
            }
           
           
           
        }
        else
        {        
            $this->load->helper('form');
            $this->load->view('templates/header');
            $this->load->view('news/add');
            $this->load->view('templates/footer');
        }
    }
    
    public function add_news_article($user_id, $title, $photo, $desc, $reporter) {
        $value = $this->user_model->add_news_article($user_id, $title, $photo, $desc, $reporter);
        return $value;     
    }
    
    public function view($id) {
        $data['data'] = $this->user_model->get_single_news_article($id);
        $this->load->view('templates/header');
        $this->load->view('news/view', $data);
        $this->load->view('templates/footer');
    }
    
    public function delete($id) {
        $this->user_model->delete_article($id);
        redirect('homes/index');
    }
        
}
