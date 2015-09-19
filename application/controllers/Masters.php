<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Masters extends CI_Controller 
{

    function __construct() 
	{
        parent::__construct();
        $this->user->checkUser();

    }

    function index()
	{
        $data = array();

        $result = $this->db->query("SELECT * FROM `addnewmaster` ORDER BY `masterid`");
        $count  = $result->num_rows();

        if($count==0)
		{
            $data['masters'] =array();
        }
		else
		{
            $data['masters'] = $result->result_array();
        }

        $this->load->view('common/header');
        $this->load->view('masters/manage.php',$data);
        $this->load->view('common/footer.php');
    }

    function add() 
	{
        $data = array();

        if($this->input->post('sf')=='1'):

        	$master_id     = $this->input->post('master_id');
            $master_phone   = $this->input->post('master_phone');
            $image          = $_FILES['image'];
            $fare_price     = $this->input->post('fare_price');
            
            $address1       = $this->input->post('address1');
            $entrynflat       = $this->input->post('entrynflat');

            $city           = $this->input->post('city');
            $state          = $this->input->post('state');
            $email          = $this->input->post('email');
            $status         = $this->input->post('status');

            $description    = $this->input->post('description');

            $errors = '';
            if($master_id=='')      { $errors .= '<li>Введите id мастера</li>'; }
            if($master_phone=='')   { $errors .= '<li>Введите телефон мастера</li>'; }
            if($image['name']=='')  { $errors .= '<li>фото мастера</li>'; }
            if($fare_price=='')     { $errors .= '<li>Тариф мастера</li>'; }

            if($address1==''){ $errors .= '<li>Введите улицу и номер дома</li>'; }
            if($entrynflat==''){ $errors .= '<li>введите номер подъезда и квартиру</li>'; }

            if($city==''){ $errors .= '<li>Город/li>'; }
            if($state==''){ $errors .= '<li>Область</li>'; }
            if($email==''){ $errors .= '<li>Email </li>'; }
			else
			{
                if(!filter_var($email,FILTER_VALIDATE_EMAIL))
				{
                    $errors .= '<li>Please enter valid email address</li>';
                }
            }
            if($status=='')
			{
				$errors .= '<li>Введите доступность</li>'; 
			}

            if($errors!='')
			{
                $data['error'] = '<div class="alert alert-danger"><ul>'.$errors.'</ul></div>';
            }
			else
			{

                $result = $this->db->query("
                SELECT * FROM addnewmaster WHERE LCASE(masterid) = LCASE('{$master_id}')
                ");
                $count  = $result->num_rows();

                if($count!='')
				{
                    $data['error'] = '<div class="alert alert-danger">Мастер уже существует</div>';
                }
				else
				{


                    $file_status = @move_uploaded_file($image['tmp_name'], 'uploads/'.$image['name']);

                    if($file_status!=true)
					{
                        $data['error'] = "<div class=\"alert alert-danger\">Невозможно загрузить картинку. попробуйте позже</div>";
                    }
					else
					{
                        $result = $this->db->query("
                        INSERT INTO `addnewmaster` SET 
                            `masterid` = '{$master_id}',
                            `skillsimg` = '".$image['name']."',
                            `masterid` = '{$master_phone}',
                            `fare_price` = '{$fare_price}',
                            `address` = '{$address1} {$entrynflat}',
                            `city` = '{$city}',
                            `state` = '{$state}',
                            `email` = '{$email}',
                            `start_date` = '{$date_start}',
                            `end_date` = '{$date_end}',
                            `start_time` = '{$time_start}',
                            `end_time` = '{$time_end}',
                            `any_other_desc` = '{$description}',
                            `availability` = '{$status}'
                        ");
                        $data['error'] = '<div class="alert alert-success">Мастер занесен в базу</div>';
                        $data['flush']  = true;
                    }
                }
            }

        endif;

        $this->load->view('common/header');
        $this->load->view('masters/add',$data);
        $this->load->view('common/footer.php');
    }

    function edit($master_id) 
	{
        
        $data = array();

        if($this->input->post('sf')=='1'):

            
            $master_phone   = $this->input->post('master_phone');
            $image          = $_FILES['image'];
            $fare_price     = $this->input->post('fare_price');
            $address1       = $this->input->post('address1');
            $city           = $this->input->post('city');
            $state          = $this->input->post('state');
            $email          = $this->input->post('email');
            $status         = $this->input->post('status');
            $description    = $this->input->post('description');
            $date_start     = $this->input->post('start_date');
            $time_start     = $this->input->post('start_time');
            $date_end       = $this->input->post('end_date');
            $time_end       = $this->input->post('end_time');
            $errors = '';
          
            if($master_phone=='')   { $errors .= '<li>Введите номер мастера</li>'; }
            if($fare_price=='')     { $errors .= '<li>введите тариф мастера</li>'; }
            if($address1==''){ $errors .= '<li>введите адрес</li>'; }
            if($city==''){ $errors .= '<li>введите город</li>'; }
            if($state==''){ $errors .= '<li>введите область</li>'; }
            if($email==''){ $errors .= '<li>Email </li>'; }
			else
			{
                if(!filter_var($email,FILTER_VALIDATE_EMAIL))
				{
                    $errors .= '<li>Введите правильный email!</li>';
                }
            }
            if($status==''){ $errors .= '<li>статус мастера</li>'; }
            if($date_start==''){ $errors .= '<li>Дата начала работы</li>'; }
            if($time_start==''){ $errors .= '<li>время начала работы</li>'; }
            if($date_end==''){ $errors .= '<li>Дата завершения работы</li>'; }
            if($time_end==''){ $errors .= '<li>время завершения работы</li>'; }
            if($errors!='')
			{
                $data['error'] = '<div class="alert alert-danger"><ul>'.$errors.'</ul></div>';
            }
			else
			{
                $result = $this->db->query("
                SELECT * FROM addnewmastersskills WHERE LCASE(masterid) = LCASE('{$master_id}')
                ");
                $count  = $result->num_rows();

                if($count!='')
				{
                    $data['error'] = '<div class="alert alert-danger">Мастер уже существует в базе</div>';
                }
				else
				{
                    if($image['name']!='')
					{
                        $file_status = @move_uploaded_file($image['tmp_name'], 'uploads/'.$image['name']);
                        $this->db->query("UPDATE `addnewmastersskills` SET `skillsimg` = '".$image['name']."' WHERE MD5(`masterid`)='{$master_id}'");
                    }

                    $result = $this->db->query("
                    UPDATE `addnewmastersskills` SET 
                        `masterid` = '{$master_phone}',
                        `fare_price` = '{$fare_price}',
                        `address` = '{$address1}',
                        `city` = '{$city}',
                        `availability` = '{$state}',
                        `email` = '{$email}',
                        `start_date` = '{$date_start}',
                        `end_date` = '{$date_end}',
                        `start_time` = '{$time_start}',
                        `end_time` = '{$time_end}',
                        `any_other_desc` = '{$description}',
                        `availability` = '{$status}'
                    WHERE 
                        MD5(`masterid`) = '{$master_id}'
                    ");


                    $data['error'] = '<div class="alert alert-success">мнформация о мастере обновлена!</div>';
                 
                    
                }

            }


        endif;


        $result = $this->db->query("SELECT * FROM `addnewmastersskills` WHERE MD5(`masterid`) = '{$master_id}'");
        $count  = $result->num_rows();
        if($count==0){
            header("Location: ".base_url('masters'));
        }else{  
            $car = $result->result_array();
            $data['car'] = $car[0];
        }


        $this->load->view('common/header');
        $this->load->view('masters/edit',$data);
        $this->load->view('common/footer.php');
    }


    function delete($num){
        $this->db->query("DELETE FROM `addnewmastersskills` WHERE md5(`masterid`)='{$num}'");
        header("Location: ".base_url().'masters/');
    }





}
        
?>