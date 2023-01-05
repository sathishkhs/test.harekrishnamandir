<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

	require '../vendor/autoload.php';
	use PhpOffice\PhpSpreadsheet\Spreadsheet;
	use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Donations extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('payments_model');
		$user_id = $this->session->userdata('user_id');
		if (empty($user_id)) {
			redirect('');
		}
	}

	public function index(){
		$data['festivals'] = $this->payments_model->view('sevas_page');
		$data['charitable_programs'] = $this->payments_model->view('charitable_programs');
		$data['view'] = 'donations/donations_list';
		$data['title'] = 'Administrator Dashboard';
		$data['page_heading'] = 'Donations List';
		$data['breadcrumb'] = 'Donations List';
		$data['scripts'] = array('assets/javascripts/donations.js');
		$this->load->view('templates/dashboard', $data);
	}

	public function donations_list($slug=''){
		$draw = intval($this->input->post("draw"));
		$start = intval($this->input->post("start"));
		$length = intval($this->input->post("length"));
		$payments = $this->payments_model->get_pagination('payments');

		$data = array();
		foreach ($payments->result() as $row) {
		if(!empty($row->status) ){
			if($row->status == 'success'){
		    $status = '<span class="text-success">Success</span>';
			}else{
			$status = 	'<span class="text-danger">Failed</span>';
			}
		}else{
		    $status = '<span class="text-warning">Dropped</span>';
		}
			$data[] = array(
				$row->full_name,
				$row->email,
				$row->phone_number,
				$row->pan_number,
				$row->amount,
				$row->payment_date,
				$row->festival,
				$row->seva_name,
				$row->page_slug,
				$row->city,
				$row->status,
				$row->razorpay_order_id,
				$row->razorpay_payment_id,
				$row->error_reason,
				$row->api_reciept_gen
				

			);
		}
		$output = array(
			"draw" => $draw,
			"recordsTotal" => $payments->num_rows(),
			"recordsFiltered" => $payments->num_rows(),
			"data" => $data
		);
		echo json_encode($output);
		exit();
	}


	public function download_donations(){
		
		$rand = rand(100,999999);
		$filename = 'donations_'.$rand.'.xls';

		$donations = $this->payments_model->get_donations('payments');
	
	
		$spreadsheet = new Spreadsheet();
		$table_columns = array("S.No","Payment Date", "Name", "Mobile", "Email", "Amount",  "Pan", "Pincode", "Address", "city","Seva Date","Status",  "Currency",  "Page Slug", "Festival", "Seva Name",  "Razorpay Payment Id", "Order Id", "Tally Head", "Seva Code", "Error Descrption");
		$sheet = $spreadsheet->getActiveSheet()
		->fromArray(
			$table_columns,   // The data to set
									NULL,        // Array values with this value will not be set
									'A1'         // Top left coordinate of the worksheet range where
												//    we want to set these values (default is A1)
								);
		$key = 2;
		foreach($donations as $row){
			$sheet->setCellValue('A'.$key, $key);
			$sheet->setCellValue('B'.$key, $row->payment_date);
			$sheet->setCellValue('C'.$key, $row->full_name);
			$sheet->setCellValue('D'.$key, $row->phone_number);
			$sheet->setCellValue('E'.$key, $row->email);
			$sheet->setCellValue('F'.$key, $row->amount);
			$sheet->setCellValue('G'.$key, $row->pan_number);
			$sheet->setCellValue('H'.$key, $row->pincode);
			$sheet->setCellValue('I'.$key, $row->address);
			$sheet->setCellValue('J'.$key, $row->city);
			$sheet->setCellValue('K'.$key, $row->seva_date);
			$sheet->setCellValue('L'.$key, $row->status);
			$sheet->setCellValue('M'.$key, $row->currency);
			$sheet->setCellValue('N'.$key, $row->page_slug);
			$sheet->setCellValue('O'.$key, $row->festival);
			$sheet->setCellValue('P'.$key, $row->seva_name);
			$sheet->setCellValue('Q'.$key, $row->razorpay_payment_id);
			$sheet->setCellValue('R'.$key, $row->order_id);
			$sheet->setCellValue('S'.$key, $row->tally_head);
			$sheet->setCellValue('T'.$key, $row->seva_code);
			$sheet->setCellValue('U'.$key, $row->error_description);
			
			$key++;
		}

		$writer = new Xlsx($spreadsheet);
		$writer->save(DONATIONS_PATH.$filename);
		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename="'.basename(DONATIONS_PATH.$filename).'"');
		header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize(DONATIONS_PATH.$filename));
            flush(); // Flush system output buffer
            readfile(DONATIONS_PATH.$filename);
		die();
	}


	public function charitable_donations(){
		$data['charitable_programs'] = $this->payments_model->view('charitable_programs');
		$data['view'] = 'donations/charitable_donations_list';
		$data['title'] = 'Administrator Dashboard';
		$data['page_heading'] = 'Charitable Donations List';
		$data['breadcrumb'] = 'Charitable Donations List';
		$data['scripts'] = array('assets/javascripts/donations.js');
		$this->load->view('templates/dashboard', $data);
	}

	public function charitable_donations_list($slug=''){
		$draw = intval($this->input->post("draw"));
		$start = intval($this->input->post("start"));
		$length = intval($this->input->post("length"));
		$payments = $this->payments_model->get_pagination('payments');

		$data = array();
		foreach ($payments->result() as $row) {
		if(!empty($row->status) ){
			if($row->status == 'success'){
		    $status = '<span class="text-success">Success</span>';
			}else{
			$status = 	'<span class="text-danger">Failed</span>';
			}
		}else{
		    $status = '<span class="text-warning">Dropped</span>';
		}
			$data[] = array(
				$row->full_name,
				$row->email,
				$row->phone_number,
				$row->city,
				$row->pan_number,
				$row->amount,
				$row->payment_date,
				$row->seva_name,
				$row->status,
				$row->razorpay_payment_id,
				$row->reason,
				

			);
		}
		$output = array(
			"draw" => $draw,
			"recordsTotal" => $payments->num_rows(),
			"recordsFiltered" => $payments->num_rows(),
			"data" => $data
		);
		echo json_encode($output);
		exit();
	}

	public function download_charitable_donations(){
		
 
		$rand = rand(100,999999);
		$filename = 'donations_'.$rand.'.xls';
		
		$donations = $this->payments_model->view('payments');
	
		$spreadsheet = new Spreadsheet();
		$table_columns = array("S.No","Receipt No", "Order Id", "Name", "Email", "Mobile Number",  "City", "Amount",  "Pan Number",  "Payment Date", "Razor Pay Order Id", "Razor Pay Payment Id",  "Seva Name", "Status", "Error Code", "Error Description", "Reason", "Entity", "Created Date");
		$sheet = $spreadsheet->getActiveSheet()
								->fromArray(
									$table_columns,   // The data to set
									NULL,        // Array values with this value will not be set
									'A1'         // Top left coordinate of the worksheet range where
												//    we want to set these values (default is A1)
								);
		$key = 2;
		foreach($donations as $row){
			$sheet->setCellValue('A'.$key, $key);
			$sheet->setCellValue('B'.$key, $row->receipt);
			$sheet->setCellValue('C'.$key, $row->order_id);
			$sheet->setCellValue('D'.$key, $row->full_name);
			$sheet->setCellValue('E'.$key, $row->email);
			$sheet->setCellValue('F'.$key, $row->phone_number);
			$sheet->setCellValue('G'.$key, $row->city);
			$sheet->setCellValue('H'.$key, $row->amount);
			$sheet->setCellValue('I'.$key, $row->pan_number);
			$sheet->setCellValue('J'.$key, $row->payment_date);
			$sheet->setCellValue('K'.$key, $row->razorpay_order_id);
			$sheet->setCellValue('L'.$key, $row->razorpay_payment_id);
			$sheet->setCellValue('M'.$key, $row->seva_name);
			$sheet->setCellValue('N'.$key, $row->status);
			$sheet->setCellValue('O'.$key, $row->error_code);
			$sheet->setCellValue('P'.$key, $row->error_description);
			$sheet->setCellValue('Q'.$key, $row->reason);
			$sheet->setCellValue('R'.$key, $row->entity);
			$sheet->setCellValue('S'.$key, $row->created_at);
					
			$key++;
		}

		$writer = new Xlsx($spreadsheet);
		$writer->save(DONATIONS_PATH.$filename);
		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename="'.basename(DONATIONS_PATH.$filename).'"');
		header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize(DONATIONS_PATH.$filename));
            flush(); // Flush system output buffer
            readfile(DONATIONS_PATH.$filename);
		die();
	}
}