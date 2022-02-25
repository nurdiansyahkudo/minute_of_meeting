        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><i class="far fa-newspaper"></i> <?= $title; ?></h1>
                <!-- <?php if($this->session->flashdata('pesan') == "Ditambah"): ?>
                        <div class="alert alert-success" role="alert">
                        Data Berhasil Ditambah!
                        </div>
                <?php elseif($this->session->flashdata('pesan') == "Salahsimpan"): ?>
                        <div class="alert alert-success" role="alert">
                        Data Belum Lengkap!
                        </div>
                <?php elseif($this->session->flashdata('pesan') == "Salahubah"): ?>
                        <div class="alert alert-success" role="alert">
                        Data Belum Lengkap!
                        </div>
                <?php elseif($this->session->flashdata('pesan') == "Diubah"): ?>
                        <div class="alert alert-success" role="alert">
                        Data Berhasil Diubah!
                        </div>
                <?php elseif($this->session->flashdata('pesan') == "Dihapus"): ?>
                        <div class="alert alert-success" role="alert">
                        Data Berhasil Dihapus!
                        </div>
                <?php elseif($this->session->flashdata('pesan') == "Salahhapus"): ?>
                        <div class="alert alert-success" role="alert">
                        Data Masih Ada!
                        </div>
                <?php endif ?> -->

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h5 class="m-0 font-weight-bold text-primary"></h5>
                        </div>

                        <div class="row mt-2 ml-md-2 text-center">
                    <div class="col-md-1">

                     </div>
                    <div class="col-sm-10">
                        <?= form_error('image', '<div class="error">', '</div>'); ?>    
                        <?= $this->session->flashdata('message'); ?>
                    </div>
                </div> 
                        <div class="card-body">
                           <div class="table-responsive">
                                <table class="table table-bordered table-hover" name='dataTable' id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th style="width:3%">No.</th>
                                            <th style="">Issues</th>
                                            <th style="">Action</th>
                                            <th>Output</th>
                                            <th>PIC</th>
                                            <th>Due Date</th>
                                            <th>Status</th>
                                            <th style="width:5%"></th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                    <?php $i=1;
                                    foreach($dash as $data) :?>
                                        <tr>
                                            <th class="align-middle text-center"><?=$i++?></th>
                                                <td class="align-middle"><?=$data['issues']?></td>
                                                <td class="align-middle"><?=$data['action']?></td>
                                                <td class="align-middle"><?=$data['output']?></td>
                                                <td class="align-middle"><?=$data['EmployeeName']?></td>
                                                <td class="align-middle"><?=$data['due_date']?></td>
                                                <td class="align-middle"><?=$data['status']?></td>
                                                <td class="align-middle text-center">
                                                        <a href="<?= base_url('MoM/edit_issue/'.$data['meet_ID']);?>" type="submit" name="editIssue" class="btn btn-info btn-icon-split mb-3 mt-1">
                                                            <span class="icon text-white-50">
                                                            <i class="far fa-edit"></i>
                                                            </span>
                                                            
                                                        </a>
                                        </tr>
                                    <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->