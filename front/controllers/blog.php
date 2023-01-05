<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Blog extends MY_Controller {
        public $class_name;
    function __construct() {
        parent::__construct();
        $this->class_name = strtolower(get_class());
        $this->load->model('blog_model');
    }

    public function index() {
        $blog_search = $this->input->post('blog_search');
        $data = $this->data;
        if(!empty($this->input->post('blog_search'))){
            $this->blog_model->data['blog_search'] = $this->input->post('blog_search');
        }
        $data['blog'] =  $this->blog_model->blog_view_data('blog'); 
        $data['categories'] = $this->blog_model->view_data('blogcategory');
        $data['posts'] = $this->blog_model->view_posts_limit('blog');
        $data['authors'] = $this->blog_model->view_result_data('author');
        $data['view_path'] =  'blog/posts'; 
        $data['scripts'] = array('assets/javascripts/index.js');
        $this->load->view('templates/blog_page', $data);
    }

    public function post($page_slug){
        $data = $this->data;
        if(is_numeric($page_slug)){
            $this->blog_model->primary_key = array('id'=>$page_slug);
            $data['post'] =  $this->blog_model->view_rowdata('blog'); 
        }else{
        $this->blog_model->primary_key = array('page_slug'=>$page_slug);
        $data['post'] = $data['page_items'] =  $this->blog_model->view_rowdata('blog'); 
        }
        $data['categories'] = $this->blog_model->view_data('blogcategory');
        $data['posts'] = $this->blog_model->view_posts_limit('blog');
        $data['authors'] = $this->blog_model->view_result_data('author');
        $data['view_path'] =  'blog/post_details'; 
        $data['scripts'] = array('assets/javascripts/index.js');
        $this->load->view('templates/blog_page', $data);
    }
    public function category($category_id){
        $data = $this->data;
        $this->blog_model->primary_key = array('category_id'=>$category_id);
        $data['blog'] =  $this->blog_model->getdata('blog'); 
        $data['categories'] = $this->blog_model->view_data('blogcategory');
        $data['posts'] = $this->blog_model->view_posts_limit('blog');
        $data['authors'] = $this->blog_model->view_result_data('author');
        $data['view_path'] =  'blog/category'; 
        $data['scripts'] = array('assets/javascripts/index.js');
        $this->load->view('templates/blog_page', $data);
    }
    public function author($author){
        $data = $this->data;
        $this->blog_model->primary_key = array('author'=>$author);
        $data['blog'] =  $this->blog_model->getdata('blog'); 
        $data['categories'] = $this->blog_model->view_data('blogcategory');
        $data['posts'] = $this->blog_model->view_posts_limit('blog');
        $data['authors'] = $this->blog_model->view_result_data('author');
        $data['view_path'] =  'blog/posts'; 
        $data['scripts'] = array('assets/javascripts/index.js');
        $this->load->view('templates/blog_page', $data);
    }
}