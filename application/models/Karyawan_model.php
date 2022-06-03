<?php
class karyawan_model extends CI_Model{

    function dataKaryawan($departement,$posisi,$status){
        if($departement=='default' and $posisi!='default'){
            $query= $this->db->query("SELECT * FROM tbl_users WHERE user_jobtitle='$posisi' and user_status='$status' ORDER BY user_id DESC");
        }elseif($posisi=='default' and $departement!='default'){
            $query= $this->db->query("SELECT * FROM tbl_users WHERE user_department='$departement' and user_status='$status' ORDER BY user_id DESC");
        }elseif($departement=='default' and $posisi='default'){
            $query= $this->db->query("SELECT * FROM tbl_users WHERE user_status='$status' ORDER BY user_id DESC");
        }else{
            $query= $this->db->query("SELECT * FROM tbl_users WHERE user_department='$departement' and user_jobtitle='$posisi' and user_status='$status' ORDER BY user_id DESC");
        }
            return $query;
     }

    function karywanbyId($id){
        $query= $this->db->query("SELECT * FROM tbl_users where user_id='$id'");
        return $query;
    }

    function companybyId($id){
        $query= $this->db->query("SELECT * FROM tbl_company WHERE company_id='$id' LIMIT 1");
        return $query;
    }

    function departmentbyId($id){
        $query= $this->db->query("SELECT * FROM tbl_department WHERE department_id='$id' LIMIT 1");
        return $query;
    }

    function jobbyId($id){
        $query= $this->db->query("SELECT * FROM tbl_job WHERE job_id='$id' LIMIT 1");
        return $query;
    }

    function companyData(){
        $query= $this->db->query("SELECT * FROM tbl_company order by company_id DESC");
        return $query;
    }

    function departmentData(){
        $query= $this->db->query("SELECT * FROM tbl_department order by department_id DESC");
        return $query;
    }

    function jobData(){
        $query= $this->db->query("SELECT * FROM tbl_job order by job_id DESC");
        return $query;
    }

    function tambahKaryawan($firstname,$lastname,$gender,$civilstatus,$email,$nohp,$tglLahir,$noKtp,$alamat,$company,$department,$job,$idkaryawan,$employeeType,$userType,$password,$status,$inTime,$outTime,$created)
    {
        $result = $this->db->query("INSERT INTO tbl_users (user_firstname, user_lastname, user_gender, 
        user_civilstatus, user_email, user_mobilenumber, user_birth, user_ktp, user_address, user_company, 
        user_department, user_jobtitle, user_idnumber, user_employeetype, user_type, user_password, user_status, 
        in_time, out_time, created_date) 
        VALUES ('$firstname','$lastname','$gender','$civilstatus','$email','$nohp','$tglLahir','$noKtp','$alamat',
        '$company','$department','$job','$idkaryawan','$employeeType','$userType','$password','$status','$inTime',
        '$outTime','$created')");
        return $result;
    }

    function editKaryawan($id,$firstname,$lastname,$gender,$civilstatus,$email,$nohp,$tglLahir,$noKtp,$alamat,$company,$department,$job,$idkaryawan,$employeeType,$userType,$password,$status,$inTime,$outTime,$update)
    {
        if($password!=null){
            $result = $this->db->query("UPDATE tbl_users SET user_firstname='$firstname', user_lastname='$lastname', user_gender='$gender', user_civilstatus='$civilstatus', user_email='$email', user_mobilenumber='$nohp', user_birth='$tglLahir', user_ktp='$noKtp', user_address='$alamat', user_company='$company', user_department='$department', user_jobtitle='$job', user_idnumber='$idkaryawan', user_employeetype='$employeeType', user_type='$userType', user_password='$password', user_status='$status', in_time='$inTime', out_time='$outTime', update_date='$update' WHERE user_id='$id'");
        }else{
            $result = $this->db->query("UPDATE tbl_users SET user_firstname='$firstname', user_lastname='$lastname', user_gender='$gender', user_civilstatus='$civilstatus', user_email='$email', user_mobilenumber='$nohp', user_birth='$tglLahir', user_ktp='$noKtp', user_address='$alamat', user_company='$company', user_department='$department', user_jobtitle='$job', user_idnumber='$idkaryawan', user_employeetype='$employeeType', user_type='$userType', user_status='$status', in_time='$inTime', out_time='$outTime', update_date='$update' WHERE user_id='$id'");
        }
        return $result;
    }

    function hapusKaryawan($id){
        $query= $this->db->query("DELETE FROM tbl_users WHERE user_id='$id'");
        return $query;
    }

    function telatCount($id){
        $query= $this->db->query("SELECT count(attendance_id) as jumlah from tbl_attendance where attendance_status=2 and user_id='$id'");
        return $query;
    }

    function ontimeCount($id){
        $query= $this->db->query("SELECT count(attendance_id) as jumlah from tbl_attendance where attendance_status=1 and user_id='$id'");
        return $query;
    }

    function overtimeCount($id){
        $query= $this->db->query("SELECT count(attendance_id) as jumlah from tbl_attendance where attendance_overtime NOT IN('-','00:00:00') and user_id='$id'");
        return $query;
    }
    
    function editjadwalbydept($department,$inTime,$outTime,$update){
        $result = $this->db->query("UPDATE tbl_users SET in_time='$inTime', out_time='$outTime', update_date='$update' WHERE user_department='$department'");
        return $query;
    }

    function tambahdepartemen($departemen,$created){
        $result = $this->db->query("INSERT INTO tbl_department (department_title, department_status, created_date) VALUES ('$   ','active','$created')");
        return $query;
    }

    function hapusdepartemen($id){
        $query= $this->db->query("DELETE FROM tbl_department WHERE department_id='$id'");
        return $query;
    }


}