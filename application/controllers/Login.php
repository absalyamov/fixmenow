<?php 
if (!defined('BASEPATH')) exit('Не разрешается напрямую обращаться к скрипту!');

class Login extends CI_Controller 
{

    function __construct() 
	{
        parent::__construct();
    }

    function index() 
	{

    	$data = array();
    	
    	$submit = $this->input->post('submit');
    	$token  = $this->input->post('token');

    	/// on form submit
    	if( $submit=='true' AND $token != '' )
		{

    		$username = $this->input->post('username');
    		$password = $this->input->post('password');

    		$errors = "";
    		if($username==""){ $errors .= '- Заполните логин! <br />'; }
    		if($password==""){ $errors .= '- Заполните пароль! <br />'; }


    		if($errors!='')
			{
    			$data['login_error'] = $errors;
    		}
			else
			{

    			$result = $this->db->query
				("
				SELECT * FROM `users` 
					WHERE 
						LCASE(`username`) = LCASE('{$username}')
					AND `password` = MD5('{$password}')
    			");

    			$count = $result->num_rows();
    			if($count==0)
				{
    				$data['login_error'] = 'Неверный логин или пароль!';
    			}
				else
				{
    				$user = $result->row();

    				if($user->status!='1')
					{
    					$data['login_error'] = 'Ваша учетная запись заблокирована!';
    				}
					else
					{

    					$this->session->set_userdata('userid',$user->id);
	    				$this->session->set_userdata('hash',md5("{$user->id}||{$user->username}||{$user->password}"));
	    				redirect(base_url());

    				}

    			}

    		}

    	}

        if($this->input->get('logout')=='true')
		{
            $data['login_error'] = 'Вы вышли из системы';
        }

    	

        $this->load->view('login',$data);
    }

    

}
        
?>