
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?= $pageTitle;?> | MesinAbsensi</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="<?= base_url();?>assets/images/favicon.ico">
        
        <!-- App css -->
        <link href="<?= base_url();?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url();?>assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style" />
        <link href="<?= base_url();?>assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />
    </head>
    <body class="loading authentication-bg" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
        <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-5 col-lg-7">
                        <div class="card">
                            <!-- Logo -->
                            <div class="card-header pt-4 pb-4 text-center bg-success">
                                <a href="<?= base_url('auth/login');?>">
                                    <span style="color:white; font-size:30px; font-weight:bold;">Maintanance MesinAbsensi</span>
                                </a>
                            </div>                            
                            <div class="card-body p-4">
                                <form action="<?= base_url();?>admin/maintanance/process" method="POST">
                                <label for="detail" class="form-label">Detail</label>
                                    <div class="mb-3">
                                        <select class="form-control" name="detail" required>
                                            <option>Settings Up Mikrotik</option>
                                            <option>Rebuild Networking Cable</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="estimatedtime" class="form-label">Estimasi Waktu</label>
                                        <select class="form-control" name="waktu" required>
                                            <option>01:00</option>
                                            <option>01:30</option>
                                            <option>02:00</option>
                                            <option>02:30</option>
                                            <option>03:00</option>
                                            <option>03:30</option>
                                            <option>04:00</option>
                                            <option>04:30</option>
                                            <option>05:00</option>
                                            <option>05:30</option>
                                            <option>06:00</option>
                                            <option>06:30</option>
                                            <option>07:00</option>
                                            <option>07:30</option>
                                            <option>08:00</option>
                                            <option>08:30</option>
                                            <option>09:00</option>
                                            <option>09:30</option>
                                            <option>10:00</option>
                                            <option>10:30</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <input class="form-control" type="number" autofocus placeholder="Masukkan ID" name="id" required>
                                    </div>
                                    <div class="mb-3 mb-0 text-center">
                                        <button class="btn btn-primary" type="submit" name="Proses"> Proses Maintanance </button>
                                    </div>

                                </form>
                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->
        
        <footer class="footer footer-alt">
            2022 ?? MesinAbsensi - Powered by mesinkasirpku.com
        </footer> 


        <!-- bundle -->
        <script src="<?= base_url();?>assets/js/vendor.min.js"></script>
        <script src="<?= base_url();?>assets/js/app.min.js"></script>
        <?php 
                if($this->session->flashdata('kehadiran')=='null'){
                    $attendanceResult = "null";
                }elseif($this->session->flashdata('kehadiran')=='donebefore'){
                    $attendanceResult = "donebefore";
                }elseif($this->session->flashdata('kehadiran')=='failed'){
                    $attendanceResult = "failed";
                }elseif($this->session->flashdata('kehadiran')=='success'){
                    $attendanceResult = "success";
                }            
        ?>
        <script>
            <?php 
                if($attendanceResult=='success'){
                    echo '$.NotificationApp.send("Absensi Berhasil!","ID anda telah masuk kedalam record","top-right","rgba(0,0,0,0.2)","success");';
                }elseif($attendanceResult=='failed'){
                    echo '$.NotificationApp.send("Absensi Gagal!","Mohon coba melakukan absensi kembali","top-right","rgba(0,0,0,0.2)","error");';
                }elseif($attendanceResult=='null'){
                    echo '$.NotificationApp.send("Absensi Gagal!","ID anda tidak ditemukan","top-right","rgba(0,0,0,0.2)","error");';
                }elseif($attendanceResult=='donebefore'){
                    echo '$.NotificationApp.send("Absensi Gagal!","Anda telah melakukan absensi sebelumnya","top-right","rgba(0,0,0,0.2)","error");';
                }
            ?>
        </script>
    </body>
</html>
 