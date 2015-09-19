<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class users_model extends CI_Model 
{
	public function load()
	{
		$result = $this->db->query("SELECT * FROM `users` ORDER BY `id` ASC");
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

	public function add($username,$password,$name)
	{
		$result = $this->db->query("SELECT * FROM `users` WHERE LCASE(`username`)=LCASE('{$username}')");
		$count  = $result->num_rows();
		if($count==0)
		{
			$this->db->query("INSERT INTO `users` SET 
				`username` = '{$username}',
				`password` = MD5('{$password}'),
				`name` = '{$name}',
				`status` = '1'
			");
			return 'OK';
		}
		else
		{
			return 'Пользователь '.$username.' уже заведен в систему.';
		}
	}

	public function changeStatus($userid,$status)
	{
		$this->db->query("UPDATE `users` SET `status`='{$status}' WHERE MD5(`id`)='".$userid."'");
	}

	public function delete($userid)
	{
		$this->db->query("DELETE FROM `users` WHERE MD5(`id`)='{$userid}'");
	}

	public function getUser($userid)
	{
		$result = $this->db->query("SELECT * FROM `users` WHERE MD5(`id`)='{$userid}'");
		$count  = $result->num_rows();
		if($count==0)
		{
			return false;
		}
		else
		{
			$data = $result->result_array();
			return $data[0];
		}
	}

}
?>