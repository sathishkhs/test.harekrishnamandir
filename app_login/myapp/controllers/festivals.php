<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Festivals extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('festivals_model');
		$user_id = $this->session->userdata('user_id');
		if (empty($user_id)) {
			redirect('');
		}
	}

	public function index(){
		$data['view'] = 'festivals/festivals_list';
		$data['title'] = 'Administrator Dashboard';
		$data['page_heading'] = 'Program List';
		$data['breadcrumb'] = 'Program List';
		$data['scripts'] = array('assets/javascripts/festivals.js');
		$this->load->view('templates/dashboard', $data);
	}
    public function festivals_list(){
        $draw = $this->input->post('draw');
		$start = $this->input->post('start');
		$length = $this->input->post('length');
        $festivals = $this->festivals_model-> pagination('festivals');
        $data = array();

		foreach ($festivals->result() as $row) {
			$status = (!empty($row->status_ind) && ($row->status_ind == 1)) ? "<i class='fa fa-check-circle text-success'>Active</i> &nbsp;&nbsp;" : "<i class='nav-icon fa  fa-times-circle text-danger' >Inactive</i>";
			$data[] = array(
                $row->festival_title,
                $row->festival_date,
				$row->created_date,
				$row->modified_date,
				$status,
				'
				<td><div class="action-buttons">
				<a class="" title="Edit" href="festivals/festival_edit/' . $row->festival_id . '">
				<button class="btn btn-primary btn-small btn-xs"><i class="fa fa-edit"></i></button></a>&nbsp;
				<a class="red" title="Delete" href="festivals/festival_delete/' . $row->festival_id . '"> 
				<button class="btn btn-danger btn-small btn-xs"><i class="fa fa-trash"></i></button></a>&nbsp;
				</div></td>
				'

			);
		}

        $output = array(
			"draw" => $draw,
			"recordsTotal" => $festivals->num_rows(),
			"recordsFiltered" => $festivals->num_rows(),
			"data" => $data

		);
		echo json_encode($output);
		exit;

    }

    public function festival_add(){
		
		$data['view'] = 'festivals/festival_form';
		$data['title'] = 'Administrator Dashboard';
		$data['page_heading'] = 'Program Form';
		$data['breadcrumb'] = 'Program Form';
		$data['scripts'] = array('assets/javascripts/festivals.js');
		$this->load->view('templates/dashboard', $data);
    }
    public function festival_edit($festival_id){
        $this->festivals_model->primary_key = array('festival_id'=>$festival_id);
		$data['sevas'] = $this->festivals_model->view_data('sevas');
        $this->festivals_model->primary_key = array('festival_id'=>$festival_id);
        $data['query'] = $this->festivals_model->get_row('festivals');
		$data['view'] = 'festivals/festival_form';
		$data['title'] = 'Administrator Dashboard';
		$data['page_heading'] = 'Program Form';
		$data['breadcrumb'] = 'Program Form';
		$data['scripts'] = array('assets/javascripts/festivals.js');
		$this->load->view('templates/dashboard', $data);
    }

    public function festival_save(){
        
        $festival_id = $this->input->post('festival_id');
        $this->festivals_model->data = $this->input->post();
        unset($this->festivals_model->data['seva_name']);
        unset($this->festivals_model->data['seva_amount']);
        unset($this->festivals_model->data['status']);
        unset($this->festivals_model->data['backup_image']);
     
        // Image Upload Code Begins Here
        $this->festival_banner = array('upload_path' => FESTIVAL_BANNER_PATH, 'allowed_types' => 'gif|jpg|png|jpeg');
        $this->upload->initialize($this->festival_banner);
       
        if (!empty($_FILES['festival_banner']['name']) && $this->upload->do_upload('festival_banner')) {
            $upload_data = $this->upload->data();
            $file_Ext =  pathinfo($upload_data['full_path'], PATHINFO_EXTENSION);
            $gen_filename = "festival_banner" . rand(1000000, 9999999) . "." . $file_Ext;
            rename($upload_data['full_path'], $upload_data['file_path'] . $gen_filename);
            $this->festivals_model->data['festival_banner'] = $gen_filename;
            // $this->createthumbs(array($upload_data['file_name']));
        } else {
        
            $data['form_error']['festival_banner'] = $this->upload->display_errors();
        }
        // Image Upload Code Begins Here
        $this->thumbnail = array('upload_path' => FESTIVAL_BANNER_PATH, 'allowed_types' => 'gif|jpg|png|jpeg');
        $this->upload->initialize($this->festival_banner);
       
        if (!empty($_FILES['thumbnail']['name']) && $this->upload->do_upload('thumbnail')) {
            $upload_data = $this->upload->data();
            $file_Ext =  pathinfo($upload_data['full_path'], PATHINFO_EXTENSION);
            $gen_filename = "thumbnail" . rand(1000000, 9999999) . "." . $file_Ext;
            rename($upload_data['full_path'], $upload_data['file_path'] . $gen_filename);
            $this->festivals_model->data['thumbnail'] = $gen_filename;
            // $this->createthumbs(array($upload_data['file_name']));
        } else {
        
            $data['form_error']['thumbnail'] = $this->upload->display_errors();
        }
        if (!empty($festival_id)) {
            $this->festivals_model->data['modified_date'] = date('Y-m-d h:i:s');
            $this->festivals_model->data['modified_by'] = $this->session->userdata('user_id');
            $this->festivals_model->primary_key = array('festival_id' => $festival_id);
            if ($this->festivals_model->update('festivals')) {
              
                $msg = array('type' => 'success', 'icon' => 'fa fa-check', 'txt' => 'Record Updated Successfully');
               } else {
                   $msg = array('type' => 'danger', 'icon' => 'fa fa-thumbs-down', 'txt' => 'Sorry! Unable to Update Record.');
               }
               if(!empty($this->input->post('seva_name'))){
     
                $this->festivals_model->primary_key = array('festival_id'=>$festival_id);
                $this->festivals_model->delete('sevas');
          
                foreach($_POST['seva_name'] as $key => $seva_name){
                    
                   $this->festivals_model->data['seva_name'] = $seva_name;
                   $this->festivals_model->data['status'] = $_POST['status'][$key];
                   $this->festivals_model->data['festival_id'] = $_POST['festival_id'];
                   $this->festivals_model->data['seva_amount'] = $_POST['seva_amount'][$key];
                   $this->festivals_model->data['modified_date'] = date('Y-m-d h:i:s');
                
                   $_FILES['seva_photo']['name']     = $_FILES['seva_image']['name'][$key]; 
                   $_FILES['seva_photo']['type']     = $_FILES['seva_image']['type'][$key]; 
                   $_FILES['seva_photo']['tmp_name'] = $_FILES['seva_image']['tmp_name'][$key]; 
                   $_FILES['seva_photo']['error']     = $_FILES['seva_image']['error'][$key]; 
                   $_FILES['seva_photo']['size']     = $_FILES['seva_image']['size'][$key]; 
                
                   if(empty($_FILES['seva_image']['name'][$key]) && !empty($_POST['backup_image'][$key])){
                    $this->festivals_model->data['seva_image'] = $_POST['backup_image'][$key];
                }
                unset($this->festivals_model->data['backup_image'][$key]);
                   $this->seva_photo = array('upload_path' => SEVA_IMAGE_PATH, 'allowed_types' => 'gif|jpg|png|jpeg');
                    $this->upload->initialize($this->seva_photo);
                    if (!empty($_FILES['seva_photo']['name']) && $this->upload->do_upload('seva_photo')) {
                       
                        $upload_data = $this->upload->data();
                        $file_Ext =  pathinfo($upload_data['full_path'], PATHINFO_EXTENSION);
                        $gen_filename = "seva_photo_".rand ( 1000000 , 9999999 ).".".$file_Ext;
                        rename($upload_data['full_path'],$upload_data['file_path'].$gen_filename);
                        $this->festivals_model->data['seva_image'] = $gen_filename;
                        // $this->createthumbs(array($upload_data['file_name']));
                    } else {
                        $data['form_error']['seva_photo'] = $this->upload->display_errors();
                    }
                   $this->festivals_model->insert('sevas');
                }
            
            }
           } else {
          
               unset($this->festivals_model->data['festival_id']);
               $this->festivals_model->data['created_date'] = date('Y-m-d h:i:s');
               $this->festivals_model->data['created_by'] = $this->session->userdata('user_id');
               $this->festivals_model->data['modified_date'] = date('Y-m-d h:i:s');
               $this->festivals_model->data['modified_by'] = $this->session->userdata('user_id');
            if ($id = $this->festivals_model->insert('festivals')) {
               
                $msg = array('type' => 'success', 'icon' => 'fa fa-check', 'txt' => 'Record Added Successfully');
            } else {
              
                $msg = array('type' => 'danger', 'icon' => 'fa fa-thumbs-down', 'txt' => 'Sorry! Unable to Add Record.');
            }

            $this->festivals_model->primary_key = array('festival_id'=>$id);
            $this->festivals_model->delete('sevas');
      
            foreach($_POST['seva_name'] as $key => $seva_name){
                
                $this->festivals_model->data['seva_name'] = $seva_name;
                $this->festivals_model->data['status'] = $_POST['status'][$key];
                $this->festivals_model->data['festival_id'] = $id;
                $this->festivals_model->data['seva_amount'] = $_POST['seva_amount'][$key];
               $this->festivals_model->data['created_date'] = date('Y-m-d h:i:s');
               $this->festivals_model->data['modified_date'] = date('Y-m-d h:i:s');
               $_FILES['seva_photo']['name']     = $_FILES['seva_image']['name'][$key]; 
               $_FILES['seva_photo']['type']     = $_FILES['seva_image']['type'][$key]; 
               $_FILES['seva_photo']['tmp_name'] = $_FILES['seva_image']['tmp_name'][$key]; 
               $_FILES['seva_photo']['error']     = $_FILES['seva_image']['error'][$key]; 
               $_FILES['seva_photo']['size']     = $_FILES['seva_image']['size'][$key]; 
             
               $this->seva_photo = array('upload_path' => SEVA_IMAGE_PATH, 'allowed_types' => 'gif|jpg|png|jpeg');
               $this->upload->initialize($this->seva_photo);
               if (!empty($_FILES['seva_photo']['name']) && $this->upload->do_upload('seva_photo')) {
                   $upload_data = $this->upload->data();
                   $file_Ext =  pathinfo($upload_data['full_path'], PATHINFO_EXTENSION);
                   $gen_filename = "seva_photo_".rand ( 1000000 , 9999999 ).".".$file_Ext;
                   rename($upload_data['full_path'],$upload_data['file_path'].$gen_filename);
                   $this->festivals_model->data['seva_image'] = $gen_filename;
                   // $this->createthumbs(array($upload_data['file_name']));
               } else {
                   $data['form_error']['seva_photo'] = $this->upload->display_errors();
               }
              
               $this->festivals_model->insert('sevas');
            }
        }

        $this->session->set_flashdata('msg', $msg);
        redirect("festivals");

       
    }
}