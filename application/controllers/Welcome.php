<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {


	/****
	1) WEBSITE CODE STARTS
	*****/

	// load website homepage
	public function index()
	{
		$data['products'] = $this->Seller_model->get_categorized_data("tbl_products","*",array("pro_status"=>1));
		$this->load->view('home',$data);
	}

	// load vendor register page
	public function vendor_register()
	{
		$this->load->view('vendor_register');
	}

	// load user register page
	public function user_register()
	{
		$this->load->view('user_register');
	}

	// user register action
	public function user_register_action()
	{
		$this->form_validation->set_rules('user_name','User name','required');
		$this->form_validation->set_rules('user_email','User email','required|valid_email|is_unique[tbl_users.user_email]');
		$this->form_validation->set_rules('user_password','Password','required|min_length[8]');
		$this->form_validation->set_rules('user_cpassword','Confirm Password','required|matches[user_password]|min_length[8]');

		if($this->form_validation->run()==TRUE)
		{
			unset($_REQUEST['user_cpassword']);
			$this->_salt="12345abcabc54321";
			$data['user_name'] = $_REQUEST['user_name'];
			$data['user_email'] = $_REQUEST['user_email'];
			$data['user_password']=sha1($this->_salt.$_REQUEST['user_password']);

			$res = $this->Seller_model->insert_data('tbl_users',$data);
			$this->session->set_flashdata('u_reg_success_msg', 'User registered successfully!!!');
			header('Location:'.base_url('welcome/user_register'));
		}
		else
		{
			$this->user_register();
		}
	}

	// user login action
	public function user_login_action(){
		$this->form_validation->set_rules('user_login_email','User Email','required');
		$this->form_validation->set_rules('user_login_password','User Password','required|min_length[8]');
		if($this->form_validation->run()==TRUE)
		{
			$this->_salt="12345abcabc54321";
			$login_data['user_email'] = $_REQUEST['user_login_email'];
			$login_data['user_password']=sha1($this->_salt.$_REQUEST['user_login_password']);

			$user_data = $this->Seller_model->get_data("tbl_users","user_email",$login_data['user_email']);
			if(isset($user_data) && !empty($user_data)){
				if($user_data->user_password==$login_data['user_password'] && $user_data->user_email==$login_data['user_email']){

					$_SESSION['user_email'] = $user_data->user_email;
					$_SESSION['name'] = $user_data->user_name;
					$_SESSION['login_as'] = 'user';
					$_SESSION['user_id'] = $user_data->user_id;
					header('Location:'.base_url('welcome'));
				}
				else{
					$this->session->set_flashdata('u_login_err_msg', 'Email or Password Incorrect');
					header('Location:'.base_url('welcome/user_register'));
				}	
			}
			else{
				$this->session->set_flashdata('u_login_err_msg', 'User not found');
				header('Location:'.base_url('welcome/user_register'));
			}
		}
		else
		{
			$this->user_register();
		}
	}

	//user logout & load user home page
	public function user_logout()
	{
		session_destroy();
		header('Location:'.base_url('welcome/index'));
	}

	// load user bookings page
	public function user_bookings()
	{
		$data = array();
		if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
			$data['bookings'] = $this->Seller_model->get_user_bookings($_SESSION['user_id']);
		}
		$this->load->view('user_bookings',$data);
	}

	// load vendor bookings page
	public function vendor_bookings()
	{
		$data = array();
		if(isset($_SESSION['vendor_id']) && !empty($_SESSION['vendor_id'])){
			$data['bookings'] = $this->Seller_model->get_vendor_bookings($_SESSION['vendor_id']);
		}
		$this->load->view('vendor/bookings',$data);
	}

	// load product details page
	public function product_details($product_id)
	{	
		$data['single_product'] = $this->Seller_model->get_data("tbl_products","pro_id",$product_id);
		$this->load->view('product_details',$data);
	}

	// load book product page
	public function book_product($product_id){
		$this->form_validation->set_rules('book_from_date','From date','required');
		$this->form_validation->set_rules('book_to_date','To date','required');
		$this->form_validation->set_rules('book_upi_id','UPI ID','required');
		if($this->form_validation->run()==TRUE){
			$data = $_POST;
			if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
				$data['book_usr_id'] = $_SESSION['user_id'];
				$data['book_pro_id'] = $product_id;
				$res = $this->Seller_model->insert_data('tbl_bookings',$data);
				// Email to User
				$single_product = $this->Seller_model->get_data("tbl_products","pro_id",$product_id);
				$email_data = array();
				$email_data['booking_data'] =  $_POST;
				$email_data['booking_event_data'] =  $single_product;
				$email_body = $this->load->view('emails/booking_success',$email_data,TRUE);
				$this->load->library('email');
				$this->email->from('globalcapri201@gmail.com', 'Event Management');
				$this->email->to($_SESSION['user_email']);
				$this->email->cc('rohitmahadik649@gmail.com');
				$this->email->subject('Event Booking Successfully');
				$this->email->message($email_body);
				$this->email->set_mailtype('html');
				$this->email->send();
				
				$this->session->set_flashdata('u_book_success_msg', 'Booking successfully!!!');


				header('Location:'.base_url('welcome/product_details/'.$product_id));
			}
			else{
				$this->session->set_flashdata('u_book_loginfirst_msg', 'Please login first');
				header('Location:'.base_url('welcome/product_details/'.$product_id));
			}
		}
		else{
			$this->product_details($product_id);
		}

	}

	// vendor register action
	public function vendor_register_action()
	{
		$this->form_validation->set_rules('vendor_name','Vendor name','required');
		$this->form_validation->set_rules('vendor_address','Vendor address','required');
		$this->form_validation->set_rules('vendor_description','Vendor description','required');
		$this->form_validation->set_rules('vendor_email','Vendor email','required|valid_email|is_unique[tbl_vendor.vendor_email]');

		$this->form_validation->set_rules('vendor_password','Password','required|min_length[8]');
		$this->form_validation->set_rules('vendor_cpassword','Confirm Password','required|matches[vendor_password]|min_length[8]');

		if($this->form_validation->run()==TRUE)
		{
			unset($_REQUEST['vendor_cpassword']);
			$this->_salt="12345abcabc54321";
			$data['vendor_name'] = $_REQUEST['vendor_name'];
			$data['vendor_address'] = $_REQUEST['vendor_address'];
			$data['vendor_description'] = $_REQUEST['vendor_description'];
			$data['vendor_email'] = $_REQUEST['vendor_email'];
			$data['vendor_password']=sha1($this->_salt.$_REQUEST['vendor_password']);

			$res = $this->Seller_model->insert_data('tbl_vendor',$data);
			$this->session->set_flashdata('v_reg_success_msg', 'Vendor registered successfully!!!');
			header('Location:'.base_url('welcome/vendor_register'));
		}
		else
		{
			$this->vendor_register();
		}
	}

	// vendor login action
	public function vendor_login_action(){
		$this->form_validation->set_rules('vendor_email','Vendor Email','required');
		$this->form_validation->set_rules('vendor_password','Vendor Password','required|min_length[8]');
		if($this->form_validation->run()==TRUE)
		{
			$this->_salt="12345abcabc54321";
			$login_data['vendor_email'] = $_REQUEST['vendor_email'];
			$login_data['vendor_password']=sha1($this->_salt.$_REQUEST['vendor_password']);

			$vendor_data = $this->Seller_model->get_data("tbl_vendor","vendor_email",$login_data['vendor_email']);
			if(isset($vendor_data) && !empty($vendor_data)){
				if($vendor_data->vendor_password==$login_data['vendor_password'] && $vendor_data->vendor_email==$login_data['vendor_email']){
					// check if vendor is activated by admin or not
					if($vendor_data->vendor_status=='1'){
						$_SESSION['vendor_email'] = $vendor_data->vendor_email;
						$_SESSION['name'] = $vendor_data->vendor_name;
						$_SESSION['login_as'] = 'vendor';
						$_SESSION['vendor_id'] = $vendor_data->vendor_id;
						header('Location:'.base_url('welcome/vendor_products'));
					}
					else{
						$this->session->set_flashdata('v_login_err_msg', 'Vendor is not activated yet by admin');
						header('Location:'.base_url('welcome/vendor_register'));
					}

				}
				else{
					$this->session->set_flashdata('v_login_err_msg', 'Email or Password Incorrect');
					header('Location:'.base_url('welcome/vendor_register'));
				}	
			}
			else{
				$this->session->set_flashdata('v_login_err_msg', 'User not found');
				header('Location:'.base_url('welcome/vendor_register'));
			}


			
		}
		else
		{
			$this->vendor_register();
		}
	}

	// load vendor dashboard page
	public function vendor_dashboard()
	{
		$this->load->view('vendor/dashboard');
	}

	// load vendor products page
	public function vendor_products()
	{
		$data = array();
		if(isset($_SESSION['vendor_id']) && !empty($_SESSION['vendor_id'])){
			$data['products'] = $this->Seller_model->get_categorized_data("tbl_products","*",array("pro_vendor_id"=>$_SESSION['vendor_id']));
		}
		$this->load->view('vendor/products',$data);
	}

	// add product action by vendor
	public function add_product(){

		if(isset($_POST['pro_vendor_id']) && !empty($_POST['pro_vendor_id'])){
			$data = $_POST;
			// upload product image
			$target_dir = "upload/products/";
			$target_file = $target_dir . basename($_FILES["pro_image"]["name"]);
			if (move_uploaded_file($_FILES["pro_image"]["tmp_name"], $target_file))
			{
				$data['pro_image'] = $_FILES["pro_image"]["name"];
				// instert product data to db
				$this->Seller_model->insert_data("tbl_products",$data);
				$this->session->set_flashdata('pro_success_msg', 'Event added successfully!!!');
		  	}
		  	else
		  	{
				$this->session->set_flashdata('pro_image_err_msg', 'Sorry, there was a problem while uploading your event image.');
		  	}
		}
		else{
			$this->session->set_flashdata('pro_went_wrong_msg', 'Something went wrong. Please try again');	
		}
		header('Location:'.base_url('welcome/vendor_products'));
	}

	// load edit product page by vendor
	public function edit_product($product_id){
		$data['single_product'] = $this->Seller_model->get_data("tbl_products","pro_id",$product_id);
		$this->load->view('vendor/product_edit',$data);
	}

	// to delete product
	public function delete_product($product_id){
		$this->Seller_model->delete_single_record("tbl_products",'pro_id',$product_id);
		if($_SESSION['login_as']=='admin'){
			header('Location:'.base_url('welcome/products_list'));
		}
		else{
			header('Location:'.base_url('welcome/vendor_products'));
		}
	}

	// edit product action by vendor
	public function edit_product_action($product_id){

		if(isset($product_id) && !empty($product_id)){
			$data = $_POST;
			if(isset($_FILES["pro_image"]["name"]) && !empty($_FILES["pro_image"]["name"])){
				// upload product image
				$target_dir = "upload/products/";
				$target_file = $target_dir . basename($_FILES["pro_image"]["name"]);
				if (move_uploaded_file($_FILES["pro_image"]["tmp_name"], $target_file))
				{
					$data['pro_image'] = $_FILES["pro_image"]["name"];
			  	}
			  	else
			  	{
					$this->session->set_flashdata('pro_image_err_msg', 'Sorry, there was a problem while updating your event image.');
			  	}
			}
			// instert product data to db
			$this->Seller_model->update_single_record("tbl_products","pro_id",$product_id,$data);
			$this->session->set_flashdata('pro_success_msg', 'Event updated successfully!!!');
		}
		else{
			$this->session->set_flashdata('pro_went_wrong_msg', 'Something went wrong. Please try again');	
		}
		header('Location:'.base_url('welcome/edit_product/').$product_id);
	}

	// load vendor login page
	public function vendor_login()
	{
		$this->vendor_register();
	}

	//vendor logout & load vendor login page
	public function vendor_logout()
	{
		session_destroy();
		$this->load->view('vendor/logout');
	}

	/****
	---WEBSITE CODE ENDS
	*****/


	/****
	2) BACKEND CODE STARTS
	*****/

	// load admin login page
	public function admin_login()
	{
		$this->load->view('admin/login');
	}

	// load admin login action
	public function admin_login_action()
	{
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('password','Password','required|min_length[8]');

		if($this->form_validation->run()==TRUE)
		{
			$login_data['email'] = $_REQUEST['email'];
			$login_data['password']=$_REQUEST['password'];

			$admin_data = $this->Seller_model->get_data("tbladmin","admin_email",$login_data['email']);
			if(isset($admin_data) && !empty($admin_data)){
				if($admin_data->admin_password==$login_data['password'] && $admin_data->admin_email==$login_data['email']){
					$_SESSION['email'] = $admin_data->admin_email;
					$_SESSION['name'] = $admin_data->admin_name;
					$_SESSION['login_as'] = 'admin';
					$_SESSION['admin_id'] = $admin_data->admin_id;
					header('Location:'.base_url('welcome/vendors_list'));
				}
				else{
					$err_msg = "Username or Password Incorrect";
					$this->load->view('admin/login',compact("err_msg"));
				}
			}
			else{
				$err_msg = "User not found";
				$this->load->view('admin/login',compact("err_msg"));
			}
			
		}
		else
		{
			$this->admin_login();
		}
	}

	// load admin dashboard page
	public function admin_dashboard()
	{
		$this->load->view('admin/dashboard');
	}

	//admin logout & load admin login page
	public function admin_logout()
	{
		session_destroy();
		$this->load->view('admin/logout');
	}

	// load vendors list page
	public function vendors_list()
	{
		$data['vendors'] = $this->Seller_model->get_all_data("tbl_vendor","*");
		$this->load->view('admin/vendors_list',$data);
	}

	// to change vendor status(active/inactive) - AJAX function
	public function change_vendor_status(){
		if(isset($_POST['vendor_status']) && isset($_POST['vendor_id'])){
			$update_data['vendor_status'] = $_POST['vendor_status'];
			$this->Seller_model->update_single_record("tbl_vendor","vendor_id",$_POST['vendor_id'],$update_data);
		}
	}

	// to delete vendor
	public function vendor_delete($vendor_id){
		$this->Seller_model->delete_single_record("tbl_vendor",'vendor_id',$vendor_id);
		header('Location:'.base_url('welcome/vendors_list'));
	}

	// load vendor products page
	public function products_list()
	{
		$data['products'] = $this->Seller_model->get_all_data("tbl_products","*");
		$this->load->view('admin/products_list',$data);
	}

	// load bookings list page
	public function booking_list()
	{
		$data = array();
		$data['bookings'] = $this->Seller_model->get_all_bookings();
		$this->load->view('admin/booking_list',$data);;
	}

	// to change product status(active/inactive) - AJAX function
	public function change_product_status(){
		if(isset($_POST['pro_status']) && isset($_POST['pro_id'])){
			$update_data['pro_status'] = $_POST['pro_status'];
			$this->Seller_model->update_single_record("tbl_products","pro_id",$_POST['pro_id'],$update_data);
		}
	}

	// delete bookings
	public function delete_booking($booking_id){
		$this->Seller_model->delete_single_record("tbl_bookings",'book_id',$booking_id);
		if($_SESSION['login_as']=='admin'){
			header('Location:'.base_url('welcome/booking_list'));
		}
		else{
			header('Location:'.base_url('welcome/vendor_bookings'));
		}
		
	}



	/****
	---BACKEND CODE ENDS
	*****/

}
