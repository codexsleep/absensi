<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Auth_model','auth_model');
		$this->load->model('Beranda_model','beranda_model');
		$this->load->library('session');
		if($this->session->userdata('logged')!=TRUE){
			redirect("auth/login");
		}
        error_reporting(0);
	}

	public function index()
	{
		$data['pageTitle'] = "Beranda";
		$data['userdata'] = $this->auth_model->datauser($this->session->userdata('email'))->row_array();
		$data['maintanance'] = $this->beranda_model->maintanance()->row_array();
		$data['attendance'] = $this->beranda_model->attendance()->row_array();
		$data['employee'] = $this->beranda_model->employee()->row_array();
		$this->load->view('admin/beranda',$data);
	}
}
