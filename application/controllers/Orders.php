<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Bookings extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->user->checkUser();
        $this->load->model('booking_model');
    }

    function index() {
        
    	$data = array();
        $data['orders'] = $this->booking_model->load();
        $this->load->view('common/header');
        $this->load->view('bookings/list',$data);
        $this->load->view('common/footer');
    }

    function view($id){
        $data = array();


        if($this->input->post('sf')=='update_status'){
            $id = $this->input->post('id');
            $status = $this->input->post('status');

            $this->db->query("UPDATE `orders` SET `status`='{$status}' WHERE MD5(Pid)='{$id}'");
            $data['message'] = '<div class="alert alert-success">Status Updated Successfully.</div>';
        }


        $order = $this->booking_model->view($id);
        $order = $order[0];
        
        if(!isset($order)){
            header("Location: ".base_url('bookings'));
        }else{
            $data['order'] = $order;
        }

       $this->load->view('common/header');
       $this->load->view('bookings/view',$data);
       $this->load->view('common/footer');
    }

    function delete($id){

        if($id==''){ header("Location: ".base_url('bookings')); }

        $this->db->query("DELETE FROM `orders` WHERE  MD5(`Pid`)='{$id}'");

        header("Location: ".base_url('bookings'));

    }


}
        
?>