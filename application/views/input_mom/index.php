        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><i class="far fa-newspaper"></i> <?= $title; ?></h1>
                <?php if($this->session->flashdata('pesan') == "Ditambah"): ?>
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
                <?php endif ?>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Meeting</h6>
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

                        <a href="<?= base_url('MoM/tambah');?>" class="btn btn-info btn-icon-split mb-3 mt-1">
                              <span class="icon text-white-50">
                              <i class="fas fa-plus-circle"></i>
                              </span>
                              <span class="text">Tambah</span>
                        </a>

                                  
                                    
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" name='dataTable' id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th style="width:3%">No.</th>
                                            <th style="width:5%">Jobsite</th>
                                            <th style="width:14%">Meeting</th>
                                            <th>Tempat</th>
                                            <th>Link</th>
                                            <th>Tanggal & Waktu</th>
                                            <th>Pemimpin</th>
                                            <th>Notulen</th>
                                            <th>Agenda</th>
                                            <th style="width:9%"></th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                    <!-- Cek lagi -->
                                        <?php $i=1;
                                        foreach($meet as $data) :?>
                                            <tr>
                                                <th class="align-middle text-center"><?=$i++?></th>
                                                    <td class="align-middle text-center"><?=$data['site']?></td>
                                                    <td class="align-middle"><?=$data['meeting_name']?></td>
                                                    <td class="align-middle"><?=$data['venue']?></td>
                                                    <td class="align-middle"><?=$data['link']?></td>
                                                    <td class="align-middle"><?=$data['meeting_date']?>&ensp;<?=$data['meeting_start']?>&ensp;<?=$data['meeting_end']?></td>
                                                    <td class="align-middle"><?=$data['chair']?></td>
                                                    <td class="align-middle"><?=$data['notulen']?></td>
                                                    <td class="align-middle"><?=substr($data['agenda'],0,60)?></td>
                                                    <td class="align-middle text-center">
                                                        <a href="<?= base_url('MoM/hapusdata/'.$data['meet_id']);?>" type="submit" name="delete" class="btn btn-info btn-icon-split mb-3 mt-1">
                                                            <span class="icon text-white-50">
                                                            <i class="fas fa-trash"></i>
                                                            </span>
                                                            
                                                        </a>
                                                        <a href="<?= base_url('MoM/editdata/'.$data['meet_id']);?>" name="edit" class="btn btn-info btn-icon-split mb-3 mt-1">
                                                            <span class="icon text-white-50">
                                                            <i class="far fa-edit"></i>
                                                            </span>
                                                            
                                                        </a>&nbsp;
                                                        <a href="<?= base_url('MoM/detaildata/'.$data['meet_id']);?>" name="detail" class="btn btn-info btn-icon-split mb-3 mt-1">
                                                            <span class="icon text-white-50">
                                                            <i class="fas fa-info"></i>
                                                            </span>
                                                            
                                                        </a>
                                                        <a href="<?= base_url('MoM/meeting_issues/'.$data['meet_id']);?>" name="issues" class="btn btn-info btn-icon-split mb-3 mt-1">
                                                            <span class="icon text-white-50">
                                                            <i class="fas fa-exclamation"></i>
                                                            </span>
                                                            
                                                        </a>
                                                    </td>
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