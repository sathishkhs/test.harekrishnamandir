<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require_once 'vendor/autoload.php';

use Razorpay\Api\Api;

class Seva_Page extends MY_Controller
{
    public $class_name;
    public $api;
    function __construct()
    {
        parent::__construct();
        $this->class_name = strtolower(get_class());
        $this->load->config('razorpay-config');


        $this->load->model('pages_model');
    }


    public function donation_success($insert_id)
    {
        $data = $this->data;
        $this->festivals_model->primary_key = array('page_slug' => 'success-donation');
        $data['page_items'] = $this->festivals_model->row_data('pages');
        $this->festivals_model->data['razorpay_payment_id'] = $razorpay_payment_id = $this->input->post('razorpay_payment_id');
        $this->festivals_model->data['razorpay_signature'] = $razorpay_signature = $this->input->post('razorpay_signature');
        if(!empty($this->input->post()) && !empty($this->input->post('razorpay_payment_id'))){
        $this->festivals_model->data['status'] = 'success';
        }
        $this->festivals_model->primary_key = array('id' => $insert_id);
        if ($this->config->item('payment_mode') == 'test') {
            $this->festivals_model->update('test_payments');
            $this->festivals_model->primary_key = array('id' => $insert_id);
            $data['payment_data'] = $payment_data =  $this->festivals_model->row_data('test_payments');
        } else {
            $this->festivals_model->update('payments');
            $this->festivals_model->primary_key = array('id' => $insert_id);
            $data['payment_data'] = $payment_data =  $this->festivals_model->row_data('payments');
        }
        $api = new Api($this->config->item('keyId'), $this->config->item('keySecret'));
        $rzp = $api->payment->fetch($data['payment_data']->razorpay_payment_id);
        if ($rzp->status != 'captured') {
            $api = new Api($this->config->item('keyId'), $this->config->item('keySecret'));
            $rzp = $api->payment->fetch($data['payment_data']->razorpay_payment_id)->capture(array('amount' => $data['payment_data']->amount, 'currency' => $data['payment_data']->currency));
        }


        // if ($this->config->item('payment_mode') == 'test') {
        // } else {
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
                CURLOPT_POSTFIELDS => '{
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
       if($response && !empty($response) && !empty(json_decode($response)->token)){
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
                    'name' => "$payment_data->full_name",
                    'email' => "$payment_data->email",
                    'phone_number' => "$payment_data->phone_number",
                    'address' => "$payment_data->address",
                    'amount' => "$payment_data->amount",
                    "pan" => "$payment_data->pan_number",
                    'seva_id' => $payment_data->id,
                    'transaction_number' => "$payment_data->razorpay_payment_id",
                    'order_id' => "$payment_data->razorpay_order_id",
                    'payment_status' => "$payment_data->status",
                    'tally_head' => "$payment_data->tally_head",
                    'seva_name' => "$payment_data->seva_name",
                    'seva_code' => "$payment_data->seva_code"
                ),
                CURLOPT_HTTPHEADER => array(
                    "Authorization: Bearer $token"
                ),
            ));

            $response = curl_exec($curl);
           
            curl_close($curl);
        }
            if(!empty($response) && !empty(json_decode($response)->success) && json_decode($response)->success == 1){
              
                $this->festivals_model->primary_key = array('razorpay_payment_id'=>$payment_data->razorpay_payment_id);
                $this->festivals_model->data['api_reciept_gen'] = 'generated';
                if ($this->config->item('payment_mode') == 'test') {
               $this->festivals_model->update('test_payments');
                }else{
               $this->festivals_model->update('payments');
                }
               
            }else{
                $this->festivals_model->primary_key = array('razorpay_payment_id'=>$payment_data->razorpay_payment_id);
                $this->festivals_model->data['api_reciept_gen'] = 'Not generated';
                if ($this->config->item('payment_mode') == 'test') {
                    $this->festivals_model->update('test_payments');
                     }else{
                    $this->festivals_model->update('payments');
                     }
            }
            $this->sendmail($payment_data->email,$payment_data->full_name,$payment_data->amount , $payment_data->receipt , $payment_data->status );
        // }
        $data['seva_name'] = $data['payment_data']->seva_name;
        $data['slug'] = $data['payment_data']->festival;

        $data['javascripts'] = 'templates/includes/festivals/scripts';
        $data['view_path'] = $this->class_name . '/donation_success';
        $data['scripts'] = array('javascripts/' . $this->class_name . '.js', 'javascripts/dashboard.js');
        $this->load->view('templates/festivals_page', $data);
    }
    public function donation_failed($insert_id)
    {
        $data = $this->data;
        $this->festivals_model->primary_key = array('page_slug' => 'failed-donation');
        $data['page_items'] = $this->festivals_model->row_data('pages');

        $this->festivals_model->data['status'] = $error_code = !empty($this->input->post('status')) ? $this->input->post('status') : 'Failed';
        $this->festivals_model->data['error_code'] = $error_code = $this->input->post('error_code');
        $this->festivals_model->data['error_description'] = $error_description = $this->input->post('error_description');
        $this->festivals_model->data['error_source'] = $error_source = $this->input->post('error_source');
        $this->festivals_model->data['error_reason'] = $error_reason = $this->input->post('error_reason');
        $this->festivals_model->data['razorpay_payment_id'] = $razorpay_payment_id = $this->input->post('razorpay_payment_id');
        $razorpay_order_id = $this->input->post('razorpay_order_id');
        // $this->festivals_model->data['status'] = $status = 'Failed';
        $this->festivals_model->primary_key = array('id' => $insert_id);
        if ($this->config->item('payment_mode') == 'test') {
            $this->festivals_model->update('test_payments');
            $this->festivals_model->primary_key = array('id' => $insert_id);
            $data['payment_data'] = $this->festivals_model->row_data('test_payments');
        } else {
            $this->festivals_model->update('payments');
            $this->festivals_model->primary_key = array('id' => $insert_id);
            $data['payment_data'] = $this->festivals_model->row_data('payments');
        }

        $this->trait($data['payment_data']->full_name,$data['payment_data']->email,$data['payment_data']->phone_number,$data['payment_data']->country_code);
        $this->event($data['payment_data']->phone_number, $data['payment_data']->amount, $data['payment_data']->razorpay_payment_id);
        $data['slug'] = $data['payment_data']->festival;


        $data['javascripts'] = 'templates/includes/festivals/scripts';
        $data['view_path'] = $this->class_name . '/donation_failed';
        $data['scripts'] = array('javascripts/' . $this->class_name . '.js', 'javascripts/dashboard.js');
        $this->load->view('templates/festivals_page', $data);
    }

    public function trait($full_name,$email,$phone_number,$country_code){
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://api.interakt.ai/v1/public/track/users/');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "{\n    \"userId\": \"$phone_number\",\n    \"phoneNumber\": \"$phone_number\",\n    \"countryCode\": \"$country_code\",\n    \"traits\": {\n        \"name\": \"$full_name\",\n        \"email\": \"$email\"\n    }}");
        
        $headers = array();
        $headers[] = 'Content-Type: application/json';
        $headers[] = 'Authorization: Basic S0dOTGk2eFpxaUVRbEpzZ183VXZEcEZPcTBUSU9CTElvY3lmam9RTlJQYzo=';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        
        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);
    }

    public function event($phone_number, $amount, $razorpay_payment_id){
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://api.interakt.ai/v1/public/track/events/');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "{\n    \"userId\": \"$phone_number\",\n    \"event\": \"Payment Failed\",\n    \"traits\": {\n        \"Amount\": \"$amount\",\n        \"PaymentId\": \"$razorpay_payment_id\"\n    }}");
        
        $headers = array();
        $headers[] = 'Content-Type: application/json';
        $headers[] = 'Authorization: Basic S0dOTGk2eFpxaUVRbEpzZ183VXZEcEZPcTBUSU9CTElvY3lmam9RTlJQYzo=';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        
        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);
    }
    public function index($slug)
    {
        if (!empty($this->input->post())) {

            $template_path = $this->sevaspagewisecontent($slug);
            $data = $this->data;
            $data['slug'] = $slug;
            $data['table_name'] = $table_name = $this->input->post('table_name');

            $data['keyId'] = $keyId = $this->config->item('keyId');
            $this->seva_page_model->data['festival'] = $data['festival'] = $festival = $this->input->post('festival');
            $this->seva_page_model->data['seva_name'] = $data['seva_name'] = $seva_name = $this->input->post('seva_name');
            $this->seva_page_model->data['full_name'] = $data['full_name'] = $full_name = $this->input->post('full_name');
            $this->seva_page_model->data['phone_number'] = $data['phone_number'] = $phone_number = $this->input->post('phone_number');
            $this->seva_page_model->data['email'] = $data['email'] = $email = $this->input->post('email');
            $this->seva_page_model->data['pan_number'] = $data['pan_number'] = $pan_number = $this->input->post('pan_number');
            $this->seva_page_model->data['city'] = $data['city'] = $city = $this->input->post('city');
            $this->seva_page_model->data['pincode'] = $data['pincode'] = $pincode = $this->input->post('pincode');
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
                'payment' => [
                    "capture" => "automatic",
                    'capture_options' => array('automatic_expiry_period' => 12, 'manual_expiry_period' => 7200, 'refund_speed' => 'normal')
                ],
                'notes'           => [
                    'name'  => $full_name,
                    'phone_number' => $phone_number,
                    'email' => $email,
                    'pan_number' => $pan_number,
                    'city' => $city,
                    'pincode' => $pincode,
                    'payment_date' => $payment_date,
                    'receipt' => $receipt,
                    'seva_name' => $seva_name,
                    'insert_id' => $insert_id,
                    'festival' => $festival
                ]

            ];
            $api = new Api($this->config->item('keyId'), $this->config->item('keySecret'));
            $razorpayOrder = $api->order->create($order_data);
            // print_r($razorpayOrder['id']);exit;

            $this->seva_page_model->data['order_id'] = $data['order_id'] = $order_id = $razorpayOrder['id'];
            $this->seva_page_model->data['razorpay_order_id'] = $data['razorpay_order_id'] = $razorpay_order_id = $razorpayOrder['id'];
            $this->seva_page_model->data['entity'] = $data['entity'] = $entity = $razorpayOrder['entity'];
            $this->seva_page_model->data['status'] = $data['status'] = $status = $razorpayOrder['status'];
            $this->seva_page_model->data['created_at'] = $data['created_at'] = $created_at = $razorpayOrder['created_at'];

            $this->seva_page_model->primary_key = array('id' => $insert_id);
            $this->seva_page_model->update($table_name);


            $data['insert_id'] = $insert_id;
            $this->load->view($template_path, $data);
        } else {

            $template_path = $this->sevaspagewisecontent($slug);

            $data = $this->data;
            if(!empty($data['page_items']->gallery_id)){
                $this->pages_model->primary_key = array('gallery_id'=>$data['page_items']->gallery_id);
                $data['gallery'] = $this->pages_model->limit_gallery('gallery_images');
                }

            $data['slug'] = $slug;
            $data['page_heading'] = 'Seva Page';
            $data['breadcrumb'] = '<span><a href="">Home</a> - </span><span><i class="fa fa-angle-right"></i></span> <span><a href="' . $this->class_name . '">' . ucfirst($this->class_name) . '</a> - </span><span class="active">' . $data['page_items']->sevas_page_title . '</span>';
            $data['scripts'] = array('assets/javascripts/seva_page.js');
            $this->load->view($template_path, $data);
        }
    }


    public function save_payment($insert_id, $table_name)
    {

        $this->seva_page_model->primary_key = array('id' => $insert_id);
        $payment_data = $this->seva_page_model->row_data($table_name);
        $this->seva_page_model->primary_key = array('page_slug' => $payment_data->festival);
        $festival_data = $this->seva_page_model->row_data('sevas_page');
        $this->seva_page_model->primary_key = array('festival_id' => $festival_data->festival_id, 'seva_name' => $payment_data->seva_name);
        $seva_data = $this->seva_page_model->row_data('sevas');

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
            $this->sendmail($payment_data->email, $payment_data->name, $payment_data->amount, $payment_data->razorpay_order_id, 0);
            $this->session->set_flashdata('amount', $payment_data->amount);
            $this->session->set_flashdata('name', $payment_data->full_name);
            redirect($this->class_name . '/donation_failed/'.$insert_id);
        } else {
            $this->sendmail($payment_data->email, $payment_data->full_name, $payment_data->amount, $payment_data->razorpay_order_id, 1);

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
                CURLOPT_POSTFIELDS => '{
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
                    'order_id' => $payment_data->razorpay_order_id,
                    'payment_status' => $payment_data->status,
                    'tally_head' => !empty($seva_data->tally_head) ? $seva_data->tally_head : 'Not Available',
                    'seva_name' => $payment_data->seva_name,
                    'seva_code' => !empty($seva_data->seva_code) ? $seva_data->seva_code : 'Not Available'
                ),
                CURLOPT_HTTPHEADER => array(
                    "Authorization: Bearer $token"
                ),
            ));

            $response = curl_exec($curl);
          
            curl_close($curl);
            if(json_decode($response)->success == 1 && empty(json_decode($response)->errors)){
                $this->festivals_model->primary_key = array('razorpay_payment_id'=>$payment_data->razorpay_payment_id);
                $this->festivals_model->data['api_reciept_gen'] = 'generated';
                $this->festivals_model->update('payments');
           
            }
            $this->session->set_flashdata('order_id', $razorpay_payment_id);
            $this->session->set_flashdata('razorpay_payment_id', $razorpay_payment_id);
            $this->session->set_flashdata('amount', $payment_data->amount);
            $this->session->set_flashdata('name', $payment_data->full_name);
            redirect($this->class_name . '/donation_success/'.$insert_id);
        }
    }

    // public function donation_success()
    // {
    //     // if(empty($res) || empty($amount)){
    //     //     redirect('donate');
    //     // }
    //     $data = $this->data;
    //     $msg = array();
    //     $data['view_path'] = $this->class_name . '/donation_success';
    //      $data['name'] = urldecode($this->session->flashdata('name'));
    //     $data['amount'] = $this->session->flashdata('amount');
    //     $data['scripts'] = array('javascripts/' . $this->class_name . '.js', 'javascripts/dashboard.js');
    //     $this->load->view('templates/seva_page', $data);
    // }
    // public function donation_failed()
    // {
    //     $msg = array();
    //     $data = $this->data;
    //     $data['view_path'] = $this->class_name . '/donation_failed';
    //       $data['name'] = urldecode($this->session->flashdata('name'));

    //     $data['scripts'] = array('javascripts/' . $this->class_name . '.js', 'javascripts/dashboard.js');
    //     $this->load->view('templates/seva_page', $data);
    // }

    public function sendmail($to_mail, $name, $amount, $receipt, $status)
    {


        $config['protocol']    = 'smtp';
        $config['smtp_host']    = 'mail.harekrishnamandir.org';
        $config['smtp_port']    = '587';
        $config['smtp_timeout'] = '7';
        $config['smtp_user']    = 'mailing@harekrishnamandir.org';
        $config['smtp_pass']    = 'Q!W@E#r4t5y6';
        $config['charset']    = 'utf-8';
        $config['newline']    = "\r\n";
        $config['mailtype'] = 'html'; // or html
        $config['validation'] = TRUE; // bool whether to validate email or not 
        $config['wordwrap'] = TRUE; // bool whether to validate email or not     
        $this->load->library('email',$config);

        $this->email->set_mailtype("html");
        $this->email->from('mailing@harekrishnamandir.org');
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
}
