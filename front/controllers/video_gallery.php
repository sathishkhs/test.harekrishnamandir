<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
   
class Video_gallery extends MY_Controller {
    public $class_name;
    public $api;
    function __construct() {
        parent::__construct();
        $this->class_name = strtolower(get_class());
        $this->load->model('index_model');
    
    }
    public function index() {
        $data = $this->data;
        $this->index_model->primary_key = array('status_ind'=>1);
        $data['categories'] = $this->index_model->view_data('video_gallery');
        $data['view_path'] = "video_gallery/categories"; 
        $this->index_model->primary_key = array('status_ind'=>1);
        $data['banners'] = $this->index_model->view_data('banners');
        $data['scripts'] = array('assets/javascripts/index.js');
        $this->load->view('templates/gallery_page', $data);
    }

    public function show_gallery($video_gallery_id) {
        $data = $this->data;
        $this->index_model->primary_key = array('video_gallery_id'=>$video_gallery_id,'status_ind'=>1);
        $data['galleries'] = $this->index_model->view_data('gallery_videos');
        $data['view_path'] = "video_gallery/page"; 
        $this->index_model->primary_key = array('status_ind'=>1);
        $data['banners'] = $this->index_model->view_data('banners');
        $data['scripts'] = array('assets/javascripts/index.js');
        $this->load->view('templates/gallery_page', $data);
    }

    public function gallery_videos($video_gallery_id){
        $data = $this->data;
        $this->index_model->primary_key = array('video_gallery_id'=>$video_gallery_id, 'status_ind'=>1);
        $data['gallery_videos'] = $this->index_model->view_data('gallery_videos');
        $data['view_path'] = "video_gallery/page"; 
        $this->index_model->primary_key = array('status_ind'=>1);
        $data['banners'] = $this->index_model->view_data('banners');
        $data['video_gallery_id'] = $video_gallery_id;
        $data['scripts'] = array('assets/javascripts/index.js');
        $this->load->view('templates/gallery_page', $data);
    }
}