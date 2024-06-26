<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('admin_user')) {
			redirect(base_url() . 'login');
		}


		$this->load->library('image_lib');

	}
	public function index()
	{
		$rrcode = $this->session->userdata('rrcode');
		if ($rrcode) {
			$MobileNo = $this->session->userdata('MobileNo');
			$date = date("Y-m-d");

			$data['user_data'] = $this->db->get_where('scratch_code', array('number' => $MobileNo, 'active_date' => $date, 'flag' => 0))->result_array();

			// Check if $data['user_data'] is empty
			if (empty($data['user_data'])) {
				// Unset the specific session variable if no entries with flag 0
				$this->session->unset_userdata('rrcode');
				redirect(base_url('welcome'));
			}
			// Redirect to the specified URL
			redirect(base_url('welcome/scretch'));


		} else {
			$beat_name = ($this->session->userdata('admin_user')['beatname']) ? $this->session->userdata('admin_user')['beatname'] : '';
			//print_r($beat_name);die;
			$datarr = array();
			$datarr['otl'][5] = 0;

			$datar = $this->db->select('*')->get_where('retailer_data_map', array('s_id' => $this->session->userdata('admin_user')['id'], 'beat_name' => $beat_name))->result_array();
			//print_r($this->db->last_query());die;
			$i = 0;
			foreach ($datar as $list) {
				//echo"<pre>"; print_r($list);die; 
				$nm = $this->db->select('*')->get_where('retailer_data', array('s_id' => $list['s_id']))->num_rows();
				//$nm = $this->db->select('*')->get_where('retailer_data',array('MobileNo' => $list['MobileNo'],'date'=>date("Y-m-d")))->num_rows();
				if ($nm <= 0) {
					$datarr['otl'][$i] = $list;
				}
				$i++;

			}

			$this->load->view('head');
			$this->load->view('outlets', $datarr);
			$this->load->view('footer');
		}
	}



	public function update_num()
	{


		$datar = $this->db->select('*')->get_where('update_data_map')->result_array();

		foreach ($datar as $list) {

			$nm = $this->db->select('*')->get_where('retailer_data_map', array('RTRCompCode' => $list['RTRCompCode']))->row();
			// echo"<pre>";print_r($nm->Name);die;
			$data = array('Name' => $list['Name'], 'MobileNo' => $list['MobileNo']);
			//$this->db->set('last_login', 'current_login', false);
			$this->db->where('RTRCompCode', $nm->RTRCompCode);
			$this->db->update('retailer_data_map', $data);


		}

	}











	public function outlets()
	{
		/* print_r($this->session->userdata('admin_user'));die; */


		$datarr = array();
		$datarr['otl'][5] = 0;

		$datar = $this->db->select('*')->get_where('retailer_data_map', array('s_id' => $this->session->userdata('admin_user')['id']))->result_array();

		$i = 0;
		foreach ($datar as $list) {

			$nm = $this->db->select('*')->get_where('retailer_data', array('c_id' => $list['c_id']))->num_rows();
			//$nm = $this->db->select('*')->get_where('retailer_data',array('MobileNo' => $list['MobileNo'],'date'=>date("Y-m-d")))->num_rows();
			if ($nm <= 0) {
				$datarr['otl'][$i] = $list;
			}
			$i++;

		}

		$this->load->view('head');
		$this->load->view('outlets');
		$this->load->view('footer');

	}

	public function retaler($id)
	{
		$checkAll['ret'] = $this->db->select('*')->limit('1')->get_where('retailer_data_map', array('s_id' => $this->session->userdata('admin_user')['id'], 'id' => $id))->result_array();
		/*  print_r($checkAll);die;  */
		$this->load->view('head');
		$this->load->view('retaler', $checkAll);
		$this->load->view('footer');


	}

	public function scretchdetails()
	{
		$MobileNo = $this->session->userdata('MobileNo');
		$date = date("Y-m-d");

		$data['user'] = $this->db->get_where('scratch_code', array('number' => $MobileNo, 'active_date' => $date))->result();
		// echo '<pre>';
		// print_r($data);
		// die;

		$this->load->view('head');
		$this->load->view('scretchdetails', $data);
		$this->load->view('footer');
	}
	public function cardthanks()
	{
		$MobileNo = $this->session->userdata('rrcode');
		$date = date("Y-m-d");

		$data['user_data'] = $this->db->get_where('scratch_code', array('code' => $MobileNo, 'active_date' => $date))->result_array();
		// echo '<pre>';
		// print_r($data);
		// die;

		$this->load->view('head');
		$this->load->view('thankyou', $data);
		$this->load->view('footer');
	}
	public function highest()
	{
		$beat_name = ($this->session->userdata('admin_user')['beatname']) ? $this->session->userdata('admin_user')['beatname'] : '';
		$date = date("Y-m-d");

		$this->db->select('Name, sum(amount)  as total_amount');
		$this->db->from('scratch_code');
		$this->db->where('active_date', $date);
		$this->db->group_by('number,code');
		$this->db->order_by('total_amount', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 0) {
			redirect(base_url('welcome'));
			return;
		}

		$data['highest_user'] = $query->row_array();

		$this->load->view('head');
		$this->load->view('highest', $data);
		$this->load->view('footer');
	}


	// public function highest()
	// {
	// 	$beat_name = ($this->session->userdata('admin_user')['beatname']) ? $this->session->userdata('admin_user')['beatname'] : '';
	// 	$date = date("Y-m-d");

	// 	// Fetching the records grouped by Name and calculating the total amount for each user
	// 	$this->db->select('Name, SUM(amount) as total_amount');
	// 	$this->db->from('scratch_code');
	// 	//$this->db->where('Beatname', $beat_name);
	// 	$this->db->where('active_date', $date);
	// 	$this->db->group_by('Name');
	// 	$this->db->order_by('total_amount', 'DESC');
	// 	$this->db->limit(1);
	// 	$query = $this->db->get();

	// 	if ($query->num_rows() == 0) {
	// 		// No records found, redirect to welcome page
	// 		redirect(base_url('welcome'));
	// 		return;
	// 	}

	// 	$data['highest_user'] = $query->row_array();

	// 	// Loading views
	// 	$this->load->view('head');
	// 	$this->load->view('highest', $data);
	// 	$this->load->view('footer');
	// }

	public function scretch()
	{


		$MobileNo = $this->session->userdata('MobileNo');
		$date = date("Y-m-d");

		$data['user_data'] = $this->db->get_where('scratch_code', array('number' => $MobileNo, 'active_date' => $date, 'flag' => 0))->result_array();
		if (!empty($data['user_data'])) {
			$data['datauser'] = $this->db->get_where('scratch_code', array('number' => $MobileNo, 'active_date' => $date, 'status' => 0))->result();
			// echo '<pre>';
			// print_r($data);
			// die;

			$this->load->view('head');
			$this->load->view('crushcard', $data);
			$this->load->view('footer');
		} else {
			redirect(base_url('welcome/cardthanks'));
		}


	}

	public function scode()
	{
		$scode = $this->input->post('scode');

		$this->db->where('scode', $scode);
		$this->db->update('scratch_code', array('status' => 1));
		redirect(base_url('welcome/scretch'));
	}
	public function fleg()
	{
		$scodes = $this->input->post('scodes');

		if (is_array($scodes) && !empty($scodes)) {
			$this->db->where_in('scode', $scodes);
			$this->db->update('scratch_code', array('flag' => 1, 'status' => 1));
		}
		redirect(base_url('welcome/cardthanks'));
	}
	public function allcard()
	{
		$scodes = $this->input->post('scodes');

		if (is_array($scodes) && !empty($scodes)) {
			$this->db->where_in('scode', $scodes);
			$this->db->update('scratch_code', array('status' => 1));
		}
		redirect(base_url('welcome/scretch'));
	}
	public function thankyou()
	{
		$data = $this->input->post();
		// print_r($data);
		// die;
		$this->session->set_userdata('MobileNo', $data['MobileNo']);
		$nm = $this->db->select('*')->get_where('scratch_code')->num_rows();

		// Print the number of rows for debugging
		// print_r($nm);
		// die;
		$card = $data['Vanaspati'];
		if ($card >= 10) {
			$card = 10;
		} else {
			$card = $card;
		}


		$rrcode = rand(100000, 999999);
		$this->session->set_userdata('rrcode', $rrcode);
		// print_r($rrcode);
		// die;
		//$rrcode = '1234';
		$x = 1;
		while ($x <= $card) {

			$amountv = $nm + $x;
			//$amountv =10;
			$rs['amount'] = 10;
			$rs['amount'] = 10;

			if ($data['state'] == 'KARNATAKA' || $data['state'] == 'TAMIL NADU' || $data['state'] == 'KERALA') {
				$rs = $this->db->get_where('dice_grti', array('ids' => $amountv))->row_array();
			} elseif ($data['state'] == 'TELENGANA' || $data['state'] == 'PUDUCHERRY' || $data['state'] == 'ANDHRA PRADESH') {

				$rs = $this->db->get_where('dice_grti2', array('ids' => $amountv))->row_array();

			} else {
				$rs = $this->db->get_where('dice_grti', array('ids' => $amountv))->row_array();
			}
			// $rs = $this->db->get_where('dice_grti',array('ids'=>$amountv))->row_array(); 	
			//	print_r($rs);die;
			date_default_timezone_set("Asia/Kolkata");
			$time = date('H:i:s');
			$scode = rand(100000, 999999);
			if ($x == 1) {
				$rtmr = $data['Vanaspati'];
			} else {
				$rtmr = 0;
			}
			//$namount = $this->db->get_where('grati_table',array('ids'=>$scode,'status' => 0))->row_array();

			$arr1 = array('Name' => $data['Name'], 'code' => $rrcode, 'Market' => $data['state'], 'Beatname' => $data['beat_name'], 'number' => $data['MobileNo'], 'Vanaspati' => $rtmr, 'scode' => $scode, 'amount' => $rs['amount'], 'RTRcode' => $data['s_id'], 'active_date' => date("Y-m-d"), 'time' => $time);
			// print_r($arr1);
			// die;
			$this->db->insert('scratch_code', $arr1);
			$x++;
		}


		redirect(base_url('welcome/scretch'));






	}


	public function thankyou_close()
	{
		$data = $this->input->post();
		//print_r($data);die;
		$nm = $this->db->select('*')->get_where('scratch_code')->num_rows();

		$card = $data['Vanaspati'];
		$date = date("Y-m-d");
		$dt = date("Y-m-d");
		$dateseven = date("Y-m-d", strtotime("$dt -10 day"));

		$ck = $this->db->select('*')->get_where('scratch_code', array('number' => $data['MobileNo']))->num_rows();
		$dataty = $this->db->select('sum(Vanaspati) as qty')->get_where('scratch_code', array('number' => $data['MobileNo'], 'active_date' => date("Y-m-d")))->row();
		$weekqty = $this->db->select('sum(Vanaspati) as qty')->get_where('scratch_code', array('number' => $data['MobileNo'], 'active_date>' => $dateseven))->row();
		if ($data['state'] == 'Karnataka' || $data['state'] == 'Andhra Pradesh' || $data['state'] == 'KERALA' || $data['state'] == 'Tamil Nadu' || $data['state'] == 'Telangana') {


			if ($weekqty->qty <= 5) {
				$cc = 5;
				$rqty = $cc - ($dataty->qty + $card);

				if ($rqty >= 0) {

					if ($card >= 10) {
						$card = 10;
					} else {
						$card = $card;
					}


					$rrcode = rand(1000000000, 9999999999);

					$x = 1;
					while ($x <= $card) {

						$amountv = $nm + $x;
						//$amountv =10;
						$rs['amount'] = 10;
						$rs['amount'] = 10;

						if ($data['state'] == 'Hyderabad') {
							$rs = $this->db->get_where('dice_grti2', array('ids' => $amountv))->row_array();
						} else {
							$rs = $this->db->get_where('dice_grti', array('ids' => $amountv))->row_array();
						}
						// $rs = $this->db->get_where('dice_grti',array('ids'=>$amountv))->row_array(); 	
						//	print_r($rs);die;
						date_default_timezone_set("Asia/Kolkata");
						$time = date('H:i:s');
						$scode = rand(100000, 999999);
						if ($x == 1) {
							$rtmr = $data['Vanaspati'];
						} else {
							$rtmr = 0;
						}
						//$namount = $this->db->get_where('grati_table',array('ids'=>$scode,'status' => 0))->row_array();
						$arr1 = array('RTRcode' => $data['RTRCompCode'], 'Beatname' => $data['beat_name'], 'SLMname' => $data['s_id'], 'code' => $rrcode, 'Name' => $data['Name'], 'number' => $data['MobileNo'], 'Market' => $data['Market'], 'Vanaspati' => $rtmr, 'scode' => $scode, 'amount' => $rs['amount'], 'active_date' => date("Y-m-d"), 'time' => $time);
						$this->db->insert('scratch_code', $arr1);
						$x++;
					}
					$code = $rrcode;
					$ft['yk'] = $rrcode;
					$ft['nn'] = $data['MobileNo'];
					$nn = $data['MobileNo'];
					$link = "https://smartdecisionpoints.com/Adani_FS10_Schrech/?num=" . $code;
					$url = $link;
					$json = file_get_contents("https://cutt.ly/api/api.php?key=0e8f6498d34ed84008f398748285efc0b8931&short=$url");
					$data = json_decode($json, true);



					$msg2 = "Congratulation for your support with Adani Wilmar. Please click " . $data['url']['shortLink'] . " . to claim your scheme amount. Thanks Adani Wilmar";
					$this->sendMsg55($msg2, $nn, 1707166365699388035);
					$this->load->view('head');
					$this->load->view('thankyou', $ft);
					$this->load->view('footer');
				} else {
					$this->load->view('head');
					$this->load->view('limit');
					$this->load->view('footer');
				}
			} else {
				$this->load->view('head');
				$this->load->view('limit');
				$this->load->view('footer');
			}
		} else {
			if ($weekqty->qty <= 5) {
				$cc = 5;
				$rqty = $cc - ($dataty->qty + $card);

				if ($rqty >= 0) {

					if ($card >= 10) {
						$card = 10;
					} else {
						$card = $card;
					}


					$rrcode = rand(1000000000, 9999999999);

					$x = 1;
					while ($x <= $card) {

						$amountv = $nm + $x;
						//$amountv =10;
						$rs['amount'] = 10;
						$rs['amount'] = 10;

						if ($data['state'] == 'Hyderabad') {
							$rs = $this->db->get_where('dice_grti2', array('ids' => $amountv))->row_array();
						} else {
							$rs = $this->db->get_where('dice_grti', array('ids' => $amountv))->row_array();
						}
						// $rs = $this->db->get_where('dice_grti',array('ids'=>$amountv))->row_array(); 	
						//	print_r($rs);die;
						date_default_timezone_set("Asia/Kolkata");
						$time = date('H:i:s');
						$scode = rand(100000, 999999);
						if ($x == 1) {
							$rtmr = $data['Vanaspati'];
						} else {
							$rtmr = 0;
						}
						//$namount = $this->db->get_where('grati_table',array('ids'=>$scode,'status' => 0))->row_array();
						$arr1 = array('RTRcode' => $data['RTRCompCode'], 'Beatname' => $data['beat_name'], 'SLMname' => $data['s_id'], 'code' => $rrcode, 'Name' => $data['Name'], 'number' => $data['MobileNo'], 'Market' => $data['Market'], 'Vanaspati' => $rtmr, 'scode' => $scode, 'amount' => $rs['amount'], 'active_date' => date("Y-m-d"), 'time' => $time);
						$this->db->insert('scratch_code', $arr1);
						$x++;
					}
					$code = $rrcode;
					$ft['yk'] = $rrcode;
					$ft['nn'] = $data['MobileNo'];
					$nn = $data['MobileNo'];
					$link = "https://smartdecisionpoints.com/Adani_FS10_Schrech/?num=" . $code;
					$url = $link;
					$json = file_get_contents("https://cutt.ly/api/api.php?key=0e8f6498d34ed84008f398748285efc0b8931&short=$url");
					$data = json_decode($json, true);



					$msg2 = "Congratulation for your support with Adani Wilmar. Please click " . $data['url']['shortLink'] . " . to claim your scheme amount. Thanks Adani Wilmar";
					$this->sendMsg55($msg2, $nn, 1707166365699388035);
					$this->load->view('head');
					$this->load->view('thankyou', $ft);
					$this->load->view('footer');
				} else {
					$this->load->view('head');
					$this->load->view('limit');
					$this->load->view('footer');
				}
			} else {
				$this->load->view('head');
				$this->load->view('limit');
				$this->load->view('footer');
			}
		}
	}








	public function thankyoubb()
	{
		$data = $this->input->post();

		$nm = $this->db->select('*')->get_where('scratch_code')->num_rows();

		if ($data['Vanaspati'] == 1 && $data['Soya'] == 1) {
			$card = 2;
		} elseif ($data['Vanaspati'] >= 2 && $data['Soya'] = 1) {
			$card = 2;
		} elseif ($data['Vanaspati'] == 0 && $data['Soya'] >= 1) {
			$card = 1;
		} elseif ($data['Vanaspati'] >= 2 && $data['Soya'] >= 2) {
			$card = 4;
		} else {
			$card = 1;
		}

		$rrcode = rand(1000000000, 9999999999);

		$x = 1;
		while ($x <= $card) {
			$amountv = $nm + $x;
			//$amountv =10;
			$rs['amount'] = 10;
			$rs = $this->db->get_where('dice_grti', array('ids' => $amountv))->row_array();


			$scode = rand(100000, 999999);
			//$namount = $this->db->get_where('grati_table',array('ids'=>$scode,'status' => 0))->row_array();
			$arr1 = array('code' => $rrcode, 'Name' => $data['Name'], 'number' => $data['MobileNo'], 'Market' => $data['Market'], 'Vanaspati' => $data['Vanaspati'], 'Soya' => $data['Soya'], 'scode' => $scode, 'amount' => $rs['amount']);
			$this->db->insert('scratch_code', $arr1);
			$x++;
		}
		$code = $rrcode;
		$nn = $data['MobileNo'];
		$link = "http://pvcampaign.com/schrechCard/?num=" . $code;
		$url = $link;
		$json = file_get_contents("https://cutt.ly/api/api.php?key=0e8f6498d34ed84008f398748285efc0b8931&short=$url");
		$data = json_decode($json, true);


		$msg2 = "अभिनंदन! अदानी विल्मर स्कीम में आगे भाग लेने के लिए " . $data['url']['shortLink'] . " . लिंक पे क्लिक करे ।आप हमारे साथ जुड़े रहे एवम प्रोग्राम में आगे भी भाग लेते रहे। Crazibrainsolutions";
		$this->sendMsg5($msg2, $nn, 1707166313165422767);
		$this->load->view('head');
		$this->load->view('thankyou');
		$this->load->view('footer');


	}
	public function resend($code)
	{
		$gt = $this->db->select('*')->order_by('id', "desc")->where('code', $code)->limit(1)->get('scratch_code')->row_array();

		//print_r($gt['number']);die;
		$link = "http://pvcampaign.com/schrechCard/?num=" . $code;
		$link = "https://smartdecisionpoints.com/Adani_FS10_Schrech/?num=" . $code;
		$url = $link;
		$json = file_get_contents("https://cutt.ly/api/api.php?key=0e8f6498d34ed84008f398748285efc0b8931&short=$url");
		$data = json_decode($json, true);


		$msg2 = "अभिनंदन! अदानी विल्मर स्कीम में आगे भाग लेने के लिए " . $data['url']['shortLink'] . " . लिंक पे क्लिक करे ।आप हमारे साथ जुड़े रहे एवम प्रोग्राम में आगे भी भाग लेते रहे। Crazibrainsolutions";
		$this->sendMsg5($msg2, $gt['number'], 1707166313165422767);

		$ft['yk'] = $code;
		$ft['nn'] = $gt['number'];
		$this->load->view('head');
		$this->load->view('thankyou', $ft);
		$this->load->view('footer');
	}

	public function ivrcall($code)
	{
		$gt = $this->db->select('*')->order_by('id', "desc")->where('code', $code)->limit(1)->get('scratch_code')->row_array();

		print_r($gt['number']);
		die;
		$link = "http://pvcampaign.com/schrechCard/?num=" . $code;
		$link = "http://137.59.52.163/Robocalling/CallVARIFICATION.php?username=verificationpuzzle@beyondmsolution.com&password=1234@1234&mobile=9818656830" . $code;
		$url = $link;
		$json = file_get_contents("$url");
		$data = json_decode($json, true);


		$msg2 = "अभिनंदन! अदानी विल्मर स्कीम में आगे भाग लेने के लिए " . $data['url']['shortLink'] . " . लिंक पे क्लिक करे ।आप हमारे साथ जुड़े रहे एवम प्रोग्राम में आगे भी भाग लेते रहे। Crazibrainsolutions";
		$this->sendMsg5($msg2, $gt['number'], 1707166313165422767);

		$ft['yk'] = $code;
		$ft['nn'] = $gt['number'];
		$this->load->view('head');
		$this->load->view('thankyou', $ft);
		$this->load->view('footer');
	}
	public function check_recharge_stautus()
	{
		$num = $this->db->select('txnid')->get_where('schech_paytm_detail', array('check_pytm' => 0, 'type' => 'paytm'))->result_array();
		//print_r($num);die;
		if ($num) {
			foreach ($num as $n) {
				$pstatus = $this->rechargeStatusCheck($n['txnid']);
				$arr = array('win_status' => $pstatus, 'check_pytm' => 1);
				$this->db->where('txnid', $n['txnid']);
				$this->db->update('schech_paytm_detail', $arr);
			}
		}
	}
	public function rechargeStatusCheck($id)
	{

		//$extnid = "Xnu5FSmZLftkP6u6kWwFj774ejugmgrbQPyruUm3SCE8jByF"; 
		//$extnid = "qYnCWV78S3sqYqcpmhWLYc57yYUcuMEP4zH3UpQVrnVB2YJq"; 
		$apisecret = "MZq3ZtK2DUf97vwnGzP7RPuz5mmHznN4NmndxMLBU9KeXtgd";
		$extnid = "uJtNnkygsuSFMDBLwNCeSaFyg4Vzw8heXgHhLNN8Gq3QyXrF";

		$url = "https://api.komparify.com/api/v2/status/" . $extnid . "/" . $id;
		$curl = curl_init();
		curl_setopt_array(
			$curl,
			array(
				CURLOPT_URL => $url,
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 10,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "GET",
				CURLOPT_SSL_VERIFYPEER => false,
				CURLOPT_HTTPHEADER => array(
					"cache-control: no-cache",
					"postman-token: 54e51a0d-8350-71e9-bb66-ec853284bc8b"
				),
			)
		);
		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			// print_r($response);die;			

			$result = $this->db->select('status')->get_where('recharge_status', array('id' => json_decode($response)->status))->row_array();
			if ($result) {
				return $result['status'];
			} else {
				return "Transaction does not exist";
			}

		}
	}
	private function sendMsg5($msg, $to, $temp)
	{
		if ($to !== '' && $msg != "") {
			$msg = urlencode($msg);
			$url = "http://smsbox.in/SecureApi.aspx?usr=Beyondmsolution&key=97D0CD38-1AA1-4227-8E33-4393EF7B4CCB&smstype=Unicode&to=" . $to . "&msg=" . $msg . "&rout=Transactional&from=CRZIBN&templateid=" . $temp;
			//$url = "http://panel.smsmessenger.in/api/mt/SendSMS?user=Crazibrain&password=Crazibrain&senderid=CRZIBN&channel=Trans&DCS=0&flashsms=0&number=".$to."&text=".$msg."&route=6&peid=1701158029163440045";
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$curl_scraped_page = curl_exec($ch);
			curl_close($ch);
			$data['message'] = 'Successfully sent';
			return $data;
		} else {
			$data['message'] = 'Mobile no or message could not blank.';
			return $data;
		}
	}
	private function sendMsg55($msg, $to, $temp)
	{
		if ($to !== '' && $msg != "") {
			$msg = urlencode($msg);
			/* $url = "http://msg.cellapps.com/API/WebSMS/Http/v1.0a/index.php?username=awlsms&password=awlsms&sender=AWLSMS&to=".$to."&message=".$msg."&reqid=1&format=text&route_id=422&Template_ID=".$temp."&PE_ID=1701158089950099406"; */

			$url = "http://web.shreesms.net/API/SendSMS.aspx?APIkey=RGHtRTudW4YcmB7hlR4MpotkWG&SenderID=AWLSMS&SMSType=2&Mobile=" . $to . "&MsgText=" . $msg . "&Unicode=1&EntityID=1701158089950099406&TemplateID=" . $temp;
			//$url = "http://panel.smsmessenger.in/api/mt/SendSMS?user=Crazibrain&password=Crazibrain&senderid=CRZIBN&channel=Trans&DCS=0&flashsms=0&number=".$to."&text=".$msg."&route=6&peid=1701158029163440045";
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$curl_scraped_page = curl_exec($ch);
			curl_close($ch);
			$data['message'] = 'Successfully sent';
			return $data;
		} else {
			$data['message'] = 'Mobile no or message could not blank.';
			return $data;
		}
	}
	private function ivrcallgen($msg, $to, $temp)
	{
		if ($to !== '' && $msg != "") {
			$msg = urlencode($msg);
			/* $url = "http://msg.cellapps.com/API/WebSMS/Http/v1.0a/index.php?username=awlsms&password=awlsms&sender=AWLSMS&to=".$to."&message=".$msg."&reqid=1&format=text&route_id=422&Template_ID=".$temp."&PE_ID=1701158089950099406"; */

			$url = "http://web.shreesms.net/API/SendSMS.aspx?APIkey=RGHtRTudW4YcmB7hlR4MpotkWG&SenderID=AWLSMS&SMSType=2&Mobile=" . $to . "&MsgText=" . $msg . "&Unicode=1&EntityID=1701158089950099406&TemplateID=" . $temp;
			//$url = "http://panel.smsmessenger.in/api/mt/SendSMS?user=Crazibrain&password=Crazibrain&senderid=CRZIBN&channel=Trans&DCS=0&flashsms=0&number=".$to."&text=".$msg."&route=6&peid=1701158029163440045";
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$curl_scraped_page = curl_exec($ch);
			curl_close($ch);
			$data['message'] = 'Successfully sent';
			return $data;
		} else {
			$data['message'] = 'Mobile no or message could not blank.';
			return $data;
		}
	}

}
