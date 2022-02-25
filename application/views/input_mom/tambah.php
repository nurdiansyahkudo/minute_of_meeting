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
            <h1 class="h3 mb-4 text-gray-800"> <i class="far fa-newspaper"></i>  <?= $title; ?></h1>
            


                 <!-- Basic Card Example -->
                 <div class="card shadow mb-4">
                    <div class="card-header py-3">
                       <h6 class="m-0 font-weight-bold text-primary">Add Data Meeting</h6>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('MoM/simpandata'); ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <div class="col-md-14" style="width:15%">
                                    <label for="" class="font-weight-bold">Jobsite:</label>
                                    <select id="jobsite" name="jobsite" class="custom-select">
                                    <option value="">-- Pilih Site --</option>
                                        <?php 
                                        foreach ($site as $list){
                                        echo '<option value="'.$list->siteID.'">'.$list->siteID.', '.$list->siteName.'</option>';
                                        }
                                        ?>
                                    </select>    
                                </div>
                                <?= form_error('jobsite', '<small class="text-danger pl-3">', '</small>'); ?>
                                
                            </div>

                            <div class="form-group">
                                <div class="col-md-14" style="width:30%">                   
                                    <label for="" class="font-weight-bold">Meeting Name:</label>
                                    <select id="nama_meet" name='nama_meet' class="custom-select">
                                        <option value="">-- Jenis Meeting --</option>
                                    </select>
                                </div>
                                <?= form_error('nama_meet', '<small class="text-danger pl-3">', '</small>'); ?>
                                      
                            </div>

                            <div class="form-group">    
                                <input type="radio" onclick="javascript:onoffCheck();" name="isOnline" id="offCheck" value="0" checked>&ensp;Meeting Offline
                                &emsp;
                                <input type="radio" onclick="javascript:onoffCheck();" name="isOnline" id="onCheck" value="1">&ensp;Meeting Online
                            </div>
                            <div class="form-group" style="width:50%;display:none" id="typeLink">
                                <input type="text" id="linkzoom" name="linkzoom" class="form-control" style="resize: none" placeholder="--Masukkan Link--"></input>      
                                <?= form_error('linkzoom', '<small class="text-danger pl-3">', '</small>'); ?>
                                
                            </div>      

                            <div class="form-group" id="meetvenue">
                                <div class="col-md-14" style="width:50%">     
                                    <label for="" class="font-weight-bold">Tempat/Venue:</label>
                                    <select id="tempat" name="tempat" class="custom-select">
                                        <option value="">-- Pilih Ruangan --</option>
                                    </select>
                                </div>
                                <?= form_error('tempat', '<small class="text-danger pl-3">', '</small>'); ?>                  
                                
                            </div>

                            <div class="form-group"> 
                                <label for="date" class="font-weight-bold">Tanggal & Waktu/Date & Time:</label>
                                    <div class="input-group-prepend">
                                        <input type="date" id="date" name="tanggal" class="form-control" style="width:20%">
                                        <?= form_error('date', '<small class="text-danger pl-3">', '</small>'); ?>
                                        <input type="time" id="start_time" name="start" class="form-control" style="width:15%">
                                        <?= form_error('start_time', '<small class="text-danger pl-3">', '</small>'); ?>
                                        <input type="time" id="end_time" name="end" class="form-control" style="width:15%">
                                        <?= form_error('end_time', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                        
                            </div>

                            <div class="form-group">
                                <div class="col-md-14" style="width:45%">                    
                                    <label for="" class="font-weight-bold">Pemimpin Rapat / Chair:</label>
                                    <select id="leader" class="custom-select" name='leader'>
                                        <option value="">-- Pilih Pemimpin --</option>            
                                    </select>
                                </div>
                                <?= form_error('leader', '<small class="text-danger pl-3">', '</small>'); ?>
                                
                            </div>
                            
                            <div class="form-group">
                                <div class="col-md-14" style="width:45%">                    
                                    <label for="" class="font-weight-bold">Notulen:</label>
                                    <select id="notulen" name='notulen' class="custom-select">
                                        <option value="">-- Pilih Notulen --</option>
                                    </select>
                                </div>  
                                <?= form_error('notulen', '<small class="text-danger pl-3">', '</small>'); ?>
                                
                            </div>

                            <div class="form-group"> <!-- Snack (Belum berfungsi) -->
                                <label for="" class="font-weight-bold">Snack:</label>&ensp;    
                                    <input type="radio" name="snack" id="snackYes" value="0" checked>&ensp;IYA
                                    &emsp;
                                    <input type="radio" name="snack" id="snackNo" value="1">&ensp;TIDAK
                            </div>
                            
                            <div class="form-group">                    
                                <label for="agenda" class="font-weight-bold">Agenda:</label>
                                <textarea id="agenda" name="agenda" class="form-control" style="resize: none" rows="5"></textarea>      
                                <?= form_error('agenda', '<small class="text-danger pl-3">', '</small>'); ?>
                                
                            </div>
                        
                            <div class="form-group">                    
                                <label for="notes" class="font-weight-bold">Notes:</label>
                                <textarea id="notes" name="notes" class="form-control" style="resize: none" rows="5"></textarea>      
                                <?= form_error('notes', '<small class="text-danger pl-3">', '</small>'); ?>
                                
                            </div>

                            <div class="form-group">
                                <label for="" class="font-weight-bold">Peserta:</label>
                                    <div class="input-group-prepend">
                                        <div class="col-md-14" style="width:45%">                       
                                            <select id="entrant" name='entrant' class="custom-select">
                                                <option value="">-- Pilih Karyawan --</option>
                                            </select>
                                        </div>
                                        <?= form_error('entrant', '<small class="text-danger pl-3">', '</small>'); ?>
                                        &emsp;
                                        <button type="button" class="btn btn-success addlist">
                                            <i class="fas fa-plus-circle"></i>
                                        </button>
                                    </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" name='entTable' id="entTable" style="width:75%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                        
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>


                <button type="submit" class="btn btn-success" name="submit"><i class="fas fa-check-circle"></i>Submit</button>
                
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

<!-- Pemimpin & Notulen based on Jobsite -->
<script>
$(document).ready(function(){
    $('#jobsite').change(function(){
    var id = $(this).val();
    $.ajax({
        url:"<?=base_url('/mom/get_pemimpin');?>",
        method:"POST",
        dataType:"JSON",
        data:{
            id:id
        },
        success : function(array){
            var html = '';
            for(let index = 0; index < array.length; index++){
                 html += "<option>" + array[index].EmployeeName + "</option>"
            }
            $('#leader').html(html)
            $('#notulen').html(html)
        },
     })
    })
})
</script>

<!-- Peserta based on Jobsite -->
<script>
$(document).ready(function(){
    $('#jobsite').change(function(){
    var id = $(this).val();
    $.ajax({
        url:"<?=base_url('/mom/get_pemimpin');?>",
        method:"POST",
        dataType:"JSON",
        data:{
            id:id
        },
        success : function(array){
            var html = '';
            for(let index = 0; index < array.length; index++){
                 html += '<option value="'+array[index].EmployeeID+'">' + array[index].EmployeeName + '</option>';
            }
            $('#entrant').html(html)
        },
     })
    })
})
</script>

<!-- Venue based on Jobsite -->
<script>
$(document).ready(function(){
    $('#jobsite').change(function(){
    var id = $(this).val();
    $.ajax({
        url:"<?=base_url('/mom/get_venue');?>",
        method:"POST",
        dataType:"JSON",
        data:{
            id:id
        },
        success : function(array){
            var html = '';
            for(let index = 0; index < array.length; index++){
                 html += "<option>" + array[index].venue_name + "</option>"
            }
            $('#tempat').html(html)
        },
     })
    })
})
</script>

<!-- Meeting Type based on Jobsite -->
<script>
$(document).ready(function(){
    $('#jobsite').change(function(){
    var id = $(this).val();
    $.ajax({
        url:"<?=base_url('/mom/get_meet');?>",
        method:"POST",
        dataType:"JSON",
        data:{
            id:id
        },
        success : function(array){
            var html = '';
            for(let index = 0; index < array.length; index++){
                 html += "<option>" + array[index].meet_type_id + "</option>"
            }
            $('#nama_meet').html(html)
        },
     })
    })
})
</script>

<!-- Add list tabel entrant -->
<script>
    $(document).ready(function(){
        $(".addlist").click(function(){
            let selectedOption = $("#entrant option:selected");
            let name = selectedOption.text();
            let nik = selectedOption.val();
            let list = '<tr><input type="hidden" name="peserta[]" value="'+nik+'"/><td class="align-middle">' + nik + '</td><td class="align-middle">' + name + '</td><td class="align-middle" style="width:5%"><a id="delEnt" type="submit" name="delEnt" class="btn btn-info btn-icon-split mb-3 mt-1"><span class="icon text-white-50"><i class="fas fa-trash"></i></span></a></td></tr>';
            $("table tbody").append(list);
        });
    });
</script>

<!-- Delete Table Row (Form Tambah) -->
<script>
$(document).ready(function(){

 $("#entTable").on('click','#delEnt',function(){
       $(this).closest('tr').remove();
     });

});

</script>

<!--show venue or inputlink based on/off-->
<script>
function onoffCheck() {
    document.getElementById('linkzoom').value = "";
    if (document.getElementById('offCheck').checked) {
        document.getElementById('typeLink').style.display = 'none';
        document.getElementById('meetvenue').style.display = 'block';
    } else {
        document.getElementById('tempat').value = ""; 
        document.getElementById('typeLink').style.display = 'block'; 
        document.getElementById('meetvenue').style.display = 'none';
    }
}
</script>



<!--load jquery-->
<script src="<?php echo base_url('assets/js/jquery-ui.js'); ?>"></script>
<script src="<?php echo base_url('assets/jquery-ui-1.13.0/jquery-ui.js'); ?>"></script>
<script src="<?php echo base_url('assets/jquery-timepicker-1.3.5/jquery.timepicker.min.js'); ?>"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

</body>
</html>  