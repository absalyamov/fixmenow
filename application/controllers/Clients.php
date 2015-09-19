<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->user->checkUser();
        $this->load->model('users_model');
    }

    public function index($action="") {
        $data = array();

        $data['users'] = $this->users_model->load();

    	$this->load->view('common/header');
    	$this->load->view('users/manage',$data);
    	$this->load->view('common/footer');
    }

    public function add(){

        $data = array();

        if($this->input->post('sf')=='1'):

          $name       = $this->input->post('name');
          $username   = $this->input->post('username');
          $password   = $this->input->post('password');

          $errors = "";

          if($name==''){ $errors .= '<li>Enter fullname</li>'; }
          if($username==''){ $errors .= '<li>Enter username</li>'; }
          if($password==''){ $errors .= '<li>Enter password</li>'; }

          if($errors!=''){
            $data['error'] = '<div class="alert alert-danger"><ul>'.$errors.'</ul></div>';
          }else{
            $save_status = $this->users_model->add($username,$password,$name);
            if($save_status=='OK'){
              $data['error'] = '<div class="alert alert-success">User created successfully</div>';
            }else{
              $data['error'] = $save_status;
            }
          }

        endif;

        $this->load->view('common/header');
        $this->load->view('users/add',$data);
        $this->load->view('common/footer');
    }

    public function edit($userid){

      if($userid==''){
        header("Location: ".base_url().'users/');
      }

      $error = "";
      if($this->input->post('sf')=='1'){

        $name     = $this->input->post('name');
        $password = $this->input->post('password');

        if($name==""){
          $error = '<div class="alert alert-danger">Fullname not supplied</div>';
        }else{
          $this->db->query("UPDATE `users` SET `name`='{$name}' WHERE MD5(`id`)='{$userid}'");

          if($password!=''){
            $this->db->query("UPDATE `users` SET `password`=MD5('{$password}') WHERE MD5(`id`)='{$userid}'");
          }
          $error = '<div class="alert alert-success">User updated successfully</div>';
        }

      }


      $data = $this->users_model->getUser($userid);
      $data['error'] = $error;

      $this->load->view('common/header');
      $this->load->view('users/edit',$data);
      $this->load->view('common/footer');

    }

    public function deactive($userid){
       if($userid==""){
        header("Location: ".base_url('users'));
       }else{
        $this->users_model->changeStatus($userid,'0');
        header("Location: ".base_url('users'));
       }
    }

    public function active($userid){
       if($userid==""){
        header("Location: ".base_url('users'));
       }else{
        $this->users_model->changeStatus($userid,'1');
        header("Location: ".base_url('users'));
       }
    }

    public function delete($userid){
       if($userid==""){
        header("Location: ".base_url('users'));
       }else{
        $this->users_model->delete($userid,'1');
        header("Location: ".base_url('users'));
       }
    } 
}
        
?>