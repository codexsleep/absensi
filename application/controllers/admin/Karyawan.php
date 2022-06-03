<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Auth_model','auth_model');
		$this->load->model('Karyawan_model','karyawan_model');
		$this->load->model('kehadiran_model','kehadiran_model');
		$this->load->library('session');
		if($this->session->userdata('logged')!=TRUE){
			redirect("auth/login");
		}
        error_reporting(0);
	}
	
	public function prosesTambah(){
			$firstname=str_replace("'", "", htmlspecialchars($this->input->post('firstname',TRUE),ENT_QUOTES));
			$lastname=str_replace("'", "", htmlspecialchars($this->input->post('lastname',TRUE),ENT_QUOTES));
			$gender=str_replace("'", "", htmlspecialchars($this->input->post('gender',TRUE),ENT_QUOTES));
			$civilstatus=str_replace("'", "", htmlspecialchars($this->input->post('civilstatus',TRUE),ENT_QUOTES));
			$email=str_replace("'", "", htmlspecialchars($this->input->post('email',TRUE),ENT_QUOTES));
			$nohp=str_replace("'", "", htmlspecialchars($this->input->post('nohp',TRUE),ENT_QUOTES));
			$tglLahir=str_replace("'", "", htmlspecialchars($this->input->post('tglLahir',TRUE),ENT_QUOTES));
			$noKtp=str_replace("'", "", htmlspecialchars($this->input->post('noKtp',TRUE),ENT_QUOTES));
			$alamat=str_replace("'", "", htmlspecialchars($this->input->post('alamat',TRUE),ENT_QUOTES));
			$company=str_replace("'", "", htmlspecialchars($this->input->post('company',TRUE),ENT_QUOTES));
			$department=str_replace("'", "", htmlspecialchars($this->input->post('department',TRUE),ENT_QUOTES));
			$job=str_replace("'", "", htmlspecialchars($this->input->post('job',TRUE),ENT_QUOTES));
			$idkaryawan=str_replace("'", "", htmlspecialchars($this->input->post('idkaryawan',TRUE),ENT_QUOTES));
			$employeeType=str_replace("'", "", htmlspecialchars($this->input->post('employeeType',TRUE),ENT_QUOTES));
			$userType=str_replace("'", "", htmlspecialchars($this->input->post('userType',TRUE),ENT_QUOTES));
			$password=SHA1(str_replace("'", "", htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES)));
			$status=str_replace("'", "", htmlspecialchars($this->input->post('status',TRUE),ENT_QUOTES));
			$inTime=str_replace("'", "", htmlspecialchars($this->input->post('inTime',TRUE),ENT_QUOTES)).':00';
			$outTime=str_replace("'", "", htmlspecialchars($this->input->post('outTime',TRUE),ENT_QUOTES)).':00';
			$created= date('Y-m-d');
			$result = $this->karyawan_model->tambahKaryawan($firstname,$lastname,$gender,$civilstatus,$email,$nohp,$tglLahir,$noKtp,$alamat,$company,$department,$job,$idkaryawan,$employeeType,$userType,$password,$status,$inTime,$outTime,$created);
			if($result){
				redirect("admin/karyawan");
			}else{
				redirect("admin/karyawan");
			}
			
	}

	public function prosesEdit($id){
		$firstname=str_replace("'", "", htmlspecialchars($this->input->post('firstname',TRUE),ENT_QUOTES));
		$lastname=str_replace("'", "", htmlspecialchars($this->input->post('lastname',TRUE),ENT_QUOTES));
		$gender=str_replace("'", "", htmlspecialchars($this->input->post('gender',TRUE),ENT_QUOTES));
		$civilstatus=str_replace("'", "", htmlspecialchars($this->input->post('civilstatus',TRUE),ENT_QUOTES));
		$email=str_replace("'", "", htmlspecialchars($this->input->post('email',TRUE),ENT_QUOTES));
		$nohp=str_replace("'", "", htmlspecialchars($this->input->post('nohp',TRUE),ENT_QUOTES));
		$tglLahir=str_replace("'", "", htmlspecialchars($this->input->post('tglLahir',TRUE),ENT_QUOTES));
		$noKtp=str_replace("'", "", htmlspecialchars($this->input->post('noKtp',TRUE),ENT_QUOTES));
		$alamat=str_replace("'", "", htmlspecialchars($this->input->post('alamat',TRUE),ENT_QUOTES));
		$company=str_replace("'", "", htmlspecialchars($this->input->post('company',TRUE),ENT_QUOTES));
		$department=str_replace("'", "", htmlspecialchars($this->input->post('department',TRUE),ENT_QUOTES));
		$job=str_replace("'", "", htmlspecialchars($this->input->post('job',TRUE),ENT_QUOTES));
		$idkaryawan=str_replace("'", "", htmlspecialchars($this->input->post('idkaryawan',TRUE),ENT_QUOTES));
		$employeeType=str_replace("'", "", htmlspecialchars($this->input->post('employeeType',TRUE),ENT_QUOTES));
		$userType=str_replace("'", "", htmlspecialchars($this->input->post('userType',TRUE),ENT_QUOTES));
		$password=SHA1(str_replace("'", "", htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES)));
		$status=str_replace("'", "", htmlspecialchars($this->input->post('status',TRUE),ENT_QUOTES));
		$inTime=str_replace("'", "", htmlspecialchars($this->input->post('inTime',TRUE),ENT_QUOTES)).':00';
		$outTime=str_replace("'", "", htmlspecialchars($this->input->post('outTime',TRUE),ENT_QUOTES)).':00';
		$update= date('Y-m-d');
		$result = $this->karyawan_model->editKaryawan($id,$firstname,$lastname,$gender,$civilstatus,$email,$nohp,$tglLahir,$noKtp,$alamat,$company,$department,$job,$idkaryawan,$employeeType,$userType,$password,$status,$inTime,$outTime,$update);
		if($result){
			redirect("admin/karyawan");
		}else{
			redirect("admin/karyawan");
		}
		
} 
	public function tambah()
	{
		$data['pageTitle'] = "Tambah Karyawan";
		$data['dataCompany'] = $this->karyawan_model->companyData()->result_array();
		$data['dataDepartment'] = $this->karyawan_model->departmentData()->result_array();
		$data['dataJob'] = $this->karyawan_model->jobData()->result_array();
		$data['userdata'] = $this->auth_model->datauser($this->session->userdata('email'))->row_array();
		$this->load->view('admin/tambahKaryawan',$data);
	}

	public function edit($id) 
	{
		$data['pageTitle'] = "Edit Karyawan";
		$data['dataCompany'] = $this->karyawan_model->companyData()->result_array();
		$data['dataDepartment'] = $this->karyawan_model->departmentData()->result_array();
		$data['dataJob'] = $this->karyawan_model->jobData()->result_array();
		$data['userdata'] = $this->auth_model->datauser($this->session->userdata('email'))->row_array();
		$data['dataKaryawan'] = $this->karyawan_model->karywanbyId($id)->row_array();
		$this->load->view('admin/editKaryawan',$data);
	}

	public function hapus($id)
	{
		$result = $this->karyawan_model->hapusKaryawan($id);
			if($result){
				redirect("admin/karyawan?result=delete_success");
			}else{
				redirect("admin/karyawan?result=delete_faild");
			}
	}
 
	public function index()
	{
		$data['pageTitle'] = "Karyawan";
		$data['userdata'] = $this->auth_model->datauser($this->session->userdata('email'))->row_array();
		$data['dataCompany'] = $this->karyawan_model->companyData()->result_array();
		$data['dataDepartment'] = $this->karyawan_model->departmentData()->result_array();
		$data['dataJob'] = $this->karyawan_model->jobData()->result_array();
		$departement = str_replace("'", "", htmlspecialchars($this->input->get('departement',TRUE),ENT_QUOTES));
		$posisi = str_replace("'", "", htmlspecialchars($this->input->get('posisi',TRUE),ENT_QUOTES));
		$status = str_replace("'", "", htmlspecialchars($this->input->get('status',TRUE),ENT_QUOTES));
		if($departement!=null and $posisi!=null){
			$data['dataKaryawan'] = $this->karyawan_model->dataKaryawan($departement,$posisi,$status)->result_array();
		}else{
			$data['dataKaryawan'] = $this->karyawan_model->dataKaryawan('default','default','Active')->result_array();
		}
		$this->load->view('admin/karyawan',$data);
	}

	public function detail($id)
	{
		$data['pageTitle'] = "Detail Karyawan";
		$data['karyawanID'] = $id;
		$data['userdata'] = $this->auth_model->datauser($this->session->userdata('email'))->row_array();
		$data['ontime'] = $this->karyawan_model->ontimeCount($id)->row_array();
		$data['telat'] = $this->karyawan_model->telatCount($id)->row_array();
		$data['overtime'] = $this->karyawan_model->overtimeCount($id)->row_array();
		$data['dataKehadiran'] = $this->kehadiran_model->attendancebyUser($id)->result_array();
		$this->load->view('admin/detailKaryawan',$data);
	}

	public function tools()
	{
		$data['pageTitle'] = "Tools Karyawan";
		$data['userdata'] = $this->auth_model->datauser($this->session->userdata('email'))->row_array();
		$this->load->view('admin/Karyawantools',$data);
	}

	public function editjadwalbydept()
	{
		$data['pageTitle'] = "Edit Jadwal Karyawan berdasarkan departemen";
		$data['userdata'] = $this->auth_model->datauser($this->session->userdata('email'))->row_array();
		$data['dataDepartment'] = $this->karyawan_model->departmentData()->result_array();
		$this->load->view('admin/editJadwalbydepartemen',$data);
	}

	public function editjadwaldept_proses(){
		$department=str_replace("'", "", htmlspecialchars($this->input->post('department',TRUE),ENT_QUOTES));
		$inTime=str_replace("'", "", htmlspecialchars($this->input->post('inTime',TRUE),ENT_QUOTES));
		$outTime=str_replace("'", "", htmlspecialchars($this->input->post('outTime',TRUE),ENT_QUOTES));
		$update= date('Y-m-d');
		$result = $this->karyawan_model->editjadwalbydept($department,$inTime,$outTime,$update);
		if($result){
			redirect("admin/karyawan/editjadwalbydept?edit=success");
		}else{
			redirect("admin/karyawan/editjadwalbydept?edit=gagal");
		}
		
	}

	public function departemen()
	{
		$data['pageTitle'] = "Departemen";
		$data['userdata'] = $this->auth_model->datauser($this->session->userdata('email'))->row_array();
		$data['dataDepartment'] = $this->karyawan_model->departmentData()->result_array();
		$this->load->view('admin/departemen',$data);
	}

	public function tambahdepartemen()
	{
		$data['pageTitle'] = "Departemen";
		$data['userdata'] = $this->auth_model->datauser($this->session->userdata('email'))->row_array();
		$this->load->view('admin/tambahdepartemen',$data);
	}

	public function tambahdepartemenProses(){
		$departemen = str_replace("'", "", htmlspecialchars($this->input->post('departemen',TRUE),ENT_QUOTES));
		$created = date('Y-m-d');
		$result = $this->karyawan_model->tambahdepartemen($departemen,$created);
		if($result){
			redirect("admin/karyawan/departemen?edit=success");
		}else{
			redirect("admin/karyawan/departemen?edit=gagal");
		}
	}

	public function hapusdepartemen($id)
	{
		$result = $this->karyawan_model->hapusdepartemen($id);
			if($result){
				redirect("admin/karyawan/departemen?result=delete_success");
			}else{
				redirect("admin/karyawan/departemen?result=delete_faild");
			}
	}


}
