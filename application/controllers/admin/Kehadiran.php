<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kehadiran extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Auth_model','auth_model');
		$this->load->model('kehadiran_model','kehadiran_model');
		$this->load->library('session');
		if($this->session->userdata('logged')!=TRUE){
			redirect("auth/login");
		}
        error_reporting(0);
	}
	
	public function index()
	{
		$data['pageTitle'] = "Kehadiran";
		$data['userdata'] = $this->auth_model->datauser($this->session->userdata('email'))->row_array();
		$data['attendance'] = $this->kehadiran_model->attendance()->result_array();
		$this->load->view('admin/kehadiran',$data);
	}

	public function in()
	{
		$data['pageTitle'] = "Absensi Kehadiran Masuk";
		$data['userdata'] = $this->auth_model->datauser($this->session->userdata('email'))->row_array();
		$this->load->view('admin/AbsenHadir',$data);
	}

	public function out()
	{
		$data['pageTitle'] = "Absensi Kehadiran Keluar";
		$data['userdata'] = $this->auth_model->datauser($this->session->userdata('email'))->row_array();
		$this->load->view('admin/AbsenKeluar',$data);
	}

	public function inProcess()
	{
		$employeeId=str_replace("'", "", htmlspecialchars($this->input->post('id',TRUE),ENT_QUOTES));
		$employeeData = $this->kehadiran_model->getbyID($employeeId)->row_array();
		$userId = $employeeData['user_id'];
		$date = date('Y-m-d');
		$dateTime = date('Y-m-d H:i:s');
		$attendanceCheck = $this->kehadiran_model->attendanceCheck($userId,$date)->row_array();
		$inTime = date('H:i:s');
		if($employeeData==null){
			//kondisi jika data employee tidak ada
			$this->session->set_flashdata('kehadiran', 'null');
            redirect("admin/kehadiran/in");

		}elseif($attendanceCheck['attendance_date']==$date){
			//kondisi jika employee telah melakukan absen sebelumnya
			$this->session->set_flashdata('kehadiran', 'donebefore');
            redirect("admin/kehadiran/in");
		}else{
			//kondisi jika data employee valid
			$time = $employeeData['in_time']; //waktu set dari employee
			$defaultTime = strtotime(date('Y-m-d').' '.$time);
			$currentTime = strtotime($dateTime);	
			$Timeresult = $currentTime - $defaultTime;
			if($Timeresult<=0){
				$status = 1;	
				$lateTime = "00:00:00";
			}else{
				$status = 2;
				$first = date_create(date('Y-m-d').' '.$time); //waktu masuk employee
			$last = date_create(date('Y-m-d H:i:s')); // waktu sekarang
			$diff  = date_diff($first, $last);
    			if($diff->h<10){
        			$jam = '0'.$diff->h;
    			}else{
        			$jam = $diff->h;
    			}
				if($diff->i<10){
        			$menit = '0'.$diff->i;
    			}else{
        			$menit = $diff->i;
    			}
    			if($diff->s<10){
        			$detik = '0'.$diff->s;
    			}else{
       			 	$detik = $diff->s;
    			}
				$lateTime =  $jam.':'.$menit.':'.$detik;
			}
			$result = $this->kehadiran_model->inProcess($userId,$date,$inTime,$lateTime,$status);
			if($result){
				$this->session->set_flashdata('kehadiran', 'success');
            	redirect("admin/kehadiran/in");
			}else{
				$this->session->set_flashdata('kehadiran', 'failed');
            	redirect("admin/kehadiran/in");
			}
		}
		
	}


	public function outProcess()
	{
		$employeeId=str_replace("'", "", htmlspecialchars($this->input->post('id',TRUE),ENT_QUOTES));
		$employeeData = $this->kehadiran_model->getbyID($employeeId)->row_array();
		$userId = $employeeData['user_id'];
		$date = date('Y-m-d');
		$dateTime = date('Y-m-d H:i:s');
		$attendanceCheck = $this->kehadiran_model->attendanceCheck($userId,$date)->row_array();
		$attendanceID = $attendanceCheck['attendance_id'];
		if($attendanceCheck['attendance_out']=='-' and $attendanceCheck['attendance_overtime']=='-'){ //mengecek apakah sudah pernah out atau belum
		if($attendanceCheck){
			//kondisi jika employee sudah melakukan absensi sebelumnya
			$outTime = date('H:i:s');
			$time = $employeeData['out_time']; //mengecek waktu keluar user

			//program cek overtime
			$dateTime = date('Y-m-d H:i:s');
			$defaultTime = strtotime(date('Y-m-d').' '.$time);
			$currentTime = strtotime($dateTime);	
			$Timeresult = $currentTime - $defaultTime;

			$first = date_create(date('Y-m-d').' '.$time); //waktu masuk employee
			$last = date_create(date('Y-m-d H:i:s')); // waktu sekarang
			$diff  = date_diff($first, $last);
    			if($diff->h<10){
 			       $jam = '0'.$diff->h;
  			  	}else{
    			    $jam = $diff->h;
			    }
			    if($diff->i<10){
			        $menit = '0'.$diff->i;
				}else{
			        $menit = $diff->i;
			    }
			    if($diff->s<10){
			        $detik = '0'.$diff->s;
			    }else{
			        $detik = $diff->s;
			    }
			if($Timeresult<=0){
    			$overTime = '00:00:00';
			}else{
    			$overTime =  $jam.':'.$menit.':'.$detik;
			}
			$result = $this->kehadiran_model->outProcess($attendanceID,$outTime,$overTime);
			if($result){
				$this->session->set_flashdata('kehadiran', 'success');
            	redirect("admin/kehadiran/out");
			}else{
				$this->session->set_flashdata('kehadiran', 'failed');
            	redirect("admin/kehadiran/out");
			}

		}else{
			//kondisi jika employee belum melakukan absensi sebelumnya
			$this->session->set_flashdata('kehadiran', 'null');
            	redirect("admin/kehadiran/out");
		}
		}else{
			$this->session->set_flashdata('kehadiran', 'already');
            	redirect("admin/kehadiran/out");
		}
	}
}
