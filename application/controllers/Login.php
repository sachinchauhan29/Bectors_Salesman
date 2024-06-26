<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Login extends CI_Controller
{





	function __construct()
	{

		parent::__construct();

		$this->load->helper(array('url'));

		$this->load->library(array('session'));
		$this->load->model('Dashboardmodel');

	}



	public function login()
	{


		$data = new stdClass();
		if (!$this->session->userdata('admin_user')) {

			$data = new stdClass();

			$this->load->helper('form');

			$this->load->library('form_validation');



			if ($this->input->post('login') != NULL) {



				$this->form_validation->set_rules('Mobile', 'Mobile', 'trim|required');

				$this->form_validation->set_rules('Password', 'Password', 'trim|required');

				$this->form_validation->set_rules('beat_name', 'beat_name', 'trim|required');

				if ($this->form_validation->run() === true) {

					$ckn = $this->db->get_where('login_detail', array('EmailID' => $this->input->post('Mobile'), 'status' => 1))->num_rows();

					if ($ckn > 0) {
						$datat = $this->db->select('id')->get_where('login_detail', array('EmailID' => $this->input->post('Mobile')))->row_array();


						/*  if ($this->input->post('Password')=='Dabur@123' && $this->input->post('Password')=='Dabur@123') { */
						if ($ckn) {

							$session_data =
								array(
									'id' => $datat['id'],
									'name' => '',
									'beatname' => $this->input->post('beat_name'),
								);
							$arr1 = array('MobileNo' => $this->input->post('Mobile'), 'Location' => $this->input->post('beat_name'));
							$this->db->insert('retailer_data', $arr1);
							$this->session->set_userdata('admin_user', $session_data);

							$this->session->set_flashdata('success', 'Your account login successfully');

							redirect(base_url() . 'welcome/highest');



						} else {

							redirect(base_url() . 'wrong');



						}
					} else {

						redirect(base_url() . 'wrong');



					}


				}

			}





			$this->load->view('head');
			$this->load->view('index', $data);
			$this->load->view('footer');

		} else {

			redirect(base_url() . 'welcome');

		}

	}

	public function wlogin()
	{


		$data = new stdClass();
		if (!$this->session->userdata('admin_user')) {

			$data = new stdClass();

			$this->load->helper('form');

			$this->load->library('form_validation');



			if ($this->input->post('login') != NULL) {

				//print_r($this->input->post());die;

				$this->form_validation->set_rules('Mobile', 'Mobile', 'trim|required');

				$this->form_validation->set_rules('Password', 'Password', 'trim|required');

				if ($this->form_validation->run() === true) {

					$ckn = $this->db->get_where('login_detail', array('Mobile' => $this->input->post('Mobile'), 'status' => 1))->num_rows();

					if ($ckn > 0) {
						$datat = $this->db->select('id')->get_where('login_detail', array('Mobile' => $this->input->post('Mobile')))->row_array();


						if ($this->input->post('Password') == 'Dabur@123' && $this->input->post('Password') == 'Dabur@123') {

							$session_data = array(

								'id' => $datat['id'],

								'name' => '',

							);

							$this->session->set_userdata('admin_user', $session_data);

							$this->session->set_flashdata('success', 'Your account login successfully');

							redirect(base_url() . 'welcome');



						} else {

							$data->message = array('mess' => 'Invalid email/password', 'class' => 'error');



						}
					} else {

						$data->message = array('mess' => 'Invalid email/password', 'class' => 'error');



					}


				}

			}





			$this->load->view('head');
			$this->load->view('windex', $data);
			$this->load->view('footer');

		} else {

			redirect(base_url() . 'welcome');

		}

	}

	public function test()
	{
		$comp = $_REQUEST['comp'];

		$data = $this->Dashboardmodel->getregion_by_ip($comp);
		foreach ($data as $sssdata) {
			/* echo "<option value=".$sssdata['beat_name'].">".$sssdata['beat_name']."</option>"; */

			echo '<option value="' . $sssdata['beat_name'] . '">' . $sssdata['beat_name'] . '</option>';

		}
	}

	public function logout()
	{

		if ($this->session->userdata('admin_user')) {

			$this->session->sess_destroy();

			redirect(base_url('login'));

		} else {

			$this->session->sess_destroy();

			redirect(base_url('login'));

		}

	}

}

