<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class order_model extends CI_Model 
{
	public function load()
	{
		$result = $this->db->query("SELECT * FROM `orders` ORDER BY `Pid` ASC");
		$count = $result->num_rows();
		if($count==0)
		{
			$op = array();
		}
		else
		{
			$op = $result->result_array();
		}
		return $op;
	}

	public function view($id)
	{
		$result = $this->db->query("SELECT * FROM `orders` WHERE MD5(`Pid`)='{$id}'");
		$count  = $result->num_rows();
		if($count==0)
		{
			return false;
		}
		else
		{
			return $result->result_array();
		}
	}

}
?>