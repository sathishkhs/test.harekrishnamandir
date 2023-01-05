<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

    error_reporting(E_ALL);
ini_set("display_errors", 1);
class Gallery extends MY_Controller
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('gallery_model');
		$user_id = $this->session->userdata('user_id');
		if (empty($user_id)) {
			redirect('');
		}
	}

	public function index(){
		
		$data['view'] = 'gallery/category_list';
		$data['title'] = 'Administrator Dashboard';
		$data['page_heading'] = 'Category List';
		$data['breadcrumb'] = 'Category List';
		$data['scripts'] = array('assets/javascripts/gallery.js');
		$this->load->view('templates/dashboard', $data);
	}
    public function create_category(){
        $data['view'] = 'gallery/create_category';
		$data['title'] = 'Administrator Dashboard';
		$data['page_heading'] = 'Create Category';
		$data['breadcrumb'] = 'Create Category';
		$data['scripts'] = array('assets/javascripts/gallery.js');
		$this->load->view('templates/dashboard', $data);
    }
    public function category_edit($id){
		$this->gallery_model->primary_key = array('category_id'=>$id);
		$data['query'] = $this->gallery_model->get_row('category_gallery');
        $data['view'] = 'gallery/create_category';
		$data['title'] = 'Administrator Dashboard';
		$data['page_heading'] = 'Edit Category';
		$data['breadcrumb'] = 'Edit Category';
		$data['scripts'] = array('assets/javascripts/gallery.js');
		$this->load->view('templates/dashboard', $data);
    }
    public function category_list(){

        $draw = intval($this->input->post("draw"));
		$start = intval($this->input->post("start"));
		$length = intval($this->input->post("length"));
		$gallery = $this->gallery_model->get_pagination('category_gallery');

		$data = array();
		foreach ($gallery->result() as $row) {
                 
			$status = (!empty($row->status_ind) && ($row->status_ind == 1)) ? "<i class='fa fa-check-circle text-success'>Active</i> &nbsp;&nbsp;" : "<i class='nav-icon fa  fa-times-circle text-danger' >Inactive</i>";
			$data[] = array(
                $row->category_name,
                $row->created_date,
				$status,
				'
                    <td><div class="action-buttons">

					<a class="" title="Edit" href="gallery/category_edit/' . $row->category_id . '">

					<button class="btn btn-primary btn-small btn-xs"><i class="fa fa-edit"></i></button></a>&nbsp;

					<a class="red" title="Delete" href="gallery/category_delete/' . $row->category_id . '"> 

					<button class="btn btn-danger btn-small btn-xs"><i class="fa fa-trash"></i></button></a>&nbsp;

					</div></td>
				'

			);
		}
		$output = array(
			"draw" => $draw,
			"recordsTotal" => $gallery->num_rows(),
			"recordsFiltered" => $gallery->num_rows(),
			"data" => $data
		);
		echo json_encode($output);
		exit();

    }
    public function category_save(){
	
        $this->gallery_model->data = $this->input->post();
        $category_id = $this->input->post('category_id');

		$this->gallery_img = array('upload_path' => GALLERY_IMG_UPLOAD_PATH, 'allowed_types' => 'gif|jpg|png|jpeg');
		$this->upload->initialize($this->gallery_img);
		
		if (!empty($_FILES['gallery_img']['name']) && $this->upload->do_upload('gallery_img')) {
			$upload_data = $this->upload->data();
			$file_Ext =  pathinfo($upload_data['full_path'], PATHINFO_EXTENSION);
			$gen_filename = "gallery_img_" . rand(1000000, 9999999) . "." . $file_Ext;
			rename($upload_data['full_path'], $upload_data['file_path'] . $gen_filename);
			$this->gallery_model->data['gallery_img'] = $gen_filename;
		}
        if(!empty($category_id)){ //Edit Case
			$this->gallery_model->data['modified_date'] = date('Y-m-d');
			$this->gallery_model->primary_key = array('category_id'=>$category_id);
			if ($this->gallery_model->update('category_gallery')) {
				$msg = array('type' => 'success', 'icon' => 'fa fa-check', 'txt' => 'Record Updated Successfully');
			} else {
				$msg = array('type' => 'error', 'icon' => 'fa fa-thumbs-down', 'txt' => 'Sorry! Unable to Update Record.');
			}
        }else{ //Add case
            $this->gallery_model->data['created_date'] = date('Y-m-d');
            $this->gallery_model->data['modified_date'] = date('Y-m-d');
            // unset($this->gallery_model->data['gallery_id']);
            $res = $this->gallery_model->insert('category_gallery');
            if($res == true){
                $msg = array('type' => 'success', 'icon' => 'lni lni-thumbs-up lni-lg mr-2', 'txt' => 'Data Added Successfully');
            }else{
                $msg = array('type' => 'danger', 'icon' => 'lni lni-thumbs-down lni-lg mr-2', 'txt' => 'Sorry! Unable to save.');
            }
        }
        $this->session->set_flashdata('msg',$msg);
        redirect('gallery');
    }

    public function category_delete($id){
        $this->gallery_model->primary_key = array('category_id'=>$id);
        $res = $this->gallery_model->delete('category_gallery');
		$this->gallery_model->primary_key = array('category_id'=>$id);
		$this->gallery_model->data['category_id'] = 0;
		$res = $this->gallery_model->update('gallery');
        if($res == true){
            $msg = array('type' => 'success', 'icon' => 'lni lni-thumbs-up lni-lg mr-2', 'txt' => 'Data deleted Successfully');
        }else{
			$msg = array('type' => 'danger', 'icon' => 'lni lni-thumbs-down lni-lg mr-2', 'txt' => 'Sorry! Unable to delete.');
		}
        $this->session->set_flashdata('msg',$msg);
        redirect('gallery');
    }

    public function galleries(){
        $data['view'] = 'gallery/gallery_list';
		$data['title'] = 'Administrator Dashboard';
		$data['page_heading'] = 'Gallery List';
		$data['breadcrumb'] = 'Gallery List';
		$data['scripts'] = array('assets/javascripts/gallery.js');
		$this->load->view('templates/dashboard', $data);
    }
    public function gallery_list(){
        $draw = intval($this->input->post("draw"));
		$start = intval($this->input->post("start"));
		$length = intval($this->input->post("length"));
		$gallery_category = $this->gallery_model->get_pagination('gallery');

		$data = array();
		foreach ($gallery_category->result() as $row) {
                 
			$status = (!empty($row->status_ind) && ($row->status_ind == 1)) ? "<i class='fa fa-check-circle text-success'>Active</i> &nbsp;&nbsp;" : "<i class='nav-icon fa  fa-times-circle text-danger' >Inactive</i>";
			if(!empty($row->category_id) && $row->category_id != 0){
			$this->gallery_model->primary_key = array('category_id'=>$row->category_id);
            $category_name = $this->gallery_model->get_row('category_gallery')->category_name;
			$category_name = !empty($category_name) ? $category_name : '<span class="text-danger">Not Selected</span>';
			}else{
			$category_name = !empty($category_name) ? $category_name : '<span class="text-danger">Not Selected</span>';
			}
			$data[] = array(
                $row->gallery_name,
                $category_name,
                $row->created_date,
				$status,
				'
                    <td><div class="action-buttons">

					<a class="" title="Edit" href="gallery/gallery_edit/' . $row->gallery_id . '">

					<button class="btn btn-primary btn-small btn-xs"><i class="fa fa-edit"></i></button></a>&nbsp;

					<a class="red" title="Delete" href="gallery/gallery_delete/' . $row->gallery_id . '"> 

					<button class="btn btn-danger btn-small btn-xs"><i class="fa fa-trash"></i></button></a>&nbsp;

					</div></td>
				'

			);
		}
		$output = array(
			"draw" => $draw,
			"recordsTotal" => $gallery_category->num_rows(),
			"recordsFiltered" => $gallery_category->num_rows(),
			"data" => $data
		);
		echo json_encode($output);
		exit();
    }

       public function gallery_delete($id){
		$this->gallery_model->primary_key = array('gallery_id'=>$id);
		$gallery_images = $this->gallery_model->get_rowdata('gallery_images');
		foreach($gallery_images as $image){
			unlink(GALLERY_UPLOAD_PATH.$image->gallery_img_path);
			$this->gallery_model->primary_key = array('gallery_id'=>$id,'gallery_img_id'=>$image->gallery_img_id);
			$this->gallery_model->delete('gallery_images');
			
		}
		$this->gallery_model->primary_key = array('gallery_id'=>$id);
		$gallery = $this->gallery_model->get_row('gallery');
		unlink(GALLERY_UPLOAD_PATH.$gallery->category_img_path);
        $this->gallery_model->primary_key = array('gallery_id'=>$id);
		// echo $id;
		// echo'<pre>';print_R($gallery_images);exit;
        $res = $this->gallery_model->delete('gallery');
        if($res == true){
            $msg = array('type' => 'success', 'icon' => 'lni lni-thumbs-up lni-lg mr-2', 'txt' => 'Data deleted Successfully');
        }else{
			$msg = array('type' => 'danger', 'icon' => 'lni lni-thumbs-down lni-lg mr-2', 'txt' => 'Sorry! Unable to delete.');
		}
        $this->session->set_flashdata('msg',$msg);
        redirect('gallery/galleries');
    }
    
    public function add_gallery(){
        $data['categories'] = $this->gallery_model->view('category_gallery');
        $data['view'] = 'gallery/gallery_form';
		$data['title'] = 'Administrator Dashboard';
		$data['page_heading'] = 'Add Gallery';
		$data['breadcrumb'] = 'Add Gallery';
		$data['scripts'] = array('assets/javascripts/gallery.js');
		$this->load->view('templates/dashboard', $data);
    }
    public function gallery_edit($gallery_id){
		$this->gallery_model->primary_key = array('gallery_id'=>$gallery_id);
		$data['query'] = $this->gallery_model->get_row('gallery');
        $data['categories'] = $this->gallery_model->view('category_gallery');
        $data['view'] = 'gallery/gallery_form';
		$data['title'] = 'Administrator Dashboard';
		$data['page_heading'] = 'Add Gallery';
		$data['breadcrumb'] = 'Add Gallery';
		$data['scripts'] = array('assets/javascripts/gallery.js');
		$this->load->view('templates/dashboard', $data);
    }
    public function gallery_save(){
        $this->gallery_model->data = $this->input->post();
        $gallery_id = $this->input->post('gallery_id');

		$this->category_img_path = array('upload_path' => GALLERY_UPLOAD_PATH, 'allowed_types' => 'gif|jpg|png|jpeg');
		$this->upload->initialize($this->category_img_path);
		if (!empty($_FILES['category_img_path']['name']) && $this->upload->do_upload('category_img_path')) {
			$upload_data = $this->upload->data();
			$file_Ext =  pathinfo($upload_data['full_path'], PATHINFO_EXTENSION);
			$gen_filename = "gallery_img_" . rand(1000000, 9999999) . "." . $file_Ext;
			rename($upload_data['full_path'], $upload_data['file_path'] . $gen_filename);
			$this->gallery_model->data['category_img_path'] = $gen_filename;
			// $this->createthumbs(array($upload_data['file_name']));
		} else {
			$data['form_error']['category_img_path'] = $this->upload->display_errors();
		}
	
        if(!empty($gallery_id)){ //Edit Case
			$this->gallery_model->data['modified_date'] = date('Y-m-d');
			$this->gallery_model->primary_key = array('gallery_id'=>$gallery_id);
			if ($this->gallery_model->update('gallery')) {
				$msg = array('type' => 'success', 'icon' => 'fa fa-check', 'txt' => 'Record Updated Successfully');
			} else {
				$msg = array('type' => 'error', 'icon' => 'fa fa-thumbs-down', 'txt' => 'Sorry! Unable to Update Record.');
			}
        }else{ //Add case
            $this->gallery_model->data['created_date'] = date('Y-m-d');
            $this->gallery_model->data['modified_date'] = date('Y-m-d');
            // unset($this->gallery_model->data['gallery_id']);
            $res = $this->gallery_model->insert('gallery');
            if($res == true){
                $msg = array('type' => 'success', 'icon' => 'lni lni-thumbs-up lni-lg mr-2', 'txt' => 'Data Added Successfully');
            }else{
                $msg = array('type' => 'danger', 'icon' => 'lni lni-thumbs-down lni-lg mr-2', 'txt' => 'Sorry! Unable to save.');
            }
        }
        $this->session->set_flashdata('msg',$msg);
        redirect('gallery/galleries');
    }
    
    public function gallery_images(){
        $data['view'] = 'gallery/gallery_images_list';
		$data['title'] = 'Administrator Dashboard';
		$data['page_heading'] = 'Gallery Images List';
		$data['breadcrumb'] = 'Gallery Images List';
		$data['scripts'] = array('assets/javascripts/gallery.js');
		$this->load->view('templates/dashboard', $data);
    }
    public function gallery_image_list(){
        $draw = intval($this->input->post("draw"));
		$start = intval($this->input->post("start"));
		$length = intval($this->input->post("length"));
		$gallery_images = $this->gallery_model->get_pagination('gallery_images');

		$data = array();
		foreach ($gallery_images->result() as $row) {
                 
			$status = (!empty($row->status_ind) && ($row->status_ind == 1)) ? "<i class='fa fa-check-circle text-success'>Active</i> &nbsp;&nbsp;" : "<i class='nav-icon fa  fa-times-circle text-danger' >Inactive</i>";
			$this->gallery_model->primary_key = array('gallery_id'=>$row->gallery_id);
            $gallery_name = $this->gallery_model->get_row('gallery')->gallery_name;
			
		
			if(!empty($row->category_id)){
			$this->gallery_model->primary_key = array('category_id'=>$row->category_id);
            $category_name = $this->gallery_model->get_row('category_gallery')->category_name;
			}
            $data[] = array(
                $row->image_name,
                $gallery_name,
                $category_name,
                $row->created_date,
				$status,
				'
                    <td><div class="action-buttons">

					<a class="" title="Edit" href="gallery/gallery_image_edit/' . $row->gallery_img_id . '">

					<button class="btn btn-primary btn-small btn-xs"><i class="fa fa-edit"></i></button></a>&nbsp;

					<a class="red" title="Delete" href="gallery/gallery_image_delete/' . $row->gallery_img_id . '"> 

					<button class="btn btn-danger btn-small btn-xs"><i class="fa fa-trash"></i></button></a>&nbsp;

					</div></td>
				'

			);
		}
		$output = array(
			"draw" => $draw,
			"recordsTotal" => $gallery_images->num_rows(),
			"recordsFiltered" => $gallery_images->num_rows(),
			"data" => $data
		);
		echo json_encode($output);
		exit();
    }
    public function add_images(){
        $data['categories'] = $this->gallery_model->view('category_gallery');
        $data['galleries'] = $this->gallery_model->view('gallery');
        $data['view'] = 'gallery/gallery_images_form';
		$data['title'] = 'Administrator Dashboard';
		$data['page_heading'] = 'Add Images to Gallery';
		$data['breadcrumb'] = 'Add Images to Gallery';
		$data['scripts'] = array('assets/javascripts/gallery.js');
		$this->load->view('templates/dashboard', $data);
    }
    public function gallery_image_edit($id){
		$this->gallery_model->primary_key = array('gallery_img_id'=>$id);
		$data['query'] = $this->gallery_model->get_row('gallery_images');
        $data['categories'] = $this->gallery_model->view('category_gallery');
        $data['galleries'] = $this->gallery_model->view('gallery');
        $data['view'] = 'gallery/gallery_images_form';
		$data['title'] = 'Administrator Dashboard';
		$data['page_heading'] = 'Add Images to Gallery';
		$data['breadcrumb'] = 'Add Images to Gallery';
		$data['scripts'] = array('assets/javascripts/gallery.js');
		$this->load->view('templates/dashboard', $data);
    }
	public function add_multi_images(){
        $data['categories'] = $this->gallery_model->view('category_gallery');
        $data['galleries'] = $this->gallery_model->view('gallery');
        $data['view'] = 'gallery/gallery_multi_images_form';
		$data['title'] = 'Administrator Dashboard';
		$data['page_heading'] = 'Add Images to Gallery';
		$data['breadcrumb'] = 'Add Images to Gallery';
		$data['scripts'] = array('assets/javascripts/gallery.js');
		$this->load->view('templates/dashboard', $data);
    }
    public function gallery_img_save(){

        $this->gallery_model->data = $this->input->post();
        $gallery_img_id = $this->input->post('gallery_img_id');
		
		$this->gallery_img_path = array('upload_path' => GALLERY_UPLOAD_PATH, 'allowed_types' => 'gif|jpg|png|jpeg');
		$this->upload->initialize($this->gallery_img_path);
		
		if (!empty($_FILES['gallery_img_path']['name']) && $this->upload->do_upload('gallery_img_path')) {
			$upload_data = $this->upload->data();
			$file_Ext =  pathinfo($upload_data['full_path'], PATHINFO_EXTENSION);
			$gen_filename = "gallery_img_" . rand(1000000, 9999999) . "." . $file_Ext;
			rename($upload_data['full_path'], $upload_data['file_path'] . $gen_filename);
			$this->gallery_model->data['gallery_img_path'] = $gen_filename;
		
		} else {
			$data['form_error']['gallery_img_path'] = $this->upload->display_errors();
		}
	
        if(!empty($gallery_img_id)){ //Edit Case
			$this->gallery_model->data['modified_date'] = date('Y-m-d');
			$this->gallery_model->primary_key = array('gallery_img_id'=>$gallery_img_id);
			if ($this->gallery_model->update('gallery_images')) {
				$msg = array('type' => 'success', 'icon' => 'fa fa-check', 'txt' => 'Record Updated Successfully');
			} else {
				$msg = array('type' => 'error', 'icon' => 'fa fa-thumbs-down', 'txt' => 'Sorry! Unable to Update Record.');
			}
        }else{ //Add case
            $this->gallery_model->data['created_date'] = date('Y-m-d');
            $this->gallery_model->data['modified_date'] = date('Y-m-d');
            // unset($this->gallery_model->data['gallery_id']);
            $res = $this->gallery_model->insert('gallery_images');
        
            if($res == true){
                $msg = array('type' => 'success', 'icon' => 'lni lni-thumbs-up lni-lg mr-2', 'txt' => 'Data Added Successfully');
            }else{
                $msg = array('type' => 'danger', 'icon' => 'lni lni-thumbs-down lni-lg mr-2', 'txt' => 'Sorry! Unable to save.');
            }
        }
        $this->load->helper('url');
        $this->session->set_flashdata('msg',$msg);
        redirect('gallery/gallery_images');
    }

	public function gallery_multi_img_save(){
		// echo '<pre>';print_R($_FILES);exit;
		if (!empty($_FILES['gallery_img_path']['name'])) {
			$this->gallery_img_path = array('upload_path' => GALLERY_UPLOAD_PATH, 'allowed_types' => 'gif|jpg|png|jpeg');
			$this->upload->initialize($this->gallery_img_path);
			$filesCount = count($_FILES['gallery_img_path']['name']); 
			for($i = 0; $i < $filesCount; $i++){ 
				$this->gallery_model->data  = $this->input->post();
				$_FILES['file']['name']     = $_FILES['gallery_img_path']['name'][$i]; 
				$_FILES['file']['type']     = $_FILES['gallery_img_path']['type'][$i]; 
				$_FILES['file']['tmp_name'] = $_FILES['gallery_img_path']['tmp_name'][$i]; 
				$_FILES['file']['error']     = $_FILES['gallery_img_path']['error'][$i]; 
				$_FILES['file']['size']     = $_FILES['gallery_img_path']['size'][$i]; 
				if($this->upload->do_upload('file')){ 
					// Uploaded file data 
					$upload_data = $this->upload->data(); 
					// print_r($upload_data);exit;
					$uploadData[$i]['file_name'] = $upload_data['file_name']; 
		
				$file_Ext =  pathinfo($upload_data['full_path'], PATHINFO_EXTENSION);
				$gen_filename = $this->input->post('image_name') .'_'. rand(1000000, 9999999) . "." . $file_Ext;
				rename($upload_data['full_path'], $upload_data['file_path'] . $gen_filename);
				$this->gallery_model->data['gallery_img_path'] = $gen_filename;
				$this->gallery_model->data['created_date'] = date('Y-m-d');
				$this->gallery_model->data['modified_date'] = date('Y-m-d');
				// unset($this->gallery_model->data['gallery_id']);
				$res = $this->gallery_model->insert('gallery_images');
			
			} else {
				$data['form_error']['gallery_img_path'] = $this->upload->display_errors();
			}
		}
	}
	if($res == true){
		$msg = array('type' => 'success', 'icon' => 'lni lni-thumbs-up lni-lg mr-2', 'txt' => 'Data Added Successfully');
	}else{
		$msg = array('type' => 'danger', 'icon' => 'lni lni-thumbs-down lni-lg mr-2', 'txt' => 'Sorry! Unable to save.');
	}
	$this->session->set_flashdata('msg',$msg);
	redirect('gallery/gallery_images');
	}
	public function gallery_image_delete($id){
        $this->gallery_model->primary_key = array('gallery_img_id'=>$id);
        $res = $this->gallery_model->delete('gallery_images');
        if($res == true){
            $msg = array('type' => 'success', 'icon' => 'lni lni-thumbs-up lni-lg mr-2', 'txt' => 'Data deleted Successfully');
        }else{
			$msg = array('type' => 'danger', 'icon' => 'lni lni-thumbs-down lni-lg mr-2', 'txt' => 'Sorry! Unable to delete.');
		}
        $this->session->set_flashdata('msg',$msg);
        redirect('gallery/gallery_images');
    }
     

	public function video_gallery(){
		
		$data['view'] = 'gallery/video_gallery_list';
		$data['title'] = 'Administrator Dashboard';
		$data['page_heading'] = 'Videos List';
		$data['breadcrumb'] = 'Videos List';
		$data['scripts'] = array('assets/javascripts/gallery.js');
		$this->load->view('templates/dashboard', $data);
	}
    public function create_video_gallery(){
        $data['view'] = 'gallery/create_video_gallery';
		$data['title'] = 'Administrator Dashboard';
		$data['page_heading'] = 'Create Video Gallery';
		$data['breadcrumb'] = 'Create Video Gallery';
		$data['scripts'] = array('assets/javascripts/gallery.js');
		$this->load->view('templates/dashboard', $data);
    }
    public function video_gallery_edit($id){
		$this->gallery_model->primary_key = array('video_gallery_id'=>$id);
		$data['query'] = $this->gallery_model->get_row('video_gallery');
        $data['view'] = 'gallery/create_video_gallery';
		$data['title'] = 'Administrator Dashboard';
		$data['page_heading'] = 'Edit Video Gallery';
		$data['breadcrumb'] = 'Edit Video Gallery';
		$data['scripts'] = array('assets/javascripts/gallery.js');
		$this->load->view('templates/dashboard', $data);
    }
    public function video_gallery_list(){

        $draw = intval($this->input->post("draw"));
		$start = intval($this->input->post("start"));
		$length = intval($this->input->post("length"));
		$gallery = $this->gallery_model->get_pagination('video_gallery');
	
		$data = array();
		foreach ($gallery->result() as $row) {
                 
			$status = (!empty($row->status_ind) && ($row->status_ind == 1)) ? "<i class='fa fa-check-circle text-success'>Active</i> &nbsp;&nbsp;" : "<i class='nav-icon fa  fa-times-circle text-danger' >Inactive</i>";
			$data[] = array(
                $row->gallery_name,
                $row->created_date,
				$status,
				'
                    <td><div class="action-buttons">

					<a class="" title="Edit" href="gallery/video_gallery_edit/' . $row->video_gallery_id . '">

					<button class="btn btn-primary btn-small btn-xs"><i class="fa fa-edit"></i></button></a>&nbsp;

					<a class="red" title="Delete" href="gallery/video_gallery_delete/' . $row->video_gallery_id . '"> 

					<button class="btn btn-danger btn-small btn-xs"><i class="fa fa-trash"></i></button></a>&nbsp;

					</div></td>
				'

			);
		}
		$output = array(
			"draw" => $draw,
			"recordsTotal" => $gallery->num_rows(),
			"recordsFiltered" => $gallery->num_rows(),
			"data" => $data
		);
		echo json_encode($output);
		exit();

    }
    public function video_gallery_save(){
        $this->gallery_model->data = $this->input->post();
        $gallery_id = $this->input->post('video_gallery_id');

		$this->gallery_video_img_path = array('upload_path' => GALLERY_VIDEO_UPLOAD_PATH, 'allowed_types' => 'gif|jpg|png|jpeg');
		$this->upload->initialize($this->gallery_video_img_path);
	
		if (!empty($_FILES['gallery_video_img_path']['name']) && $this->upload->do_upload('gallery_video_img_path')) {
			$upload_data = $this->upload->data();
	
			$file_Ext =  pathinfo($upload_data['full_path'], PATHINFO_EXTENSION);
			$gen_filename = "gallery_video_img_path_" . rand(1000000, 9999999) . "." . $file_Ext;
			rename($upload_data['full_path'], $upload_data['file_path'] . $gen_filename);
			$this->gallery_model->data['gallery_video_img_path'] = $gen_filename;
		
		} else {
			$data['form_error']['gallery_video_img_path'] = $this->upload->display_errors();
				if(!empty($this->upload->display_errors())) {
				print_R($this->upload->display_errors());
				exit;
			}
		}
	
        if(!empty($gallery_id)){ //Edit Case
			$this->gallery_model->data['modified_date'] = date('Y-m-d');
			$this->gallery_model->primary_key = array('video_gallery_id'=>$gallery_id);
			if ($this->gallery_model->update('video_gallery')) {
				$msg = array('type' => 'success', 'icon' => 'fa fa-check', 'txt' => 'Record Updated Successfully');
			} else {
				$msg = array('type' => 'error', 'icon' => 'fa fa-thumbs-down', 'txt' => 'Sorry! Unable to Update Record.');
			}
        }else{ //Add case
            $this->gallery_model->data['created_date'] = date('Y-m-d');
            $this->gallery_model->data['modified_date'] = date('Y-m-d');
            // unset($this->gallery_model->data['gallery_id']);
            $res = $this->gallery_model->insert('video_gallery');
			
            if($res == true){
                $msg = array('type' => 'success', 'icon' => 'lni lni-thumbs-up lni-lg mr-2', 'txt' => 'Data Added Successfully');
            }else{
                $msg = array('type' => 'danger', 'icon' => 'lni lni-thumbs-down lni-lg mr-2', 'txt' => 'Sorry! Unable to save.');
            }
        }
        $this->session->set_flashdata('msg',$msg);
        redirect('gallery/video_gallery');
    }

	public function video_gallery_delete($id){
        $this->gallery_model->primary_key = array('video_gallery_id'=>$id);
        $res = $this->gallery_model->delete('video_gallery');
        if($res == true){
            $msg = array('type' => 'success', 'icon' => 'lni lni-thumbs-up lni-lg mr-2', 'txt' => 'Data deleted Successfully');
        }else{
			$msg = array('type' => 'danger', 'icon' => 'lni lni-thumbs-down lni-lg mr-2', 'txt' => 'Sorry! Unable to delete.');
		}
        $this->session->set_flashdata('msg',$msg);
        redirect('gallery/video_gallery');
    }


	public function gallery_videos(){
        $data['view'] = 'gallery/gallery_videos_list';
		$data['title'] = 'Administrator Dashboard';
		$data['page_heading'] = 'Gallery Videos List';
		$data['breadcrumb'] = 'Gallery Videos List';
		$data['scripts'] = array('assets/javascripts/gallery.js');
		$this->load->view('templates/dashboard', $data);
    }
    public function gallery_video_list(){
        $draw = intval($this->input->post("draw"));
		$start = intval($this->input->post("start"));
		$length = intval($this->input->post("length"));
		$gallery_videos = $this->gallery_model->get_pagination('gallery_videos');

		$data = array();
		foreach ($gallery_videos->result() as $row) {
                 
			$status = (!empty($row->status_ind) && ($row->status_ind == 1)) ? "<i class='fa fa-check-circle text-success'>Active</i> &nbsp;&nbsp;" : "<i class='nav-icon fa  fa-times-circle text-danger' >Inactive</i>";
			$this->gallery_model->primary_key = array('video_gallery_id'=>$row->video_gallery_id);
            $gallery_name = $this->gallery_model->get_row('video_gallery')->gallery_name;
	
			// if(!empty($row->category_id)){
			// $this->gallery_model->primary_key = array('category_id'=>$row->category_id);
            // $category_name = $this->gallery_model->get_row('gallery_category')->category_name;
			// }
            $data[] = array(
                !empty($row->video_name) ? $row->video_name : 'Video Name not found',
                $gallery_name,
                $row->created_date,
				$status,
				'
                    <td><div class="action-buttons">

					<a class="" title="Edit" href="gallery/gallery_video_edit/' . $row->gallery_video_id . '">

					<button class="btn btn-primary btn-small btn-xs"><i class="fa fa-edit"></i></button></a>&nbsp;

					<a class="red" title="Delete" href="gallery/gallery_video_delete/' . $row->gallery_video_id . '"> 

					<button class="btn btn-danger btn-small btn-xs"><i class="fa fa-trash"></i></button></a>&nbsp;

					</div></td>
				'

			);
		}
		$output = array(
			"draw" => $draw,
			"recordsTotal" => $gallery_videos->num_rows(),
			"recordsFiltered" => $gallery_videos->num_rows(),
			"data" => $data
		);
		echo json_encode($output);
		exit();
    }

	public function add_videos(){
        $data['video_galleries'] = $this->gallery_model->view('video_gallery');

        // $data['categories'] = $this->gallery_model->view('gallery_category');
        $data['view'] = 'gallery/gallery_videos_form';
		$data['title'] = 'Administrator Dashboard';
		$data['page_heading'] = 'Add Videos to Gallery';
		$data['breadcrumb'] = 'Add Videos to Gallery';
		$data['scripts'] = array('assets/javascripts/gallery.js');
		$this->load->view('templates/dashboard', $data);
    }
    public function gallery_video_edit($id){
		$this->gallery_model->primary_key = array('gallery_video_id'=>$id);
		$data['query'] = $this->gallery_model->get_row('gallery_videos');
        $data['video_galleries'] = $this->gallery_model->view('video_gallery');

        // $data['categories'] = $this->gallery_model->view('gallery_category');
        $data['view'] = 'gallery/gallery_videos_form';
		$data['title'] = 'Administrator Dashboard';
		$data['page_heading'] = 'Add Videos to Gallery';
		$data['breadcrumb'] = 'Add Videos to Gallery';
		$data['scripts'] = array('assets/javascripts/gallery.js');
		$this->load->view('templates/dashboard', $data);
    }

    public function gallery_video_save(){
        $this->gallery_model->data = $this->input->post();
        $gallery_video_id = $this->input->post('gallery_video_id');

		$this->gallery_video_path = array('upload_path' => GALLERY_VIDEO_UPLOAD_PATH, 'allowed_types' => 'avi|mp4|3gp|mpeg|mpg|mov|mp3|flv|wmv');
		$this->upload->initialize($this->gallery_video_path);
		if (!empty($_FILES['gallery_video_path']['name']) && $this->upload->do_upload('gallery_video_path')) {
			$upload_data = $this->upload->data();
			
			$file_Ext =  pathinfo($upload_data['full_path'], PATHINFO_EXTENSION);
			$gen_filename = "gallery_video_" . rand(1000000, 9999999) . "." . $file_Ext;
			rename($upload_data['full_path'], $upload_data['file_path'] . $gen_filename);
			$this->gallery_model->data['gallery_video_path'] = $gen_filename;
		}

		$this->video_cover_path = array('upload_path' => GALLERY_VIDEO_UPLOAD_PATH, 'allowed_types' => 'gif|jpg|png|jpeg');
		$this->upload->initialize($this->video_cover_path);
		
		if (!empty($_FILES['video_cover_path']['name']) && $this->upload->do_upload('video_cover_path')) {
			$upload_data = $this->upload->data();
			$file_Ext =  pathinfo($upload_data['full_path'], PATHINFO_EXTENSION);
			$gen_filename = "video_cover_path_" . rand(1000000, 9999999) . "." . $file_Ext;
			rename($upload_data['full_path'], $upload_data['file_path'] . $gen_filename);
			$this->gallery_model->data['video_cover_path'] = $gen_filename;
		}
	
	
        if(!empty($gallery_video_id)){ //Edit Case
			$this->gallery_model->data['modified_date'] = date('Y-m-d');
			$this->gallery_model->primary_key = array('gallery_video_id'=>$gallery_video_id);
			if ($this->gallery_model->update('gallery_videos')) {
				$msg = array('type' => 'success', 'icon' => 'fa fa-check', 'txt' => 'Record Updated Successfully');
			} else {
				$msg = array('type' => 'error', 'icon' => 'fa fa-thumbs-down', 'txt' => 'Sorry! Unable to Update Record.');
			}
        }else{ //Add case
            $this->gallery_model->data['created_date'] = date('Y-m-d');
            $this->gallery_model->data['modified_date'] = date('Y-m-d');
            // unset($this->gallery_model->data['gallery_id']);
            $res = $this->gallery_model->insert('gallery_videos');
        
            if($res == true){
                $msg = array('type' => 'success', 'icon' => 'lni lni-thumbs-up lni-lg mr-2', 'txt' => 'Data Added Successfully');
            }else{
                $msg = array('type' => 'danger', 'icon' => 'lni lni-thumbs-down lni-lg mr-2', 'txt' => 'Sorry! Unable to save.');
            }
        }
        $this->load->helper('url');
        $this->session->set_flashdata('msg',$msg);
        redirect('gallery/gallery_videos');
    }
	public function gallery_video_delete($id){
        $this->gallery_model->primary_key = array('gallery_video_id'=>$id);
        $res = $this->gallery_model->delete('gallery_videos');
        if($res == true){
            $msg = array('type' => 'success', 'icon' => 'lni lni-thumbs-up lni-lg mr-2', 'txt' => 'Data deleted Successfully');
        }else{
			$msg = array('type' => 'danger', 'icon' => 'lni lni-thumbs-down lni-lg mr-2', 'txt' => 'Sorry! Unable to delete.');
		}
        $this->session->set_flashdata('msg',$msg);
        redirect('gallery/gallery_videos');
    }
}