<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Blog_Model extends CI_Model {

    private $table;
    public $primary_key;
    public $data;

    function __construct() {
        parent::__construct();
        $this->table = substr(strtolower(get_class($this)), 0, -6);
        $this->primary_key = array();
        $this->data = array();
    }

    private function reset() {
        $this->primary_key = array();
        $this->data = array();
    }

    private function reset_pk() {
        $this->primary_key = array();
    }

    private function reset_data() {
        $this->data = array();
    }
    public function insert($table){
     $q = $this->db->insert($table,$this->data);
     $this->reset_data();
     return $this->db->insert_id();   
    }

    public function update($table){
        $this->db->where($this->primary_key);
        $this->db->update($table,$this->data);
        return true;
    }
    public function get_donation_page() {
        $type_id = 5;
        $this->db->where('type_id', $type_id);
        $this->db->select('page_id,page_title,page_slug');
        $this->db->from($this->table);
        $query = $this->db->get();
        //echo $this->db->last_query(); exit;
        return $query->result();
    }

    public function get_row($table,$preview = "") {
        if ($preview != "yes") {
            $this->db->where('status_ind', '1');
        }
        $this->db->where($this->primary_key);
        $query = $this->db->get($table);
        $row = $query->row();
        $this->reset_pk();
        //echo $this->db->last_query(); exit;
        return $row;
    }

    public function get_widgetcontent() {
        $this->db->where($this->primary_key);
        $this->db->where('p.status_ind', '1');
        $this->db->select('p.page_id,p.page_title,p.page_path,p.alt_title,p.page_slug,p.page_content,p.page_short_description,p.nofollow_ind');
        $this->db->from($this->table . ' as p');
        $query = $this->db->get();
        $row = $query->row();
        $this->reset_pk();
        return $row;
    }
    public function getdata($table){
        $this->db->select('*');
        $this->db->where('status_ind', '1');
        $this->db->where($this->primary_key);
        $q = $this->db->get($table);
        $this->reset_pk();
        return $q->result();
    }
    public function view_rowdata($table){
        $this->db->select('*');
        $this->db->where('status_ind', '1');
        $this->db->where($this->primary_key);
        $q = $this->db->get($table);
        $this->reset_pk();
        return $q->row();
    }
    public function blog_view_data($table){
       
        $this->db->select('blog.*, c.category_id as cid, c.category_name as cname, a.id as aid, a.name as aname');
        $this->db->from('blog');
        $this->db->join('blogcategory c', 'blog.category_id = c.category_id', 'left');
        $this->db->join('author a', 'a.id = blog.author', 'left');
        if($table == 'blog'){
            if(!empty($this->data['blog_search'])){
                // $this->db->group_start();
                $this->db->like('blog.title', $this->data['blog_search'])
                ->or_like('blog.meta_keywords', $this->data['blog_search'])
                ->or_like('c.category_name', $this->data['blog_search'])
                ->or_like('a.name', $this->data['blog_search']);
                
            }
        }
        $this->db->where('blog.status_ind', '1');
        $this->db->order_by('created_at', 'desc');
        $q = $this->db->get();
       
        $this->reset();
        return $q->result();
    }
    public function view_data($table){
        $this->db->select('*');
        $this->db->where('status_ind', '1');
        if($table == 'blog'){
            $this->db->order_by('created_at', 'desc');
            if(!empty($this->data['blog_search'])){
                $this->db->like('title', $this->data['blog_search'])
                 ->or_like('meta_keywords', $this->data['blog_search']);
               
            }
        }
        $q = $this->db->get($table);
        $this->reset();
        return $q->result();
    }
    public function view_result_data($table){
        $this->db->select('*');
     
        $q = $this->db->get($table);
        $this->reset();
        return $q->result();
    }
    
       public function view_limit_data($table){
        $this->db->select('*');
        $this->db->limit(12);
        $this->db->order_by('id','desc');
        $this->db->where('status_ind', '1');
        $q = $this->db->get($table);
        $this->reset();
        return $q->result();
    }
    
    public function view(){
        $this->db->where('status_ind',1);
        $this->db->select('*');
        $q = $this->db->get($this->table);
        $this->reset();
        return $q->result();
    }
   public function get_sevas($sevas_page_id){
      
       $this->db->select('*');
        $this->db->where('sevas_page_id',$sevas_page_id);
       $sevas_page = $this->db->get('sevas')->result();
    
     return $sevas_page;
   }
   public function row_data($table) {
    $this->db->where($this->primary_key);
    $query = $this->db->get($table);
    $row = $query->row();
    $this->reset_pk();
    return $row;
}

public function get_rowdata($table)
{
   
    $this->db->where($this->primary_key);
    $query = $this->db->get($table);
    $row = $query->result();
    $this->reset_pk();
    return $row;
}
public function view_data_random($table){
    $this->db->select('category_id,category_name');
    $this->db->where('status_ind', '1');
    $this->db->order_by('rand()');
    $this->db->limit(6);
    $q = $this->db->get($table);
    $this->reset();
    return $q->result();
}

public function view_posts_limit($table){
    $this->db->select('*');
    $this->db->where('status_ind', '1');
    $this->db->order_by('created_at', 'desc');
    // $this->db->order_by('rand()');
    $this->db->limit(6);
    $q = $this->db->get($table);
    $this->reset();
    return $q->result();
}
}
