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
                            <form action="" method="GET">
                            <!-- Right Sidebar -->
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row g-2">
                                        <div class="mb-3 col-md-4">
                                            <label for="inputPassword4" class="form-label">Departemen</label>
                                            <select name="departement" class="form-control">
                                                <option value="default">Default</option>
                                                <?php 
                                                    foreach($dataDepartment as $department){
                                                ?>
                                                <option value="<?= $department['department_id'];?>"><?= $department['department_title'];?></option>
                                                <?php
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="mb-3 col-md-4">
                                            <label for="inputPassword4" class="form-label">Posisi</label>
                                            <select name="posisi" class="form-control">
                                                <option value="default">Default</option>
                                                <?php 
                                                    foreach($dataJob as $job){
                                                ?>
                                                <option value="<?= $job['job_id'];?>"><?= $job['job_title'];?></option>
                                                <?php
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="mb-3 col-md-3">
                                            <label for="inputPassword4" class="form-label">Status</label>
                                            <select name="status" class="form-control">
                                                <option value="Active">Active</option>
                                                <option value="Archive">Archive</option>
                                            </select>
                                        </div>
                                        <div class="mb-3 col-md-1" style="padding-top:30px;">
                                            <button type="submit" class="btn btn-primary">Sorting</button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            </form>
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                    <div class="col-auto">
                                        <a href="<?= base_url();?>admin/karyawan/tambah" class="float-end btn btn-info btn-sm" id="btn-archive">Tambah <?= $pageTitle;?></a>
                                    </div>
                                    <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nama</th>
                                                <th>Perusahaan</th>
                                                <th>Departemen</th>
                                                <th>Posisi</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                                </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                foreach($dataKaryawan as $karyawan){
                                                $company = $this->karyawan_model->companybyId($karyawan['user_company'])->row_array();
                                                $department = $this->karyawan_model->departmentbyId($karyawan['user_department'])->row_array();
                                                $job = $this->karyawan_model->jobbyId($karyawan['user_jobtitle'])->row_array();
                                            ?>
                                            <tr>
                                                <td><?= $karyawan['user_idnumber'];?></td>
                                                <td><?= $karyawan['user_firstname'].' '.$karyawan['user_lastname'];?></td>
                                                <td><?= $company['company_title'];?></td>
                                                <td><?= $department['department_title'];?></td>
                                                <td><?= $job['job_title'];?></td>
                                                <td><?= $karyawan['user_status'];?></td>
                                                <th><a href="<?= base_url();?>admin/karyawan/detail/<?= $karyawan['user_id'];?>" class="btn btn-info btn-sm"><i class="mdi mdi-eye"></i> </a> <a href="<?= base_url();?>admin/karyawan/edit/<?= $karyawan['user_id'];?>" class="btn btn-warning btn-sm"><i class="mdi mdi-wrench"></i> </a> <a href="<?= base_url();?>admin/karyawan/hapus/<?= $karyawan['user_id'];?>" class="btn btn-danger btn-sm"><i class="mdi mdi-delete-empty-outline"></i> </a> </th>
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