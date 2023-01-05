<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
    require_once 'vendor/autoload.php';

use Razorpay\Api\Api;
class Custom_page extends MY_Controller {
    public $class_name;
    public $api;
    function __construct() {
        parent::__construct();
        $this->class_name = strtolower(get_class());
        $this->load->model('custom_page_model');
        $this->load->model('seva_page_model');
        $this->load->config('razorpay-config');
    }

    
    public function index($slug) {
        
        if (!empty($this->input->post())) {

            $template_path = $this->pagewisecontent($slug);
            $data = $this->data;
            $data['slug'] = $slug;
            $data['table_name'] = $table_name = $this->input->post('table_name');

            $data['keyId'] = $keyId = $this->config->item('keyId');
            $this->seva_page_model->data['seva_name'] = $data['seva_name'] = $seva_name = $slug;
            $this->seva_page_model->data['full_name'] = $data['full_name'] = $full_name = $this->input->post('full_name');
            $this->seva_page_model->data['phone_number'] = $data['phone_number'] = $phone_number = $this->input->post('phone_number');
            $this->seva_page_model->data['email'] = $data['email'] = $email = $this->input->post('email');
            $this->seva_page_model->data['pan_number'] = $data['pan_number'] = $pan_number = $this->input->post('pan_number');
            $this->seva_page_model->data['city'] = $data['city'] = $city = $this->input->post('city');
            $this->seva_page_model->data['amount'] = $data['amount'] = $amount = $this->input->post('amount');
            $this->seva_page_model->data['payment_date'] = $data['payment_date'] = $payment_date = date('Y-m-d h:i:s');
            $str_result = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $generated_key = substr(str_shuffle($str_result), 0, 4);
            $this->seva_page_model->data['receipt'] = $receipt = $generated_key . '_' . rand('00000000', '9999999999');
            $insert_id = $this->seva_page_model->insert($table_name);

            // print_r($insert_id);exit;
            $order_data = [
                'receipt'         => $receipt,
                'amount'          => $amount * 100, // 39900 rupees in paise
                'currency'        => 'INR',
                   'payment'=> [
                    "capture"=> "automatic",
                    'capture_options' => array('automatic_expiry_period' => 12,'manual_expiry_period' => 7200,'refund_speed' => 'normal')
                ],
                'notes'           => [
                    'name'  => $full_name,
                    'phone_number' => $phone_number,
                    'email' => $email,
                    'pan_number' => $pan_number,
                    'city' => $city,
                    'payment_date' => $payment_date,
                    'receipt' => $receipt,
                    'seva_name' => $seva_name,
                    'insert_id' => $insert_id
                ]

            ];
            $api = new Api($this->config->item('keyId'), $this->config->item('keySecret'));
            $razorpayOrder = $api->order->create($order_data);
            // print_r($razorpayOrder['created_at']);exit;

            $this->seva_page_model->data['razorpay_order_id'] = $data['razorpay_order_id'] = $razorpay_order_id = $razorpayOrder['id'];
            $this->seva_page_model->data['order_id'] = $data['order_id'] = $order_id = $razorpayOrder['id'];
            $this->seva_page_model->data['entity'] = $data['entity'] = $entity = $razorpayOrder['entity'];
            $this->seva_page_model->data['status'] = $data['status'] = $status = $razorpayOrder['status'];
            $this->seva_page_model->data['created_at'] = $data['created_at'] = $created_at = $razorpayOrder['created_at'];

            $this->seva_page_model->primary_key = array('id' => $insert_id);
            $this->seva_page_model->update($table_name);
     
            $data['view_path'] = "custom/".$slug; 
            $data['insert_id'] = $insert_id;
            $this->load->view($template_path, $data);
        }else{


        $template_path = $this->pagewisecontent($slug);
        $data = $this->data;
        $data['view_path'] = "custom/".$slug; 
        if($slug == 'image-gallery'){
           $data['galleries'] =  $this->custom_page_model->get_gallery_data('gallery');
        }
        
        // if($slug == 'offer-sevas'){
            $this->custom_page_model->primary_key = array('featured_festival'=>1,'status_ind'=>1);
            $data['featured_festivals'] =  $this->custom_page_model->getdata('sevas_page');
            $this->custom_page_model->primary_key = array('program_type'=>0,'status_ind'=>1,'featured_programme'=>1);
            $data['charitable_programs'] =  $this->custom_page_model->getdata('charitable_programs');
            $this->custom_page_model->primary_key = array('program_type'=>1,'status_ind'=>1, 'featured_programme'=>1);
            $data['nitya_sevas'] =  $this->custom_page_model->getdata('charitable_programs');
            $this->custom_page_model->primary_key = array('status_ind'=>1);
            $data['festivals'] =  $this->custom_page_model->getdata('festivals');
        // }
        if($slug == 'festivals'){
            $this->custom_page_model->primary_key = array('status_ind'=>1);
            $data['festivals'] =  $this->custom_page_model->getdata('sevas_page');

        }
        if($slug == 'festivals_new'){
            $this->custom_page_model->primary_key = array('status_ind'=>1);
            $data['festivals'] =  $this->custom_page_model->getdata('festivals');

        }
        $data['page_heading'] = $data['page_items']->page_title;
        $data['breadcrumb'] = '<span><a href="">Home</a> - </span><span><i class="fa fa-angle-right"></i></span><span class="active">'.$data['page_items']->page_title.'</span>' ;   
        $data['scripts'] = array('assets/javascripts/custom_page.js');
        $this->load->view($template_path, $data);
    }
    
    }

    public function connect_save(){
        $this->custom_page_model->data = $this->input->post();
        $this->custom_page_model->data['service_slot'] = implode(',',$this->input->post('service_slot'));
      
        $res = $this->custom_page_model->insert('connect');
        if(!empty($res) && $res == true ){
            $result = 1;
        }else{
            $result = 0;
        }
        echo json_encode(($result));
    }

    public function gallery_categories($gallery_id){
        $data = $this->data;
        $data['view_path'] = "gallery/gallery_category"; 
        $this->custom_page_model->primary_key = array('gallery_id' => $gallery_id); 
        $data['gallery_categories'] =  $this->custom_page_model->getdata('gallery_category');
        $this->custom_page_model->primary_key = array('gallery_id'=>$gallery_id);
        $data['page_heading'] = $this->custom_page_model->get_row('gallery')->gallery_name;
        $data['breadcrumb'] = '<span><a href="">Home</a> - </span><span><i class="fa fa-angle-right"></i></span><span class="active">'.'Gallery Categories'.'</span>' ;   
        $data['scripts'] = array('assets/javascripts/custom_page.js');
        $this->load->view('templates/custom_page', $data);
    }
    
    public function show_gallery($gallery_id,$category_id){
        $data = $this->data;
        $data['view_path'] = "gallery/page"; 
        $this->custom_page_model->primary_key = array('gallery_id' => $gallery_id, 'category_id' => $category_id); 
        $data['gallery_images'] =  $this->custom_page_model->view_data('gallery_images');
        $this->custom_page_model->primary_key = array('category_id'=>$category_id);
        $data['page_heading'] = $this->custom_page_model->get_row('gallery_category')->category_name;
        $data['scripts'] = array('assets/javascripts/custom_page.js','assets/javascripts/index.js');
        $this->load->view('templates/custom_page', $data);
    }


    public function charitable($slug){
        $template_path = $this->pagewisecontent($slug);
        $data = $this->data;
        $data['slug'] = $slug;
        $data['table_name'] = $table_name = $this->input->post('table_name');

        $data['keyId'] = $keyId = $this->config->item('keyId');
        $this->seva_page_model->data['seva_name'] = $data['seva_name'] = $seva_name = $this->input->post('table_name');
        $this->seva_page_model->data['full_name'] = $data['full_name'] = $full_name = $this->input->post('full_name');
        $this->seva_page_model->data['phone_number'] = $data['phone_number'] = $phone_number = $this->input->post('phone_number');
        $this->seva_page_model->data['email'] = $data['email'] = $email = $this->input->post('email');
        $this->seva_page_model->data['pan_number'] = $data['pan_number'] = $pan_number = $this->input->post('pan_number');
        $this->seva_page_model->data['city'] = $data['city'] = $city = $this->input->post('city');
        $this->seva_page_model->data['amount'] = $data['amount'] = $amount = $this->input->post('amount');
        $this->seva_page_model->data['payment_date'] = $data['payment_date'] = $payment_date = date('Y-m-d h:i:s');
        $str_result = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $generated_key = substr(str_shuffle($str_result), 0, 4);
        $this->seva_page_model->data['receipt'] = $receipt = $generated_key . '_' . rand('00000000', '9999999999');
        $insert_id = $this->seva_page_model->insert($table_name);

        // print_r($insert_id);exit;
        $order_data = [
            'receipt'         => $receipt,
            'amount'          => $amount * 100, // 39900 rupees in paise
            'currency'        => 'INR',
            'notes'           => [
                'name'  => $full_name,
                'phone_number' => $phone_number,
                'email' => $email,
                'pan_number' => $pan_number,
                'city' => $city,
                'payment_date' => $payment_date,
                'receipt' => $receipt,
                'seva_name' => $seva_name,
                'insert_id' => $insert_id
            ]

        ];
        $api = new Api($this->config->item('keyId'), $this->config->item('keySecret'));
        $razorpayOrder = $api->order->create($order_data);
        // print_r($razorpayOrder['created_at']);exit;

        $this->seva_page_model->data['razorpay_order_id'] = $data['razorpay_order_id'] = $razorpay_order_id = $razorpayOrder['id'];
        $this->seva_page_model->data['entity'] = $data['entity'] = $entity = $razorpayOrder['entity'];
        $this->seva_page_model->data['status'] = $data['status'] = $status = $razorpayOrder['status'];
        $this->seva_page_model->data['created_at'] = $data['created_at'] = $created_at = $razorpayOrder['created_at'];

        $this->seva_page_model->primary_key = array('id' => $insert_id);
        $this->seva_page_model->update($slug);


        $data['insert_id'] = $insert_id;
        $this->load->view($template_path, $data);
    }
   

    
    public function save_payment($insert_id, $table_name)
    {

        $this->seva_page_model->primary_key = array('id' => $insert_id);
        $payment_data = $this->seva_page_model->row_data($table_name);
         $this->seva_page_model->primary_key = array('page_slug' => $payment_data->seva_name);
        $seva_data = $this->seva_page_model->row_data('charitable_programs');
        
        if (!empty($this->input->post('error'))) {
            $this->seva_page_model->data['error_code'] = $this->input->post('error')['code'];
            $this->seva_page_model->data['error_description'] = $this->input->post('error')['description'];
            $this->seva_page_model->data['reason'] = $this->input->post('error')['reason'];
            $this->seva_page_model->data['razorpay_payment_id'] = $razorpay_payment_id =  json_decode($this->input->post('error')['metadata'])->payment_id;
            $this->seva_page_model->data['status'] = 'failed';
        } else {
            $this->seva_page_model->data['razorpay_payment_id'] = $razorpay_payment_id = $this->input->post('razorpay_payment_id');
            $this->seva_page_model->data['status'] = 'success';
        }
         $this->seva_page_model->primary_key = array('id' => $insert_id);
        $q = $this->seva_page_model->update($table_name);
      

        if (!empty($this->input->post('error'))) {
            $this->sendmail($payment_data->email, $payment_data->name, $payment_data->amount, $payment_data->razorpay_order_id, 0);
            $this->session->set_flashdata('amount', $payment_data->amount);
            $this->session->set_flashdata('name', $payment_data->full_name);
            redirect($this->class_name . '/donation_failed/');
        } else {
            $this->sendmail($payment_data->email, $payment_data->name, $payment_data->amount, $payment_data->razorpay_order_id, 1);
            
             $curl = curl_init();

            curl_setopt_array($curl, array(
              CURLOPT_URL => 'https://hkm-tapf.azurewebsites.net/api/login',
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => '',
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => true,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => 'POST',
              CURLOPT_POSTFIELDS =>'{
                "email":"websiteuser@harekrishnamandir.org",
                "password":"Websiteuser@786"
            }',
              CURLOPT_HTTPHEADER => array(
                'Accept: application/json',
                'Authorization: ',
                'Content-Type: application/json'
              ),
            ));
            
            $response = curl_exec($curl);
            curl_close($curl);
            $token = json_decode($response)->token;
           
            

            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://hkm-tapf.azurewebsites.net/api/web/online-donation',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'name' => $payment_data->full_name,
                'email' => $payment_data->email,
                'phone_number' => $payment_data->phone_number,
                'address' => $payment_data->city,
                'amount' => $payment_data->amount,
                'seva_id' => $payment_data->id,
                'transaction_number' => $payment_data->razorpay_order_id,
                'order_id' => "$payment_data->razorpay_order_id",
                'payment_status' => $payment_data->status,
                'tally_head' => !empty($seva_data->tally_head) ? $seva_data->tally_head : 'General Donation',
                'seva_name' => $payment_data->seva_name,
                'seva_code' => !empty($seva_data->seva_code) ? $seva_data->seva_code : 'GEN-ADS'
            ),
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer $token"
            ),
            ));
            
            $response = curl_exec($curl);
      
            curl_close($curl);
            
            $this->session->set_flashdata('order_id', $razorpay_payment_id);
            $this->session->set_flashdata('razorpay_payment_id', $razorpay_payment_id);
            $this->session->set_flashdata('amount', $payment_data->amount);
            $this->session->set_flashdata('name', $payment_data->full_name);
            redirect('seva_page/donation_success/');
        }
    }

    public function donation_success()
    {
        // if(empty($res) || empty($amount)){
        //     redirect('donate');
        // }
        $data = $this->data;
        $msg = array();
        $data['view_path'] = $this->class_name . '/donation_success';
        // $data['name'] = urldecode($res);
        // $data['amount'] = $amount;

        $data['scripts'] = array('javascripts/' . $this->class_name . '.js', 'javascripts/dashboard.js');
        $this->load->view('templates/seva_page', $data);
    }
    public function donation_failed()
    {
        $msg = array();
        $data = $this->data;
        $data['view_path'] = $this->class_name . '/donation_failed';
        // $data['name'] = ucfirst($name);
        $data['scripts'] = array('javascripts/' . $this->class_name . '.js', 'javascripts/dashboard.js');
        $this->load->view('templates/seva_page', $data);
    }

    public function sendmail($to_mail, $name, $amount, $receipt, $status)
    {


        $config['protocol']    = 'mail';
        $config['smtp_host']    = 'mail.hkm-mandir.org';
        $config['smtp_port']    = '465';
        $config['smtp_timeout'] = '30';
        $config['smtp_user']    = 'admin@hkm-mandir.org';
        $config['smtp_pass']    = '@ksh@y@ch@it@ny@123';
        $config['charset']    = 'utf-8';
        $config['newline']    = "\r\n";
        // $config['smtp_crypto'] = 'ssl';
        $config['mailtype'] = 'html'; // or html
        $config['validation'] = TRUE; // bool whether to validate email or not 
        $config['wordwrap'] = TRUE; // bool whether to validate email or not 

        $this->load->library('email', $config);
        $this->email->set_mailtype("html");
        $this->email->from('admin@hkm-mandir.org', 'Harekrishna Mandir');
        $this->email->to($to_mail);

        if ($status == 1) {
            $this->seva_page_model->primary_key = array('template_id' => 1);
            $template = $this->seva_page_model->row_data('email_templates');
            $data['name'] = $name;
            $data['amount'] = $amount;
            $this->email->subject($template->template_title);
            // $message = $template->template_content;
            $message = str_replace('####NAME####', $name, $template->template_content);
            $message = str_replace('####RECEIPT####', $receipt, $message);
        } elseif ($status == 0) {
            $this->seva_page_model->primary_key = array('template_id' => 2);
            $template = $this->seva_page_model->row_data('email_templates');
            $data['name'] = $name;
            $data['amount'] = $amount;
            $this->email->subject($template->template_title);
            // $message = $template->template_content;

            $message = str_replace('####NAME####', $name, $template->template_content);
            $message = str_replace('####RECEIPT####', $receipt, $message);
            // $message = $this->load->view('email_templates/failed.php',$data,true);
        }


        $this->email->message($message);

        $q = $this->email->send();
    }


    public function page404(){
        $data = $this->data;
    
        $data['view_path'] = "custom/page404"; 
        $this->custom_page_model->primary_key = array('status_ind'=>1);
        $data['banners'] = $this->custom_page_model->view_data('banners');
        $data['scripts'] = array('assets/javascripts/index.js');
        $this->load->view('templates/custom_page', $data);
    }
}