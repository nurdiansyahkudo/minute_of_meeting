        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><i class="far fa-newspaper"></i> <?= $title; ?></h1>
                
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Meeting Issues</h6>
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

                        <a href="<?= base_url('MoM/addIssues/'.$id);?>" class="btn btn-info btn-icon-split mb-3 mt-1">
                              <span class="icon text-white-50">
                              <i class="fas fa-plus-circle"></i>
                              </span>
                              <span class="text">Tambah</span>
                        </a>

                                  
                                    
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" name='issueTable' id="issueTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th style="width:3%">No.</th>
                                            <th style="">Issues</th>
                                            <th style="">Action</th>
                                            <th>Output</th>
                                            <th>PIC</th>
                                            <th>Due Date</th>
                                            <th>Status</th>
                                            <th>Action Date</th>
                                            <th style="width:5%"></th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                    <?php $i=1;
                                    foreach($issue as $data) :?>
                                        <tr>
                                            <th class="align-middle text-center"><?=$i++?></th>
                                                <td class="align-middle"><?=$data['issues']?></td>
                                                <td class="align-middle"><?=$data['action']?></td>
                                                <td class="align-middle"><?=$data['output']?></td>
                                                <td class="align-middle"><?=$data['EmployeeName']?></td>
                                                <td class="align-middle"><?=$data['due_date']?></td>
                                                <td class="align-middle"><?=$data['status']?></td>
                                                <td class="align-middle"><?=$data['action_date']?></td>
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