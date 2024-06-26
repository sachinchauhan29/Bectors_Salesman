<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	 public function __construct() {
        parent::__construct();
		
		
		$this->load->library('image_lib');
		
    }
	public function index()
	{
		$data= $this->input->get();
		//print_r($data);die;
	 
	 
	     $raary = array('Name' => $data['Name'],'MobileNo' => $data['RetailerMobileNo'],'Location'=>$data['Location'],'date'=>date("Y-m-d"),'time'=>date('H:i:s'),'type'=>4,'StockistCode'=>$data['StockistCode'],'RTRCompCode'=>$data['RTRCompCode']);
			$this->db->insert('retailer_data_demo',$raary);
			
		$datarr=array();
		$datarr['otl'][5]=0;
   
           $datar = $this->db->select('*')->get_where('retailer_data_demo')->result_array();
		
	$i=0;foreach($datar as $list)
	{

		$nm = $this->db->select('*')->get_where('retailer_data_demo')->num_rows();
		//$nm = $this->db->select('*')->get_where('retailer_data',array('MobileNo' => $list['MobileNo'],'date'=>date("Y-m-d")))->num_rows();
		if($nm>=0)
		{
		   $datarr['otl'][$i]=$list;
		}
		$i++;
		
	}
			
		 $this->load->view('head');
           $this->load->view('outlets',$datarr);	
		   $this->load->view('footer');  
		
		
	}
	
	
	public function newret()
	{
		
		   $this->load->view('head');
         
		$this->load->view('nretaler');
		$this->load->view('footer');
	}

	public function eligiable()
	{
		
		   $this->load->view('head');
         
		$this->load->view('eligiable');
		$this->load->view('footer');
	}

	public function games()
	{
		
		   $this->load->view('head');
         
		$this->load->view('games');
		$this->load->view('footer');
	}


	public function outlets()
	{
		// $data['otl'] = $this->db->select('*')->limit('15')->order_by('id','desc')->get_where('retailer_data_map',array('id' => $id))->row();
     
      //  echo "";die;
     //  print_r($data);die;
     //  print_r($this->db->last_query());die;
		$this->load->view('head');
              $this->load->view('outlets',$data);
		//$this->load->view('outlets');
		$this->load->view('footer');
     
	}
	// public function re_retaler()
	// {
	// 	$checkAll['ret'] = $this->db->select('*')->limit('1')->get_where('retailer_data',array('s_id' => $this->session->userdata('admin_user')['id'],'RTRCompCode =' =>NULL))->result_array();
	// 	//echo"<pre>";print_r($checkAll);die;
	// 	$this->load->view('head');
	// 	$this->load->view('retalerl',$checkAll);
	// 	$this->load->view('footer');
	// }
	
	// public function ggame()
	// {
	// 		$datat['gift'] = ($this->session->userdata('retailer')['gift'])?$this->session->userdata('retailer')['gift']:5;
	// 		$this->load->view('game2/dice/index',$datat);
			

	// }
	
	public function spin()
	{
			$data= $this->input->get();
			//print_r($data);die;
				$check = $this->db->select('*')->get_where('retailer_data',array('MobileNo' =>$data['MobileNo']))->num_rows();
				if($check>=0){
				//print_r($check);die;
			$s_id = ($this->session->userdata('admin_user')['id'])?$this->session->userdata('admin_user')['id']:0;
			//print_r($s_id);
              
			         $countretailer =$this->db->get_where('retailer_data',array('s_id' => $s_id,'type'=>4))->num_rows(); 
			        $countretailer =$countretailer+1;
					$amdata =$this->db->get_where('dice_grti',array('ids' => $countretailer))->row(); 
					//print_r($countretailer);die; 
					if($amdata->amount>=1){$data['gift'] = $amdata->amount;}else{$data['gift'] =1;}
					// print_r($data);
					
			  
			  	$sess_array = array('rnumber' =>$this->input->post('MobileNo'),'gift' =>$data['gift'],'Name' => $data['Name'],'MobileNo' => $data['MobileNo'],'Location'=>$data['Location'],'date'=>date("Y-m-d"),'time'=>date('H:i:s'),'type'=>4,'StockistCode'=>$data['StockistCode'],'RTRCompCode'=>$data['RTRCompCode'],'c_id'=>$this->input->post('c_id'));
			$this->session->set_userdata('retailer',$sess_array);
			  
			  
			  
			  
		

			$raary = array('s_id'=>$s_id,'Name' => $data['Name'],'MobileNo' => $data['MobileNo'],'Location'=>$data['Location'],'date'=>date("Y-m-d"),'time'=>date('H:i:s'),'type'=>4,'StockistCode'=>$data['StockistCode'],'RTRCompCode'=>$data['RTRCompCode'],'c_id'=>$this->input->post('c_id'));
			$this->db->insert('retailer_data',$raary);
			
			$datat['gift'] = ($this->session->userdata('retailer')['gift'])?$this->session->userdata('retailer')['gift']:0;
			//redirect(base_url().'game/dice/index.html');

			/* $this->load->view('head');
			$this->load->view('trail'); */
			
			$this->load->view('game2/dice/index',$datat);
				}
				else
				{
					$this->load->view('head');
		$this->load->view('allreadyretaler');
		$this->load->view('footer');	
				}

	}
	public function spinagain()
	{
		$data= $this->session->userdata('retailer');
           $s_id = ($this->session->userdata('admin_user')['id'])?$this->session->userdata('admin_user')['id']:0;
              
			         $countretailer =$this->db->get_where('retailer_data',array('s_id' => $s_id,'type'=>4))->num_rows(); 
			        $countretailer =$countretailer+1;
					$amdata =$this->db->get_where('dice_grti',array('ids' => $countretailer))->row(); 
					//print_r($countretailer);die; 
					if($amdata->amount>=1){$data['gift'] = $amdata->amount;}else{$data['gift'] =1;}
					$sess_array = array('rnumber' =>$data['rnumber'],'gift' =>$data['gift'],'Name' => $data['Name'],'MobileNo' => $data['MobileNo'],'Location'=>$data['Location'],'date'=>date("Y-m-d"),'time'=>date('H:i:s'),'type'=>4,'StockistCode'=>$data['StockistCode'],'RTRCompCode'=>$data['RTRCompCode']);
			$this->session->set_userdata('retailer',$sess_array);
					

			$this->load->view('head');
			$this->load->view('trail');
		

	}
	public function trail()
	{
	
			$data= $this->session->userdata('retailer');
			//echo"<pre>";print_r($data);die;
			$s_id = ($this->session->userdata('admin_user')['id'])?$this->session->userdata('admin_user')['id']:0;

			$raary = array('s_id'=>$s_id,'Name' => $data['Name'],'MobileNo' => $data['MobileNo'],'Location'=>$data['Location'],'date'=>date("Y-m-d"),'time'=>date('H:i:s'),'type'=>4,'StockistCode'=>$data['StockistCode'],'purchase'=>1,'RTRCompCode'=>$data['RTRCompCode']);
			$this->db->insert('retailer_data',$raary);
			$datat['gift'] = ($this->session->userdata('retailer')['gift'])?$this->session->userdata('retailer')['gift']:0;
		//echo"<pre>";print_r($datat);die;
		$this->load->view('game2/dice/index',$datat);
		

	}
		public function finalp()
	{
	
			$data= $this->session->userdata('retailer');
			//echo"<pre>";print_r($ses_data);die;
			$s_id = ($this->session->userdata('admin_user')['id'])?$this->session->userdata('admin_user')['id']:0;

			$raary = array('s_id'=>$s_id,'Name' => $data['Name'],'MobileNo' => $data['MobileNo'],'Location'=>$data['Location'],'date'=>date("Y-m-d"),'time'=>date('H:i:s'),'type'=>4,'StockistCode'=>$data['StockistCode'],'purchase'=>2,'RTRCompCode'=>$data['RTRCompCode']);
			$this->db->insert('retailer_data',$raary);
			$datat['gift'] = ($this->session->userdata('retailer')['gift'])?$this->session->userdata('retailer')['gift']:0;
			$this->load->view('game/dice/index',$datat);
		
		

	}
	public function spinupadte()
	{
		$data= $this->input->post();
		
		//print_r($data);die;
	$s_id = ($this->session->userdata('admin_user')['id'])?$this->session->userdata('admin_user')['id']:0;
		   
		              $sess_array = array('rnumber' =>$this->input->post('MobileNo'));
					$this->session->set_userdata('retailer',$sess_array);
		
		 $raary = array('StockistCode'=>$data['StockistCode'],'RTRCompCode'=>$data['RTRCompCode']);
		$this->db->where('id',$data['hid']);
		
		$this->db->update('retailer_data',$raary);
		//print_r($this->db->last_query());die;
		redirect(base_url().'welcome/re_retaler');
		//$this->load->view('game/spin/spin.html');

	}
	
	
	public function logout() {      
        $this->session->sess_destroy();
        $this->data['user'] = '';
        redirect('login');
    }
	
	
	
	
	
	
		public function spin2()
	{
		/* $data= $this->input->post();
	$s_id = ($this->session->userdata('admin_user')['id'])?$this->session->userdata('admin_user')['id']:0;
		   
		              $sess_array = array('rnumber' =>$this->input->post('MobileNo'));
					$this->session->set_userdata('retailer',$sess_array);
		
		 $raary = array('Name' => $data['Name'],'MobileNo' => $data['MobileNo'],'Location'=>$data['Location'],'date'=>date('y-m-d'),'time'=>date('H:i:s'));
		$this->db->insert('retailer_data',$raary); */
		
		$this->load->view('game/spin/spin');

	}
	public function giftpay()
	{
		
		$sid= $this->input->post('sid');
          $s_id = ($this->session->userdata('admin_user')['id'])?$this->session->userdata('admin_user')['id']:0;
          $rnumber = ($this->session->userdata('retailer')['rnumber'])?$this->session->userdata('retailer')['rnumber']:0;
		
		
		
		
		
		
		$rrid = $this->db->select('id')->order_by('id','DESC')->limit('1')->get_where('retailer_data',array('s_id' => $this->session->userdata('admin_user')['id'],'MobileNo' =>$rnumber))->row();
		//print_r($rrid->id);die;
		$sid= $this->input->post('sid');

		if($rrid){$id=$rrid->id;}else{$id=1;}
		
		 $gfit = array('gift' => $sid);
		 
		
		   $this->db->where('id', $id);
          $this->db->update('retailer_data', $gfit);
		
		
		
		
		
		
		
		
		
		
		
		
		
		
	/* 	 $gfit = array('gift' => $sid);
		 
		
		   $this->db->where('MobileNo', $rnumber);
          $this->db->update('retailer_data', $gfit); */
		/* redirect(base_url().'game/spin/spin.html');
		//$this->load->view('game/spin/spin.html'); */

	}
	
}
