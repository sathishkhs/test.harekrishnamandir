<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
   
class Gallery extends MY_Controller {
    public $class_name;
    public $api;
    function __construct() {
        parent::__construct();
        $this->class_name = strtolower(get_class());
        $this->load->model('index_model');
    
    }
    public function index() {
        $data = $this->data;
        $this->index_model->primary_key = array('status_ind'=>1,);
        $data['categories'] = $this->index_model->view_data('category_gallery');
        $data['view_path'] = "gallery/image_gallery"; 
        $this->index_model->primary_key = array('status_ind'=>1);
        $data['banners'] = $this->index_model->view_data('banners');
        $data['scripts'] = array('assets/javascripts/index.js');
        $this->load->view('templates/gallery_page', $data);
    }

    public function show_gallery($category_id) {
        $data = $this->data;
        $this->index_model->primary_key = array('category_id'=>$category_id,'status_ind'=>1);
        $data['galleries'] = $this->index_model->view_data('gallery');
        $data['view_path'] = "gallery/show_gallery"; 
        $this->index_model->primary_key = array('status_ind'=>1);
        $data['banners'] = $this->index_model->view_data('banners');
        $data['scripts'] = array('assets/javascripts/index.js');
        $this->load->view('templates/gallery_page', $data);
    }

    public function gallery_images($gallery_id, $category_id){
        $data = $this->data;
        $this->index_model->primary_key = array('category_id'=>$category_id,'gallery_id'=>$gallery_id, 'status_ind'=>1);
        $data['gallery_images'] = $this->index_model->view_data('gallery_images');
        $data['view_path'] = "gallery/page"; 
        $this->index_model->primary_key = array('status_ind'=>1);
        $data['banners'] = $this->index_model->view_data('banners');
        $data['gallery_id'] = $gallery_id;
        $data['scripts'] = array('assets/javascripts/index.js');
        $this->load->view('templates/gallery_page', $data);
    }
}