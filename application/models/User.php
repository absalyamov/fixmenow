<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model 
{
	public $userdata = array();

    public function isLoggedIn()
	{
        $user_id = $this->session->userdata('userid');
        $hash    = $this->session->userdata('hash');

        $logged_in = false;
        if($user_id=='' || $hash=='')
		{
            $logged_in = false;
        }
		else
		{

            $result = $this->db->query("
			SELECT * FROM `users`
            WHERE   `id` = '{$user_id}' AND `status` != '0' LIMIT 1
            ");

            $count = $result->num_rows();
            
            if($count==0)
			{
                $logged_in = false;
            }
			else
			{
                $this->userdata = $result->row();
                $logged_in = true;
            }

        }
        return $logged_in;
    }

    public function checkUser()
	{
    	
    	$user_id = $this->session->userdata('userid');
    	$hash 	 = $this->session->userdata('hash');

    	$logged_in = false;
    	if($user_id=='' || $hash=='')
		{
    		$logged_in = false;
    	}
		else
		{

    		$result = $this->db->query("SELECT * FROM `users`
			WHERE 	`id` = '{$user_id}' AND `status` != '0' LIMIT 1
    		");

    		$count = $result->num_rows();
    		
    		if($count==0)
			{
    			$logged_in = false;
    		}
			else
			{
    			$this->userdata = $result->row();
    			$logged_in = true;
    		}

    	}

    	if($logged_in!=true)
		{
    		redirect(base_url('login'));
    	}

    }


    public function changePassword($userid,$current,$new,$new_confirm)
	{
        $result = $this->db->query("SELECT * FROM `users` WHERE `id`='{$userid}' AND `password`=MD5('{$current}')");
        $count  = $result->num_rows();
        if($count==0)
		{
            return 'Неверный пароль!';
        }
		else
		{

            if($new!=$new_confirm)
			{
                return 'новый пароль должен быть таким же!';
            }
			else
			{
                $result = $this->db->query("UPDATE `users` SET `password` = MD5('{$new}') WHERE `id`='".$userid."'");
                return 'OK';
            }
        }
    }
}
        
?>