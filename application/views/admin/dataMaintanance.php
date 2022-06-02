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
                                    <div class="col-auto">
                                    <a href="<?= base_url('admin/maintanance/tambah');?>" class="float-end btn btn-info btn-sm" style="margin-left:5px;" target="_blank">Tambah Maintanance</a>
                                </div>
                                    <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Tanggal</th>
                                                <th>Detail</th>
                                                <th>Waktu Estimasi</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                                </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                foreach($maintanance as $maintanance){
                                            ?>
                                            <tr>
                                                <td><?= $maintanance['maintanance_id'];?></td>
                                                <td><?= $maintanance['maintanance_date'];?></td>
                                                <td><?= $maintanance['maintanance_detail'];?></td>
                                                <td><?= $maintanance['mainteanance_estimatetime'];?></td>
                                                <td><?= $maintanance['status'];?></td>
                                                <td><a class="btn btn-success btn-sm" href="<?= base_url();?>admin/maintanance/done/<?= $maintanance['maintanance_id'];?>"><i class="uil-check-circle"></i></a> <a class="btn btn-danger btn-sm" href="<?= base_url();?>admin/maintanance/hapus/<?= $maintanance['maintanance_id'];?>"><i class="uil-trash-alt"></i></a></td>
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