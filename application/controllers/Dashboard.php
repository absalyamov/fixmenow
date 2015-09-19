<?php
defined('BASEPATH') OR exit('Нельзя так обращаться напрямую к скрипту!');

class Dashboard extends CI_Controller {

	
	public function index()
	{
		/// залогинен ли пользовтель, иначе отправить на страницу авторизации
		$this->user->checkUser();


		$this->load->view('common/header');
		$this->load->view('dashboard');
		$this->load->view('common/footer');
	}

	public function password(){

		/// залогинен ли пользовтель, иначе отправить на страницу авторизации
		$this->user->checkUser();


		$data = array();


		/* START ACTION = FORM SUBMIT */
		if($this->input->post('sf')=='1'):

			$pass1 = $this->input->post('pass1');
			$pass2 = $this->input->post('pass2');
			$pass3 = $this->input->post('pass3');

			$errors = "";
			if($pass1== "" || $pass2=="" || $pass3==""){
				$errors .= '<li>Нужно заполнить все поля!</li>';
			}


			if($errors!=''){
				$data['error'] = '<div class="alert alert-danger"><ul>'.$errors.'</ul></div>';
			}else{

				$pass_status = $this->user->changePassword($this->user->userdata->id,$pass1,$pass2,$pass3);

				if($pass_status!='OK'){
					$data['error'] = '<div class="alert alert-danger">'.$pass_status.'</div>';
				}else{
					$data['error'] = '<div class="alert alert-success">Пароль сменен удачно</div>';
				}

			}


		endif;
		/* END ACTIOn = FORM SUBMIT */


		$this->load->view('common/header');
		$this->load->view('password',$data);
		$this->load->view('common/footer');
	}

	public function logout(){
        $this->session->unset_userdata('userid');
        $this->session->unset_userdata('hash');
        redirect(base_url('login')."?logout=true");
    }
}
