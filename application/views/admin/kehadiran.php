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
                            <div class="col-auto" style="margin-bottom:20px;">
                                <a href="<?= base_url('admin/kehadiran/out');?>" class="float-end btn btn-warning btn-sm" style="margin-left:5px;">Open Out WorkClock</a>
                                <a href="<?= base_url('admin/kehadiran/in');?>" class="float-end btn btn-success btn-sm" >Open In WorkClock</a> 
                            </div>
                            <!-- Right Sidebar -->
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                    <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>Tanggal</th>
                                                <th>Nama</th>
                                                <th>Waktu In</th>
                                                <th>Waktu Out</th>
                                                <th>Waktu Late</th>
                                                <th>Waktu Over</th>
                                                <th>Status</th>
                                                </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                foreach($attendance as $kehadiran){
                                                $employeeData = $this->kehadiran_model->employeeById($kehadiran['user_id'])->row_array();
                                            ?>
                                            <tr>
                                                <td><?= $kehadiran['attendance_date'];?></td>
                                                <td><?= $employeeData['user_firstname'].' '.$employeeData['user_lastname'];?></td>
                                                <td><?= $kehadiran['attendance_in'];?> WIB</td>
                                                <td><?= $kehadiran['attendance_out'];?></td>
                                                <td><?= $kehadiran['attendance_late'];?></td>
                                                <td><?= $kehadiran['attendance_overtime'];?></td>
                                                <td><?php if($kehadiran['attendance_status']=='1'){ echo 'On Time';}else{ echo 'Late';}?></td>
                                            </tr>
                                            <?php
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                    </div>
                                    <!-- end card-body -->
                                    <div class="clearfix"></div>
                                </div> <!-- end card-box -->
                            </div> <!-- end Col -->
                        </div><!-- End row -->

                    </div> <!-- container -->

                </div> <!-- content -->

<?php require_once 'include/footer.php';?>