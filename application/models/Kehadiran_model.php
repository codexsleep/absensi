<?php
class kehadiran_model extends CI_Model{

    function getbyID($id){
        $query= $this->db->query("SELECT * FROM tbl_users where user_idnumber='$id'");
        return $query;
    }
    
    function attendance(){
        $query = $this->db->query("SELECT * FROM tbl_attendance");
        return $query;
    }
    function attendancebyUser($id){
        $query = $this->db->query("SELECT * FROM tbl_attendance where user_id='$id'");
        return $query;
    }

    function attendanceCheck($userId,$date){
        $query = $this->db->query("SELECT * FROM tbl_attendance where user_id='$userId' and attendance_date='$date'");
        return $query;
    }

    function employeeById($id){
        $query= $this->db->query("SELECT * FROM tbl_users where user_id='$id'");
        return $query;
    }

    function inProcess($userId,$date,$inTime,$lateTime,$status){

        $result = $this->db->query("INSERT INTO tbl_attendance (user_id, attendance_date, attendance_in, attendance_out, attendance_late, attendance_overtime, attendance_status) VALUES ('$userId','$date','$inTime','-','$lateTime','-','$status')");
        return $result;
    }

    function outProcess($attendanceID,$outTime,$overTime){
        $result = $this->db->query("UPDATE tbl_attendance SET attendance_out='$outTime',attendance_overtime='$overTime' WHERE attendance_id='$attendanceID'");
        return $result;
    }

}