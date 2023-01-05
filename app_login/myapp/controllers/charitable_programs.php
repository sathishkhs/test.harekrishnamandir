<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Charitable_programs extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('charitable_programs_model');
		$user_id = $this->session->userdata('user_id');
		if (empty($user_id)) {
			redirect('');
		}
	}

	public function index(){
		$data['query'] = $this->charitable_programs_model->view_data('sevas');
		$data['view'] = 'charitable_programs/list';
		$data['title'] = 'Administrator Dashboard';
		$data['page_heading'] = 'Charitable Programs List';
		$data['breadcrumb'] = 'Charitable Programs List';
		$data['scripts'] = array('assets/javascripts/charitable_programs.js');
		$this->load->view('templates/dashboard', $data);
	}

    public function charitable_programs_list(){
      
            $draw = $this->input->post('draw');
            $start = $this->input->post('start');
            $length = $this->input->post('length');
            $sevas = $this->charitable_programs_model-> pagination('charitable_programs');
            $data = array();
    
            foreach ($sevas->result() as $row) {
                $status = (!empty($row->status_ind) && ($row->status_ind == 1)) ? "<i class='fa fa-check-circle text-success'>Active</i> &nbsp;&nbsp;" : "<i class='nav-icon fa  fa-times-circle text-danger' >Inactive</i>";
                $data[] = array(
                    $row->title,
                    $row->page_slug,
                    // $row->seva_category_id,
                    $row->created_date,
                    $row->modified_date,
                    $status,
                    '
                    <td><div class="action-buttons">
                    <a class="" title="Edit" href="charitable_programs/charitable_program_edit/' . $row->charitable_program_id . '">
                    <button class="btn btn-primary btn-small btn-xs"><i class="fa fa-edit"></i></button></a>&nbsp;
                    <a class="red" title="Delete" href="charitable_programs/charitable_program_delete/' . $row->charitable_program_id . '"> 
                    <button class="btn btn-danger btn-small btn-xs"><i class="fa fa-trash"></i></button></a>&nbsp;
                    </div></td>
                    '
    
                );
          
    
    }
    $output = array(
        "draw" => $draw,
        "recordsTotal" => $sevas->num_rows(),
        "recordsFiltered" => $sevas->num_rows(),
        "data" => $data

    );
    echo json_encode($output);
    exit;

}
public function add_charitable_program(){
  
    $data['page_type'] = $this->charitable_programs_model->page_type();
    $data['templates'] = $this->charitable_programs_model->view_data('templates');
    $data['view'] = 'charitable_programs/form';
    $data['title'] = 'Administrator Dashboard';
    $data['page_heading'] = 'Charitable Programs Form';
    $data['breadcrumb'] = 'Charitable Programs Form';
    $data['scripts'] = array('assets/javascripts/charitable_programs.js');
    $this->load->view('templates/dashboard', $data);
}
public function charitable_program_edit($charitable_program_id){
    
    // $data['seva_categories'] = $this->charitable_programs_model->view_data('seva_category');
  
    $this->charitable_programs_model->primary_key = array('charitable_program_id'=>$charitable_program_id);
    $seva_page = $this->charitable_programs_model->get_row('charitable_programs');
    // $seva_page->seva_category_id = explode(',',$seva_page->seva_category_id);
    $data['query'] = $seva_page;
    $data['page_type'] = $this->charitable_programs_model->page_type();
    $data['templates'] = $this->charitable_programs_model->view_data('templates');
    $data['view'] = 'charitable_programs/form';
    $data['title'] = 'Administrator Dashboard';
    $data['page_heading'] = 'Charitable Programs Form';
    $data['breadcrumb'] = 'Charitable Programs Form';
    $data['scripts'] = array('assets/javascripts/charitable_programs.js');
    $this->load->view('templates/dashboard', $data);
}


public function charitable_program_save()
{
   //  $this->charitable_programs_model->create_seva_table($this->input->post('page_slug'));
    $charitable_program_id = $this->input->post('charitable_program_id');
    $this->charitable_programs_model->data = $this->input->post();
   // $this->charitable_programs_model->data['seva_category_id'] = implode(',',$this->input->post('seva_category_id'));

    // Image Upload Code Begins Here
    $this->banner = array('upload_path' => CHARITABLE_PROGRAM_BANNER_PATH, 'allowed_types' => 'gif|jpg|png|jpeg');
    $this->upload->initialize($this->banner);
   
    if (!empty($_FILES['banner']['name']) && $this->upload->do_upload('banner')) {
        $upload_data = $this->upload->data();
        $file_Ext =  pathinfo($upload_data['full_path'], PATHINFO_EXTENSION);
        $gen_filename = "banner" . rand(1000000, 9999999) . "." . $file_Ext;
        rename($upload_data['full_path'], $upload_data['file_path'] . $gen_filename);
        $this->charitable_programs_model->data['banner'] = $gen_filename;
        // $this->createthumbs(array($upload_data['file_name']));
    } else {
    
        $data['form_error']['banner'] = $this->upload->display_errors();
    }
  
    $this->thumbnail = array('upload_path' => CHARITABLE_PROGRAM_BANNER_PATH, 'allowed_types' => 'gif|jpg|png|jpeg');
    $this->upload->initialize($this->thumbnail);
   
    if (!empty($_FILES['thumbnail']['name']) && $this->upload->do_upload('thumbnail')) {
        $upload_data = $this->upload->data();
        $file_Ext =  pathinfo($upload_data['full_path'], PATHINFO_EXTENSION);
        $gen_filename = "thumbnail" . rand(1000000, 9999999) . "." . $file_Ext;
        rename($upload_data['full_path'], $upload_data['file_path'] . $gen_filename);
        $this->charitable_programs_model->data['thumbnail'] = $gen_filename;
        // $this->createthumbs(array($upload_data['file_name']));
    } else {
    
        $data['form_error']['thumbnail'] = $this->upload->display_errors();
    }
   
    //Image Upload Code end here
    if (!empty($charitable_program_id)) {
        $this->charitable_programs_model->data['modified_date'] = date('Y-m-d h:i:s');
        $this->charitable_programs_model->data['modified_by'] = $this->session->userdata('user_id');
        $this->charitable_programs_model->primary_key = array('charitable_program_id' => $charitable_program_id);
        if ($q = $this->charitable_programs_model->update('charitable_programs')) {
            $msg = array('type' => 'success', 'icon' => 'fa fa-check', 'txt' => 'Record Updated Successfully');
           } else {
               $msg = array('type' => 'danger', 'icon' => 'fa fa-thumbs-down', 'txt' => 'Sorry! Unable to Update Record.');
           }
       } else {
       
           unset($this->charitable_programs_model->data['charitable_program_id']);
           $this->charitable_programs_model->data['created_date'] = date('Y-m-d');
           $this->charitable_programs_model->data['created_by'] = $this->session->userdata('user_id');
           $this->charitable_programs_model->data['modified_date'] = date('Y-m-d h:i:s');
           $this->charitable_programs_model->data['modified_by'] = $this->session->userdata('user_id');
        if ($this->charitable_programs_model->insert('charitable_programs')) {
            $msg = array('type' => 'success', 'icon' => 'fa fa-check', 'txt' => 'Record Added Successfully');
        } else {
            $data['query'] = (object) $this->input->post();
            $data['view'] = "charitable_programs/form";
            $data['title'] = 'Administrator Dashboard';
            $data['page_heading'] = 'Add/Edit Charitable Program Page';
            $data['breadcrumb'] = "Add/Edit Charitable Program Page";
            $data['scripts'] = array('assets/javascripts/' . 'charitable_programs.js');
            $this->load->view('templates/dashboard', $data);
            $msg = array('type' => 'danger', 'icon' => 'fa fa-thumbs-down', 'txt' => 'Sorry! Unable to Add Record.');
        }
    }

    $this->session->set_flashdata('msg', $msg);
    redirect("charitable_programs");
}


public function charitable_program_delete($charitable_program_id){
 
   $this->charitable_programs_model->primary_key = array('charitable_program_id'=>$charitable_program_id);
   if($this->charitable_programs_model->delete('charitable_programs')){
       $msg = array('type' => 'success', 'icon' => 'lni lni-thumbs-up lni-lg mr-2', 'txt' => 'Data Deleted Successfully');
   }else{
       $msg = array('type' => 'danger', 'icon' => 'lni lni-thumbs-down lni-lg mr-2', 'txt' => 'Sorry! Unable to Delete.');
   }
   $this->session->set_flashdata('msg', $msg);
   redirect('charitable_programs');
}


}