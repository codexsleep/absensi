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
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                    <div class="col-auto">
                                        <a href="<?= base_url();?>admin/karyawan/tambahdepartemen" class="float-end btn btn-info btn-sm" id="btn-archive">Tambah <?= $pageTitle;?></a>
                                    </div>
                                    <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nama Departemen</th>
                                                <th>Status Departemen</th>
                                                <th>Action</th>
                                                </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                foreach($dataDepartment as $departemen){
                                            ?>
                                            <tr>
                                                <td><?= $departemen['department_id'];?></td>
                                                <td><?= $departemen['department_title'];?></td>
                                                <td><?= $departemen['department_status'];?></td>
                                                <th><a href="<?= base_url();?>admin/karyawan?departement=<?= $departemen['department_id'];?>&posisi=default&status=Active" class="btn btn-info btn-sm"><i class="mdi mdi-eye"></i> </a> <a href="<?= base_url();?>admin/karyawan/editdepartemen/<?= $departemen['department_id'];?>" class="btn btn-warning btn-sm"><i class="mdi mdi-wrench"></i> </a> <a href="<?= base_url();?>admin/karyawan/hapusdepartemen/<?= $departemen['department_id'];?>" class="btn btn-danger btn-sm"><i class="mdi mdi-delete-empty-outline"></i> </a> </th>
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