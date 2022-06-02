<?php require_once 'include/header.php';?>
                    <!-- Start Content-->
                    <div class="container-fluid">
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">MesinAbsensi</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                            <li class="breadcrumb-item active"><?= $pageTitle;?></li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title"><?= $pageTitle;?></h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <!-- Right Sidebar -->
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                    <form action="<?= base_url('admin/karyawan/prosesEdit/');?><?= $dataKaryawan['user_id'];?>" method="POST">
                                    <div class="row g-2">
                                       <div class="mb-3 col-md-6"> 
                                            <label for="inputEmail4" class="form-label">Nama Depan *</label>
                                            <input type="text" name="firstname" class="form-control" id="firstname" placeholder="John" value="<?= $dataKaryawan['user_firstname'];?>" required>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label for="inputPassword4" class="form-label">Nama Belakang *</label>
                                            <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Willy" value="<?= $dataKaryawan['user_lastname'];?>" required>
                                        </div>
                                    </div>
                                    <div class="row g-2">
                                    <div class="mb-3 col-md-6">
                                        <label for="inputEmail4" class="form-label">Gender *</label>
                                        <div class="form-check">
                                            <input type="radio" id="lakilaki" name="gender" value="male" class="form-check-input" <?php if($dataKaryawan['user_gender']=='male'){ echo "checked";}?> required>
                                            <label class="form-check-label" for="lakilaki">Laki-laki</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" id="perempuan" name="gender" value="female" class="form-check-input" <?php if($dataKaryawan['user_gender']=='female'){ echo "checked";}?> required>
                                            <label class="form-check-label" for="perempuan">Perempuan</label>
                                        </div>
                                    </div> 
                                    <div class="mb-3 col-md-6">
                                    <label for="civilstatus" class="form-label">Status</label>
                                        <select class="form-select" name="civilstatus" id="civilstatus">
                                            <option value="<?= $dataKaryawan['user_civilstatus'];?>"><?= $dataKaryawan['user_civilstatus'];?></option>
                                            <?php
                                                if($dataKaryawan['user_civilstatus']!='single'){
                                            ?>
                                            <option value="single">single</option>
                                            <?php
                                                }if($dataKaryawan['user_civilstatus']!='married'){
                                            ?>
                                            <option value="married">married</option>
                                            <?php
                                                }if($dataKaryawan['user_civilstatus']!='annulled'){
                                            ?>
                                            <option value="annulled">annulled</option>
                                            <?php
                                                }if($dataKaryawan['user_civilstatus']!='widowed'){
                                            ?>
                                            <option value="widowed">widowed</option>
                                            <?php
                                                }if($dataKaryawan['user_civilstatus']!='legally separated'){
                                            ?>
                                            <option value="legally separated">legally separated</option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div> 
                                    </div>
                                    <div class="row g-2">
                                    <div class="mb-3 col-md-6">
                                        <label for="email" class="form-label">Email </label>
                                        <input class="form-control" id="email" type="email" name="email" placeholder="Alamat Email" value="<?= $dataKaryawan['user_email'];?>">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="nohp" class="form-label">No Hp</label>
                                        <input class="form-control" id="nohp" type="number" value="<?= $dataKaryawan['user_mobilenumber'];?>" name="nohp">
                                    </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="tglLahir" class="form-label">Tanggal Lahir</label>
                                        <input class="form-control" id="tglLahir" type="date" value="<?= $dataKaryawan['user_birth'];?>" name="tglLahir">
                                    </div>
                                    <div class="mb-3">
                                        <label for="noKtp" class="form-label">No Ktp</label>
                                        <input class="form-control" id="noKtp" type="text" value="<?= $dataKaryawan['user_ktp'];?>" name="noKtp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="alamat" class="form-label">Alamat</label>
                                        <textarea class="form-control" placeholder="" name="alamat" id="alamat" style="height: 100px;"><?= $dataKaryawan['user_address'];?></textarea>
                                    </div>
                                    <div class="row g-2">
                                    <div class="mb-3 col-md-6">
                                        <label for="company" class="form-label">Company *</label>
                                        <select class="form-select" name="company" id="company" required>
                                             <?php 
                                                foreach($dataCompany as $company){
                                                $currentCompany = $this->karyawan_model->companybyId($company['company_id'])->row_array(); 
                                            ?>
                                                <option value="<?= $currentCompany['company_id'];?>"><?= $currentCompany['company_title'];?></option>
                                            <?php  
                                                if($company['company_id']!=$currentCompany['company_id']){
                                            ?>
                                            <option value="<?= $company['company_id'];?>"><?= $company['company_title'];?></option>
                                            <?php
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="department" class="form-label">Department *</label>
                                        <select class="form-select" id="department" name="department" required>
                                             <?php 
                                                foreach($dataDepartment as $department){
                                                    $currentDepartment = $this->karyawan_model->departmentbyId($department['department_id'])->row_array(); 
                                            ?>
                                                <option value="<?= $currentDepartment['department_id'];?>"><?= $currentDepartment['department_title'];?></option>
                                            <?php  
                                                if($department['department_id']!=$currentDepartment['department_id']){
                                            ?>
                                            <option value="<?= $department['department_id'];?>"><?= $department['department_title'];?></option>
                                            <?php
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    </div>
                                    <div class="row g-2">
                                    <div class="mb-3 col-md-6">
                                        <label for="job" class="form-label">Job *</label>
                                        <select class="form-select" id="job" name="job" required>

                                            <?php 
                                                foreach($dataJob as $job){
                                                    $currentJob = $this->karyawan_model->jobbyId($job['job_id'])->row_array(); 
                                            ?>
                                                <option value="<?= $currentJob['job_id'];?>"><?= $currentJob['job_title'];?></option>
                                            <?php  
                                                if($job['job_id']!=$currentJob['job_id']){
                                            ?>
                                            <option value="<?= $job['job_id'];?>"><?= $job['job_title'];?></option>
                                            <?php
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="idkaryawan" class="form-label">ID Karyawan *</label>
                                        <input class="form-control" id="idkaryawan" type="number" name="idkaryawan" placeholder="ex:0001" value="<?= $dataKaryawan['user_idnumber'];?>" required>
                                    </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="employeeType" class="form-label">Tipe Karyawan *</label>
                                        <select class="form-select" id="employeeType" name="employeeType" required>
                                            <option value="<?= $dataKaryawan['user_employeetype'];?>"><?= $dataKaryawan['user_employeetype'];?></option>
                                            <?php
                                                if($dataKaryawan['user_employeetype']!='regular'){
                                            ?>
                                            <option value="regular">regular</option>
                                            <?php
                                                }if($dataKaryawan['user_employeetype']!='trainee'){
                                            ?>
                                            <option value="trainee">trainee</option>
                                            <?php
                                                 }if($dataKaryawan['user_employeetype']!='intership'){
                                            ?>
                                            <option value="intership">intership</option>
                                            <?php
                                                 }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="userType" class="form-label">Tipe Akun *</label>
                                        <select class="form-select" id="userType" name="userType" required>
                                            <option value="<?= $dataKaryawan['user_type'];?>"><?= $dataKaryawan['user_type'];?></option>
                                            <?php if($dataKaryawan['user_type']=='manager'){ $userType = 'employee';}else{ $userType = 'manager'; }?>
                                            <option value="<?= $userType;?>"><?= $userType;?></option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password </label>
                                        <input class="form-control" id="password" type="password" name="password">
                                        <small>Kosongkan jika tidak ada perubahan</small>
                                    </div>
                                    <div class="mb-3">
                                        <label for="statusUser" class="form-label">Status *</label>
                                        <select class="form-select" id="statusUser" name="status" required>
                                            <option value="<?= $dataKaryawan['user_status'];?>"><?= $dataKaryawan['user_status'];?></option>
                                            <?php if($dataKaryawan['user_status']=='Active'){ $statusUser = 'Archive';}else{ $statusUser = 'Active'; }?>
                                            <option value="<?= $statusUser;?>"><?= $statusUser;?></option>
                                        </select>
                                    </div>
                                    <div class="row g-2">
                                    <div class="mb-3 col-md-6">
                                        <label for="in" class="form-label">In Time *</label>
                                        <input class="form-control" id="inTime" type="time" name="inTime" value="<?= $dataKaryawan['in_time'];?>" required>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="out" class="form-label">Out Time *</label>
                                        <input class="form-control" id="outTime" type="time" name="outTime" value="<?= $dataKaryawan['out_time'];?>" required>
                                    </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                                    </form>            
                                    </div>
                                    <!-- end card-body -->
                                    <div class="clearfix"></div>
                                </div> <!-- end card-box -->
                            </div> <!-- end Col -->
                        </div><!-- End row -->

                    </div> <!-- container -->

                </div> <!-- content -->
                <?php 
            if(isset($_GET['result'])){ 
                if($_GET['result']=='false'){
                    $error_karyawan = "false";
                }elseif($_GET['result']=='true'){
                    $error_karyawan = "true";
                }else{
                    $error_karyawan = "undefined";
                }
            }else{
                $error_karyawan = "undefined";
            }
        ?>
        <script>
            var notification = <?= $error_karyawan;?>;
            <?php 
                if($error_karyawan=='false'){
                    echo '$.NotificationApp.send("Berhasil!","Data karyawan berhasil ditambahkan","top-right","rgba(0,0,0,0.2)","success");';
                }elseif($error_karyawan=='true'){
                    echo '$.NotificationApp.send("Galat!","Mohon periksa data yang anda masukkan","top-right","rgba(0,0,0,0.2)","error");';
                }
            ?>
        </script>
<?php require_once 'include/footer.php';?>