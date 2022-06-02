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
                                    <form action="<?= base_url('admin/karyawan/prosesTambah');?>" method="POST">
                                    <div class="row g-2">
                                       <div class="mb-3 col-md-6">
                                            <label for="inputEmail4" class="form-label">Nama Depan *</label>
                                            <input type="text" name="firstname" class="form-control" id="firstname" placeholder="John" required>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label for="inputPassword4" class="form-label">Nama Belakang *</label>
                                            <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Willy" required>
                                        </div>
                                    </div>
                                    <div class="row g-2">
                                    <div class="mb-3 col-md-6">
                                        <label for="inputEmail4" class="form-label">Gender *</label>
                                        <div class="form-check">
                                            <input type="radio" id="lakilaki" name="gender" value="male" class="form-check-input" required>
                                            <label class="form-check-label" for="lakilaki">Laki-laki</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" id="perempuan" name="gender" value="female" class="form-check-input" required>
                                            <label class="form-check-label" for="perempuan">Perempuan</label>
                                        </div>
                                    </div> 
                                    <div class="mb-3 col-md-6">
                                    <label for="civilstatus" class="form-label">Status</label>
                                        <select class="form-select" name="civilstatus" id="civilstatus">
                                            <option value="-">-</option>
                                            <option value="single">single</option>
                                            <option value="married">married</option>
                                            <option value="annulled">annulled</option>
                                            <option value="widowed">widowed</option>
                                            <option value="legally separated">legally separated</option>
                                        </select>
                                    </div> 
                                    </div>
                                    <div class="row g-2">
                                    <div class="mb-3 col-md-6">
                                        <label for="email" class="form-label">Email </label>
                                        <input class="form-control" id="email" type="email" name="email" placeholder="Alamat Email">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="nohp" class="form-label">No Hp</label>
                                        <input class="form-control" id="nohp" type="number" name="nohp">
                                    </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="tglLahir" class="form-label">Tanggal Lahir</label>
                                        <input class="form-control" id="tglLahir" type="date" name="tglLahir">
                                    </div>
                                    <div class="mb-3">
                                        <label for="noKtp" class="form-label">No Ktp</label>
                                        <input class="form-control" id="noKtp" type="text" name="noKtp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="alamat" class="form-label">Alamat</label>
                                        <textarea class="form-control" placeholder="" name="alamat" id="alamat" style="height: 100px;"></textarea>
                                    </div>
                                    <div class="row g-2">
                                    <div class="mb-3 col-md-6">
                                        <label for="company" class="form-label">Company *</label>
                                        <select class="form-select" name="company" id="company" required>
                                            <option value="">-</option>
                                            <?php 
                                                foreach($dataCompany as $company){
                                            ?>
                                            <option value="<?= $company['company_id'];?>"><?= $company['company_title'];?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="department" class="form-label">Department *</label>
                                        <select class="form-select" id="department" name="department" required>
                                            <option value="">-</option>
                                            <?php 
                                                foreach($dataDepartment as $department){
                                            ?>
                                            <option value="<?= $department['department_id'];?>"><?= $department['department_title'];?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    </div>
                                    <div class="row g-2">
                                    <div class="mb-3 col-md-6">
                                        <label for="job" class="form-label">Job *</label>
                                        <select class="form-select" id="job" name="job" required>
                                            <option value="">-</option>
                                            <?php 
                                                foreach($dataJob as $job){
                                            ?>
                                            <option value="<?= $job['job_id'];?>"><?= $job['job_title'];?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="idkaryawan" class="form-label">ID Karyawan *</label>
                                        <input class="form-control" id="idkaryawan" type="number" name="idkaryawan" placeholder="ex:0001" required>
                                    </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="employeeType" class="form-label">Tipe Karyawan *</label>
                                        <select class="form-select" id="employeeType" name="employeeType" required>
                                            <option value="">-</option>
                                            <option value="regular">regular</option>
                                            <option value="trainee">trainee</option>
                                            <option value="intership">intership</option>
                                        </select>
                                    </div> 
                                    <div class="mb-3">
                                        <label for="userType" class="form-label">Tipe Akun *</label>
                                        <select class="form-select" id="userType" name="userType" required>
                                            <option value="">-</option>
                                            <option value="manager">manager</option>
                                            <option value="employee">employee</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password </label>
                                        <input class="form-control" id="password" type="password" name="password">
                                    </div>
                                    <div class="mb-3">
                                        <label for="statusUser" class="form-label">Status *</label>
                                        <select class="form-select" id="statusUser" name="status" required>
                                            <option value="">-</option>
                                            <option value="Active">Active</option>
                                            <option value="Archive">Archive</option>
                                        </select>
                                    </div>
                                    <div class="row g-2">
                                    <div class="mb-3 col-md-6">
                                        <label for="in" class="form-label">In Time *</label>
                                        <input class="form-control" id="inTime" type="time" name="inTime" required>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="out" class="form-label">Out Time *</label>
                                        <input class="form-control" id="outTime" type="time" name="outTime" required>
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