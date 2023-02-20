<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require_once 'vendor/autoload.php';

use Razorpay\Api\Api;

class Charitable_Programs extends MY_Controller
{
    public $class_name;
    public $api;
    function __construct()
    {
        parent::__construct();
        $this->class_name = strtolower(get_class());
        $this->load->config('razorpay-config');
        $this->load->library('form_validation');

        $this->load->model('seva_page_model');
        $this->load->model('festivals_model');
        $this->load->model('payment_model');
    }


    public function index($slug) {
      
        if (!empty($this->input->post())) {
            $keyId = $this->config->item('keyId'); 
            $keySecret = $this->config->item('keySecret');


            $this->form_validation->set_rules('full_name', 'Full Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim');
            $this->form_validation->set_rules('phone_number', 'Phone number', 'required|min_length[10]|max_length[10]|numeric');
            $this->form_validation->set_rules('pan_number', 'Pan Number', 'required|trim|alpha_numeric');
            $this->form_validation->set_rules('amount', 'Amount', 'required|trim|greater_than[499]');

            if($_POST['address'] && $_POST['pincode'] && $_POST['city']){
                $this->form_validation->set_rules('city', 'City', 'required|trim|alpha');
                $this->form_validation->set_rules('address', 'Address', 'required');
                $this->form_validation->set_rules('pincode', 'Pincode', 'required|trim|numeric');
            }
            

            
            if ($this->form_validation->run() == TRUE){
                $template_path = $this->programpagewisecontent($slug);
                $data = $this->data;
                $data['slug'] = $slug;
                $data['table_name'] = $table_name = $this->config->item('table_name');
                $this->festivals_model->data['full_name'] = $data['full_name'] = $full_name = $this->input->post('full_name');
                $this->festivals_model->data['country_code'] = $data['country_code'] = $country_code = $this->input->post('country_code');
                $this->festivals_model->data['phone_number'] = $data['phone_number'] = $phone_number = $this->input->post('phone_number');
                $this->festivals_model->data['email'] = $data['email'] = $email = $this->input->post('email');
                $this->festivals_model->data['pan_number'] = $data['pan_number'] = $pan_number = $this->input->post('pan_number');
                $this->festivals_model->data['address'] = $data['address'] = $address = $this->input->post('address');
                $this->festivals_model->data['pincode'] = $data['pincode'] = $pincode = $this->input->post('pincode');
                $this->festivals_model->data['amount'] = $data['amount'] = $amount = $this->input->post('amount');
                $this->festivals_model->data['currency'] = $data['currency'] = $currency = $this->input->post('currency');
                $this->festivals_model->data['payment_date'] = $data['payment_date'] = $payment_date = date('Y-m-d h:i:s');
                $this->festivals_model->data['seva_date'] = $data['seva_date'] = $seva_date = $this->input->post('seva_date');
                $this->festivals_model->data['seva_name'] = $data['seva_name'] = $seva_name = $this->input->post('seva_name');
                $this->festivals_model->data['festival'] = $data['festival'] = $festival = $this->input->post('festival');
                $this->festivals_model->data['status'] = 'Attempt';
                $data['keyId'] = $keyId = $this->config->item('keyId');
                $str_result = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $generated_key = substr(str_shuffle($str_result), 0, 4);
                $this->festivals_model->data['receipt'] = $receipt = $generated_key . '_' . rand('00000000', '9999999999');
                $data['insert_id'] = $insert_id = $this->festivals_model->insert($table_name);


                $duration = $this->input->post('duration');

                if ($duration == 'DONATE-NOW') {
                        $data['order_data'] = $order_data = [
                            'receipt'         => $receipt,
                            'amount'          => $amount * 100, // 39900 rupees in paise
                            'currency'        => $currency,
                            'payment'=> [
                                "capture"=> "automatic",
                                'capture_options' => array('automatic_expiry_period' => 12,'manual_expiry_period' => 7200,'refund_speed' => 'normal')
                            ],
                            'notes'           => [
                                'name'  => $full_name,
                                'phone_number' => $phone_number,
                                'email' => $email,
                                'pan_number' => $pan_number,
                                'address' => $address,
                                'pincode' => $pincode,
                                'payment_date' => $payment_date,
                                'receipt' => $receipt,
                                'seva_name' => $seva_name,
                                'insert_id' => $insert_id,
                                'festival' => $festival,
                                'paid_from'=>'website'
                            ],
                            'duration' =>'DONATE-NOW'
                
                        ];

                        $api = new Api($this->config->item('keyId'), $this->config->item('keySecret'));
                        $razorpayOrder = $api->order->create($order_data);

                        $data['key'] = $this->config->item('keyId');
                        $data['image'] = SETTINGS_UPLOAD_PATH.$data['settings']->LOGO_IMAGE;
                        $this->festivals_model->data['order_id'] = $data['order_id'] = $order_id = $razorpayOrder['id'];
                        $this->festivals_model->data['razorpay_order_id'] = $data['razorpay_order_id'] = $razorpay_order_id = $razorpayOrder['id'];
                        $this->festivals_model->data['entity'] = $data['entity'] = $entity = $razorpayOrder['entity'];
                        $this->festivals_model->data['status'] = $data['status'] = $status = $razorpayOrder['status'];
                        $this->festivals_model->data['created_at'] = $data['created_at'] = $created_at = $razorpayOrder['created_at'];
                        $this->festivals_model->primary_key = array('id' => $insert_id);
                        $this->festivals_model->update($table_name);
                        $data['callback_url'] = "seva_page/donation_success/$insert_id";

                        $this->load->view($template_path, $data);

                } elseif ($duration == 'DONATE-MONTHLY') {
              
                    $api = new Api($keyId, $keySecret);


                $customer =   $api->customer->create(array('name' => $full_name, 'email' => $email, 'contact' => $phone_number, 'fail_existing' => 0, 'notes' => array('pan' => $pan_number, 'address' => $address, 'amount' => $amount, 'seva_name' => $seva_name, 'payment_date' => $payment_date)));
                // Api Customer id generated when user details sent 
                $data['api_customer_id'] = $api_customer_id =  $customer->id;
                $this->payment_model->primary_key = array('id' => $customer->id);
                $get_customer = $this->payment_model->row_data('rzp_customers');
                
                if (!empty($get_customer) && $get_customer->id == $customer->id) {
                    $customer_id = $get_customer->customer_id;
                } else {
                    $this->payment_model->data = array('id' => $customer->id, 'entity' => $customer->entity, 'full_name' => $customer->name, 'email' => $customer->email, 'contact' => $customer->contact, 'pan' => $customer->notes->pan, 'address' => $address, 'amount' => $amount, 'programme' => $seva_name, 'payment_date' => $payment_date, 'created_at' => $customer->created_at);
                    $customer_id =  $this->payment_model->insert('rzp_customers');
                }
                $this->payment_model->data = [];
                $this->payment_model->data['payment_method'] =  $payment_method = $this->input->post('payment_method');
                $this->payment_model->data['donation_period'] = $donation_period = $this->input->post('donation_period');
                
                $data['call_back_url'] = $call_back_url = base_url("seva_page/dontaion_success/$insert_id");
                
                $data['customer_id'] = $this->payment_model->data['customer_id'] = $customer_id;
                $this->payment_model->primary_key = array('id' => $insert_id);
                $this->payment_model->update($table_name);
                
                if($payment_method == 'netbanking'){
                    $razorpayOrder =  $api->order->create(array('amount' => 0,'currency' => 'INR','payment_capture' => true,'method' => 'emandate','customer_id' => $customer->id,'receipt' => $receipt,'token' => array('auth_type' => 'netbanking','max_amount' => $amount * 100,'expire_at' => strtotime(" +".$donation_period." months"),'frequency' => 'monthly'),'notes' => array(
                        "name"  =>  $full_name,
                        "email"             => $email,
                        "contact"           => $phone_number,
                        "pan"               => $pan_number,
                        "dob"               => $dob,
                        "citizen"           => $citizen,
                       "address"           => $address
                   )));
                    
                   }else{
                   $razorpayOrder =   $api->order->create(array('amount' => $amount * 100, 'currency' => 'INR', 'method' => $payment_method, 'customer_id' => $customer->id, 'token' => array('max_amount' => $amount * 100, 'expire_at' => strtotime(" +".$donation_period." months"), 'frequency' => 'monthly'), 'receipt' => $receipt, 'notes'           => array(
                       "name"  =>  $full_name,
                       "email"             => $email,
                       "contact"           => $phone_number,
                       "pan"               => $pan_number,
                       "seva_name"               => $seva_name,
                       "festival"               => $festival,
                       "citizen"           => 'INDIAN',
                       "address"           => $address
                    )));
                }
                // print_R($razorpayOrder);
                $this->payment_model->data['razorpay_order_id'] = $data['razorpay_order_id'] = $razorpayOrderId = $razorpayOrder['id'];
                $this->payment_model->data['amount_paid'] = $razorpayOrder->amount_paid;
                $this->payment_model->data['amount_due'] = $razorpayOrder->amount_due;

                $this->payment_model->primary_key = array('id' => $insert_id);
                $this->payment_model->update($table_name);
              
                $data['order_data'] = [
                    "key"               => $keyId,
                    "amount"            => $amount,
                    "name"              => $this->config->item('company_name'),
                    "description"       => $this->config->item('description'),
                    "image"             => SETTINGS_UPLOAD_PATH . $this->data['settings']->LOGO_IMAGE,
                    "currency"          => $currency,
                    "full_name"              => $full_name,
                    "email"             => $email,
                    "contact"           => $phone_number,
                    "pan_number"               => $pan_number,
                   
                    "citizen"           => 'INDIAN',
                    "address"           => $address,
                    "merchant_order_id" => $receipt,
                    "receipt" => $receipt,
                    "order_id"          => $razorpayOrderId,
                    "insert_id"         => $insert_id,
                    "campaign"         => $festival,
                    "seva_name"         => $seva_name,
                    "table_name"              => $table_name,
                    "payment_method" => $payment_method,
                    "customer_id" => $api_customer_id,
                    "call_back_url"  => $call_back_url,
                    "interval" => $donation_period,
                    "duration" => $this->input->post('duration'),
                    "insert_id" => $insert_id

                ];
                // print_r($data); 
                $this->load->view($template_path, $data);


                }

            }else{
                $template_path = $this->programpagewisecontent($slug);
                $data = $this->data;
                $data['page_heading'] = $data['page_items']->title;
                $data['breadcrumb'] = '<span><a href="">Home</a> - </span><span><i class="fa fa-angle-right"></i></span><span class="active">'.$data['page_items']->title.'</span>' ;   
                $data['scripts'] = array('assets/javascripts/custom_page.js');
                $this->load->view($template_path, $data);
            }
            

        

        }else{


        $template_path = $this->programpagewisecontent($slug);
        $data = $this->data;

        // $data['view_path'] = "custom/".$slug; 
       
        $data['page_heading'] = $data['page_items']->title;
        $data['breadcrumb'] = '<span><a href="">Home</a> - </span><span><i class="fa fa-angle-right"></i></span><span class="active">'.$data['page_items']->title.'</span>' ;   
        $data['scripts'] = array('assets/javascripts/custom_page.js');
        $this->load->view($template_path, $data);
    }
    
    }


    public function custom($slug) {
       
   


        $template_path = $this->programpagewisecontent($slug);
        $data = $this->data;
        $data['view_path'] = "charitable_program/$slug";  
        $data['page_heading'] = $data['page_items']->title;
        $data['breadcrumb'] = '<span><a href="">Home</a> - </span><span><i class="fa fa-angle-right"></i></span><span class="active">'.$data['page_items']->title.'</span>' ;   
        $data['scripts'] = array('assets/javascripts/custom_page.js');
        $this->load->view($template_path, $data);
    
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


    
    public function save_payment($insert_id, $table_name)
    {
    
        $this->seva_page_model->primary_key = array('id' => $insert_id);
        $payment_data = $this->seva_page_model->row_data($table_name);
        $this->seva_page_model->primary_key = array('page_slug' => $payment_data->seva_name);
        $seva_data = $this->seva_page_model->row_data('charitable_programs');
        // print_R($payment_data->razorpay_payment_id);exit;

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
        $this->seva_page_model->update($table_name);

        if (!empty($this->input->post('error'))) {
            // $this->sendmail($payment_data->email, $payment_data->full_name, $payment_data->amount, $payment_data->razorpay_order_id, 0);
            $this->session->set_flashdata('amount', $payment_data->amount);
            $this->session->set_flashdata('name', $payment_data->full_name);
            // redirect($this->class_name . '/donation_failed/');
            redirect('seva_page/donation_failed/');
        } else {
            // $this->sendmail($payment_data->email, $payment_data->full_name, $payment_data->amount, $payment_data->razorpay_order_id, 1);
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
                'tally_head' => $seva_data->tally_head,
                'seva_name' => $payment_data->seva_name,
                'seva_code' => $seva_data->seva_code
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
            $this->session->set_flashdata('seva_name',$payment_data->seva_name);
            // redirect($this->class_name . '/donation_success/');
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
        $data['view_path'] =  'campaigns/donation_success';
        $data['name'] = urldecode($this->session->flashdata('name'));
        $data['amount'] = $this->session->flashdata('amount');
        $data['seva_name'] = $this->session->flashdata('seva_name');

        $data['scripts'] = array('javascripts/' . $this->class_name . '.js', 'javascripts/dashboard.js');
        $this->load->view('templates/seva_page', $data);
    }
    public function donation_failed()
    {
        $msg = array();
        $data = $this->data;
        $data['view_path'] =  'campaigns/donation_failed';
        // $data['name'] = ucfirst($name);
        $data['scripts'] = array('javascripts/' . $this->class_name . '.js', 'javascripts/dashboard.js');
        $this->load->view('templates/seva_page', $data);
    }

    public function sendmail($to_mail, $name, $amount, $receipt, $status)
    {


        $config['protocol']    = 'smtp';
        $config['smtp_host']    = 'mail@harekrishnamandir.org';
        $config['smtp_port']    = '465';
        $config['smtp_timeout'] = '7';
        $config['smtp_user']    = 'mail@harekrishnamandir.org';
        $config['smtp_pass']    = 'Q!W@E#r4t5y6';
        $config['charset']    = 'utf-8';
        $config['newline']    = "\r\n";
        $config['mailtype'] = 'html'; // or html
        $config['validation'] = TRUE; // bool whether to validate email or not 
        $config['wordwrap'] = TRUE; // bool whether to validate email or not     
        $this->load->library('email',$config);
        $this->email->set_mailtype("html");
        $this->email->from('mail@harekrishnamandir.org');
        $this->email->to($to_mail);

        if ($status == 1) {
            $this->payment_model->primary_key = array('template_id' => 1);
            $template = $this->payment_model->row_data('email_templates');
          
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

}