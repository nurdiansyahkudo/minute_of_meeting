<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/jquery-ui-1.13.0/jquery-ui.css'); ?>">

    <!-- Timepicker library -->
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/jquery-timepicker-1.3.5/jquery.timepicker.min.css'); ?>">

    <!-- jquery Select2  -->
    <link href="<?php echo base_url('assets/css/select2.min.css')?>" rel="stylesheet" />

</head>
<body>      
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"> <i class="far fa-newspaper"></i><?= $title; ?></h1>
            


                 <!-- Basic Card Example -->
                 <div class="card shadow mb-4">
                    <div class="card-header py-3">
                       <h6 class="m-0 font-weight-bold text-primary">Add</h6>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('MoM/simpanissue/'.$id) ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group"> <!-- Issues -->
                                <div class="col-md-14" style="width:50%">
                                    <label for="issues" class="font-weight-bold">Issues:</label>
                                    <input type="text" id="issues" name="issues" class="form-control" style="resize: none" placeholder="-- Issues --"></input>
                                </div>
                                <?= form_error('issues', '<small class="text-danger pl-3">', '</small>'); ?>
                                
                            </div>
                            <div class="form-group"> <!-- Action -->
                                <div class="col-md-14" style="width:50%">
                                    <label for="action" class="font-weight-bold">Action:</label>
                                    <input type="text" id="action" name="action" class="form-control" style="resize: none" placeholder="-- Action --"></input>
                                </div>
                                <?= form_error('action', '<small class="text-danger pl-3">', '</small>'); ?>
                                
                            </div>
                            <div class="form-group"> <!-- Output -->
                                <div class="col-md-14" style="width:50%">
                                    <label for="output" class="font-weight-bold">Output:</label>
                                    <input type="text" id="output" name="output" class="form-control" style="resize: none" placeholder="-- Output --"></input>
                                </div>
                                <?= form_error('output', '<small class="text-danger pl-3">', '</small>'); ?>
                                
                            </div>
                            <div class="form-group"> <!-- PIC -->
                                <div class="col-md-14" style="width:45%">                    
                                    <label for="" class="font-weight-bold">PIC:</label>
                                    <select id="pic" class="custom-select" name='pic'>
                                        <option value="">-- Personal In Charge --</option>
                                        <?php foreach ($pic as $rowPIC) { ?>
                                                <option value="<?=$rowPIC->EmployeeID?>"><?= $rowPIC->EmployeeName?></option>
                                            <?php } ?>            
                                    </select>
                                </div>
                                <?= form_error('pic', '<small class="text-danger pl-3">', '</small>'); ?>
                                
                            </div>
                            <div class="form-group">
                                <label for="date" class="font-weight-bold">Due Date:</label>
                                    <input type="date" id="duedate" name="duedate" class="form-control" style="width:20%" placeholder="-- Due Date --">
                                    <?= form_error('duedate', '<small class="text-danger pl-3">', '</small>'); ?>            
                            </div>
                            <div class="form-group"> <!-- Status -->
                                <div class="col-md-14" style="width:20%">                    
                                    <label for="" class="font-weight-bold">Status:</label>
                                    <select id="status" class="custom-select" name='status'>
                                        <option value="">-- Status --</option>
                                        <option value="open"> Open </option>
                                        <option value="closed"> Closed </option>            
                                    </select>
                                </div>
                                <?= form_error('status', '<small class="text-danger pl-3">', '</small>'); ?>
                                
                            </div>
                            


                <button type="submit" class="btn btn-success" name="submit_issue"><i class="fas fa-check-circle"></i>Submit</button>
                
                </form> 

                </div>
                </div>

        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

<!-- panggil jquery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="<?= base_url('assets/ckeditor/jquery/jquery-3.1.1.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/select2.min.js')?>"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> <!-- autosize textarea -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> <!-- delete table row -->

<!-- panggil ckeditor.js -->
<script src="<?= base_url('assets/ckeditor/ckeditor.js'); ?>"></script>
<!-- panggil adapter jquery ckeditor -->
<script src="<?= base_url('assets/ckeditor/adapters/jquery.js'); ?>"></script>
<!-- setup selector -->
<script>
    $('textarea.texteditor').ckeditor();
</script>

<!-- Textarea Autosize Content -->
<script type="text/javascript">
    $('#agenda').on('input', function () { 
        this.style.height = 'auto'; 
  
        this.style.height = (this.scrollHeight) + 'px'; 
    });
    $('#notes').on('input', function () { 
        this.style.height = 'auto'; 
  
        this.style.height = (this.scrollHeight) + 'px'; 
    }); 
</script>

<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
</script>



<!--load jquery-->
<script src="<?php echo base_url('assets/js/jquery-ui.js'); ?>"></script>
<script src="<?php echo base_url('assets/jquery-ui-1.13.0/jquery-ui.js'); ?>"></script>
<script src="<?php echo base_url('assets/jquery-timepicker-1.3.5/jquery.timepicker.min.js'); ?>"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

</body>
</html>  