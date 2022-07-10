<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seller_model extends CI_model {

	//To get Single record data
	public function get_data($table,$field,$condition)
	{
		$q = $this->db->get_where($table,array($field=>$condition),1,0);
		return $q->row();
	}

	//To Insert Data in table
	public function insert_data($table,$data)
	{
		$this->db->insert($table,$data);
	}

	//To get all data from table
	public function get_all_data($table,$field)
	{
		$q = $this->db->select($field)
						->get($table);
		return $q->result_array();
	}

	//to get data w.r.t {types}
	function get_categorized_data($table,$field,$condition)
	{
		$this->db->select($field);
		$q = $this->db->get_where($table,$condition);
		return $q->result_array();
	}

	//to Update Single record and redirect to page
	function update_single_record($table,$field,$update_id,$update_data)
	{
		$this->db->where($field,$update_id);
		$this->db->update($table,$update_data);

	}

	//to Delete Single record 
	public function delete_single_record($table,$field,$delete_id)
	{
		$this->db->where($field,$delete_id);
		$this->db->delete($table);
	}


	//to get user bookings 
	public function get_user_bookings($user_id)
	{
		$q = $this->db->select('book_id,tbl_users.user_name as booking_user, book_from_date, book_to_date, book_upi_id, book_at, book_pro_id, tbl_products.pro_vendor_id, pro_name, pro_description, pro_price, pro_image')
			->where(array("book_usr_id"=>$user_id))
			->order_by("tbl_bookings.book_id","DESC")
			->join("tbl_users","tbl_users.user_id=tbl_bookings.book_usr_id")
			->join("tbl_products","tbl_products.pro_id=tbl_bookings.book_pro_id")
			->get("tbl_bookings");
			return $q->result_array();
	}

	//to get vendor bookings 
	public function get_vendor_bookings($vendor_id)
	{
		$q = $this->db->select('book_id,tbl_users.user_name as booking_user, book_from_date, book_to_date, book_upi_id, book_at, book_pro_id, tbl_products.pro_vendor_id, pro_name, pro_description, pro_price, pro_image')
			->where(array("tbl_products.pro_vendor_id"=>$vendor_id))
			->order_by("tbl_bookings.book_id","DESC")
			->join("tbl_users","tbl_users.user_id=tbl_bookings.book_usr_id")
			->join("tbl_products","tbl_products.pro_id=tbl_bookings.book_pro_id")
			->get("tbl_bookings");
			return $q->result_array();
	}

	//to get all bookings 
	public function get_all_bookings()
	{
		$q = $this->db->select('book_id,tbl_users.user_name as booking_user, book_from_date, book_to_date, book_upi_id, book_at, book_pro_id, tbl_products.pro_vendor_id, pro_name, pro_description, pro_price, pro_image')
			->order_by("tbl_bookings.book_id","DESC")
			->join("tbl_users","tbl_users.user_id=tbl_bookings.book_usr_id")
			->join("tbl_products","tbl_products.pro_id=tbl_bookings.book_pro_id")
			->get("tbl_bookings");
			return $q->result_array();
	}

}
?>
