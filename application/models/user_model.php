<?php

class User_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
        

    public function add_new_user($first, $last, $email, $pass, $code)
    {
        $data = array(
            'first_name' => $first,
            'last_name' => $last,
            'email' => $email,
            'password' => $pass,
            'is_activated' => 0,
            'activation_code' => $code,
            'register_date' => date('Y-m-d')
        );
        $this->db->insert('cot_users', $data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }
    
    public function is_user($email, $pass)
    {
        $this->db->select('id');
        $this->db->from('cot_users');
        $this->db->where('email', $email);
        $this->db->where('password', $pass);
        $query = $this->db->get();
        if($query->num_rows() == 1)
        {
          $row = $query->row();
          return $row->id;
        }
        else
        {
          return false;
        }
    }
    
    public function add_news_article($user_id, $title, $photo, $desc, $reporter)
    {
        $data = array(
            'user_id' => $user_id,
            'news_title' => $title,
            'photo_name' => $photo,
            'news_text' => $desc,
            'published_date' => date('Y-m-d H:i:s'),
            'reporter' => $reporter
        );
        $this->db->insert('cot_news', $data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }

    public function get_single_news_article($id)
    {
        $this->db->select('*');
        $this->db->from('cot_news');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return (array) $query->row();
    }
    
    public function get_user_news_article($user_id)
    {
        $this->db->select('id, news_title, published_date');
        $this->db->from('cot_news');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get();
        return (array) $query->result();
    }

    public function delete_article($id)
    {
        return $this->db->delete('cot_news', array('id' => $id));
    }


}

?>