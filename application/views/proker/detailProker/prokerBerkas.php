  <style type="text/css">
    .box-header {
      padding: 10px;
      margin-bottom: 10px;
    }
    .box-tools {
      right: 10px;
      top: 5px;
    }
    .dropzone-wrapper {
    
      border: 2px dashed #91b0b3;
      color: #92b0b3;
      position: relative;
      height: 150px;
    }
    .dropzone-desc {
      position: absolute;
      margin: 0 auto;
      left: 0;
      right: 0;
      text-align: center;
      width: 40%;
      top: 50px;
      font-size: 16px;
    }
    .dropzone,
    .dropzone:focus {
      outline: none !important;
      width: 100%;
      height: 150px;
      cursor: pointer;
      opacity: 0;
    }
    .dropzone-wrapper:hover,
    .dropzone-wrapper.dragover {
      background: #ecf0f5;
    }
    .preview-zone {
      text-align: center;
    }
    .preview-zone .box {
      box-shadow: none;
      border-radius: 0;
      margin-bottom: 0;
    }
  </style>



  <?php $idToProker = $this->M_proker->getProkerNama($_GET['id_proker']);?>
    <section class="content">
        <div class="container-fluid">
        
            <!-- Basic Examples -->
            <div class="row clearfix">
              

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <?php if ($idToProker['0']['proker_tahun'] == $_SESSION['user_tahun']) { ?>
                    <div class="card" id="round">
                      <div class="header" align="center">
                        <h2><strong>Form upload berkas dan link</strong></h2>
                      </div>

                        <center>
                          <div class="row" style="padding: 20px">
                            <div class="col-lg-4 col-sm-4">
                              <button class="btn btn-lg btn-info waves-effect" data-toggle="modal" data-target="#ModalUmum" id="round"><i class="material-icons">library_add</i> Berkas non-LPJ</button>  
                            </div>
                            <div class="col-lg-4 col-sm-4">
                              <button class="btn btn-lg btn-info waves-effect" data-toggle="modal" data-target="#ModalLpj" id="round"><i class="material-icons">library_add</i> Berkas LPJ</button>
                            </div>
                            <div class="col-lg-4 col-sm-4">
                              <button class="btn btn-lg btn-info waves-effect" data-toggle="modal" data-target="#ModalLink" id="round"><i class="material-icons">library_add</i> Link</button>
                            </div>                                                                  
                          </div>
                        </center>
                          
                                                
                    </div>
                    <?php } ?>
                 </div> 

                 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card" id="round">
                      
                            <div class="dropdown" align="center">
                              <button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown" style="width: 100%; background-color: #FF9800 !important">Kelola lainnya
                              <span class="caret"></span></button>
                              <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url('Proker_C/prokerTugas?id_proker='.$_GET['id_proker']) ?>">Daftar Tugas</a></li>
                                <li><a href="<?php echo base_url('Proker_C/prokerAnggota?id_proker='.$_GET['id_proker']) ?>">Daftar Anggota Panitia</a></li>
                                <li><a href="<?php echo base_url('Berkas_C/proker?id_proker='.$_GET['id_proker']) ?>">Dokumen/berkas</a></li>
                                <li><a href="<?php echo base_url('Keuangan_C/index?id_proker='.$_GET['id_proker']) ?>">Keuangan</a></li>
                                <li><a href="<?php echo base_url('Proker_C/prokerPosisi?id_proker='.$_GET['id_proker']) ?>">Posisi Kepanitiaan</a></li>
                                <li><a href="<?php echo base_url('Proker_C/prokerEvaluasi?id_proker='.$_GET['id_proker']) ?>">Evaluasi</a></li>
                              </ul>
                            </div>
                        
                        <div class="header" align="center">
                            <h2><strong>BERKAS (FILE) PROGRAM KERJA</strong></h2>
                            <?php echo $idToProker['0']['proker_nama']; ?>
                        </div>       
                        <div class="body">
                            <div class="table-responsive">
                                <table id="refBerkas" class="table table-bordered table-striped table-hover js-basic-example dataTable round_edge">
                                    <thead>
                                        <tr>
                                            <th>Nama / Link</th>
                                            <th>Oleh</th>
                                            <th>Tanggal</th>
                                            <th>Kelola</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nama / Link</th>
                                            <th>Oleh</th>
                                            <th>Tanggal</th>
                                            <th>Kelola</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                        <?php                     
                                            foreach($berkas_data as $bd){ 
                                                $idUser = $bd->id_user;
                                                $idProker = $bd->id_proker;
                                                $idToUser = $this->M_user->getUserNama($idUser);
                                            
                                                if ($idProker == $_GET['id_proker']) {           
                                                
                                            ?>

                                            <?php if ($bd->berkas_jenis == 'lpj') {      
                                                echo "<tr style='background-color: #13fc03'>";
                                             } 
                                              else {
                                                echo "<tr>";
                                              }
                                            ?>

                                                <td><?php echo $bd->berkas_nama; ?>
                                                   
                                                    
                                                </td>
                                                <td><?php echo $idToUser['0']['user_nama']; ?></td>           
                                                <td><?php echo $bd->berkas_tanggal; ?></td>           
                                                <td>
                                                    <?php 
                                                    if($bd->berkas_jenis != 'link') { ?>
                                                      
                                                      <a href="<?php echo base_url('Berkas_C/download?name='.$bd->berkas_nama.'&id_proker='.$idProker) ?>"><button button class="btn btn-info" id="round"><i class="material-icons">cloud_download</i></button></a>
                                                     
                                                    <?php }

                                                    if ($idUser == $_SESSION['user_ID']) {

                                                      if ($bd->berkas_jenis == 'link') { ?>
                                                        <button class="btn btn-danger" value="<?php echo $bd->berkas_ID ?>" id="round" onclick="return konfirmasiHapus_link(this.value)"><i class="material-icons">delete_forever</i></button>
                                                      <?php }

                                                      elseif ($bd->berkas_jenis != 'link') { ?>

                                                         <button class="btn btn-danger" value="<?php echo $bd->berkas_ID ?>" id="round" onclick="return konfirmasiHapus(this.value, <?= $idProker ?>)"><i class="material-icons">delete_forever</i></button>
                                                      
                                                      <?php } 
                                                    }
                                                    
                                                    else {
                                                        echo "<button class='btn btn-danger' id='round' disabled><i class='material-icons'>delete_forever</i></button>";
                                                    }
                                                 ?>                        
                                                </td>
                                            </tr>
                                    
                                        <?php } 

                                          } ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                 </div>

            </div>
            <!-- #END# Basic Examples -->
        </div>
    </section>



<!-- Modal Area -->
<div class="modal fade" id="ModalUmum" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content" id="round">
           <center>
            <div class="modal-body">
                  <!-- Form Berkas Umum -->
              <div class="alert alert-warning" id="round">
                  <strong>Informasi!</strong> Form peng-inputan dokumen / berkas non-LPJ.
              </div>
                
              <div class="row" style="padding: 20px">
                <form action="<?php echo site_url('Berkas_C/uploadBerkas?id_proker='.$_GET['id_proker']);?>" method="POST" enctype="multipart/form-data" >
                 <div class="col-lg-12">
                  <div class="form-group">
                   <div class="preview-zone hidden">
                    <div class="box box-solid">
                     <div class="box-header with-border">
                     
                      <div class="box-tools pull-right">
                       <button type="button" class="btn btn-danger btn-xs remove-preview">
                        <i class="material-icons">autorenew</i> Reset
                       </button>
                      </div>
                     </div>
                     <div class="box-body"></div>
                    </div>
                   </div>
                   <div class="dropzone-wrapper">
                    <div class="dropzone-desc">
                     <i class="glyphicon glyphicon-download-alt"></i>
                     <p>Pilih file yang akan di upload.</p>
                    </div>
                    <input type="file" name="userfile" class="dropzone" id="userfile">
                    <input type="hidden" name="id_proker" value="<?php $_GET['id_proker'] ?>">
                    <input type="hidden" name="berkas_jenis" value="umum">
                   </div>
                  </div>
                   <button type="submit" class="btn btn-primary" id="round">Upload</button>
                 </div>
                </form> 
              </div>

                <!-- #END# Form Berkas Umum -->
            </div>
            </center>
        </div>
    </div>
</div>
<!-- #END# Modal Area -->


<!-- Modal Area -->
<div class="modal fade" id="ModalLpj" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content" id="round">
           <center>
            <div class="modal-body">
                  <!-- Form Berkas Umum -->
              <div class="alert alert-warning" id="round">
                  <strong>Informasi!</strong> Form peng-inputan dokumen / berkas khusus LPJ.
              </div>
                
              <div class="row" style="padding: 20px">
                <form action="<?php echo site_url('Berkas_C/uploadBerkas?id_proker='.$_GET['id_proker']);?>" method="POST" enctype="multipart/form-data" >
                 <div class="col-lg-12">
                  <div class="form-group">
                   <div class="preview-zone hidden">
                    <div class="box box-solid">
                     <div class="box-header with-border">
                     
                      <div class="box-tools pull-right">
                       <button type="button" class="btn btn-danger btn-xs remove-preview">
                        <i class="material-icons">autorenew</i> Reset
                       </button>
                      </div>
                     </div>
                     <div class="box-body"></div>
                    </div>
                   </div>
                   <div class="dropzone-wrapper">
                    <div class="dropzone-desc">
                     <i class="glyphicon glyphicon-download-alt"></i>
                     <p>Pilih file LPJ yang akan di upload.</p>
                    </div>
                    <input type="file" name="userfile" class="dropzone" id="userfile">
                    <input type="hidden" name="id_proker" value="<?php $_GET['id_proker'] ?>">
                    <input type="hidden" name="berkas_jenis" value="lpj">
                   </div>
                  </div>
                   <button type="submit" class="btn btn-primary" id="round">Upload</button>
                 </div>
                </form>  
              </div>

                <!-- #END# Form Berkas Umum -->
            </div>
            </center>
        </div>
    </div>
</div>
<!-- #END# Modal Area -->



<!-- Modal Area -->
<div class="modal fade" id="ModalLink" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content" id="round">
           <center>
            <div class="modal-body">
                  <!-- Form Berkas Umum -->
              <div class="alert alert-warning" id="round">
                  <strong>Informasi!</strong> Form peng-inputan dokumen / berkas dalam bentuk link.
              </div>
                
              <div class="row" style="padding: 20px">
                <!-- <form id="form_validation" name="formLink" class="formLink" action="<?php echo site_url('Berkas_C/berkas_link?id_proker='.$_GET['id_proker']);?>" method="POST" > -->

                  <form id="form_validation" name="formLink" class="formLink" onsubmit="return submit_link()" method="POST" >
                  <div class="form-group form-float">
                      <div class="form-line">
                          <input type="text" class="form-control" name="berkas_nama" id="link" required>
                          <label class="form-label">Masukan link</label>
                      </div>
                  </div>
                  <input type="hidden" name="id_proker" value="<?php echo $_GET['id_proker'] ?>">
                  <input type="hidden" name="berkas_jenis" value="link">
                  <button class="btn btn-primary waves-effect btn-lg" type="submit" id="round">Simpan</button>
                </form>  
              </div>

                <!-- #END# Form Berkas Umum -->
            </div>
            </center>
        </div>
    </div>
</div>
<!-- #END# Modal Area -->


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<script type="text/javascript">

function submit_link(){
  var data = $('.formLink').serialize();
         
  $.ajax({
      type: 'POST',
      data: data,
      url: "<?php echo base_url('Berkas_C/berkas_link') ?>",
      success: function() {
          Swal.fire({
            position: 'top-end',
            type: 'success',
            title: 'Berhasil Menambah Link',
            showConfirmButton: false,
            timer: 1500
          }).then(function(){
              $('#refBerkas').load(document.URL +  ' #refBerkas');
          })     
      }
  });
  
  return false;
}

function readFile(input) {
   if (input.files && input.files[0]) {
   var reader = new FileReader();
   
   reader.onload = function (e) {
   var htmlPreview = input.files[0].name;
   var wrapperZone = $(input).parent();
   var previewZone = $(input).parent().parent().find('.preview-zone');
   var boxZone = $(input).parent().parent().find('.preview-zone').find('.box').find('.box-body');
   
   wrapperZone.removeClass('dragover');
   previewZone.removeClass('hidden');
   boxZone.empty();
   boxZone.append(htmlPreview);
   };
   
 reader.readAsDataURL(input.files[0]);
 }
}

function reset(e) {
   e.wrap('<form>').closest('form').get(0).reset();
   e.unwrap();
}

$(".dropzone").change(function(){
 readFile(this);
});
$('.dropzone-wrapper').on('dragover', function(e) {
 e.preventDefault();
 e.stopPropagation();
 $(this).addClass('dragover');
});
$('.dropzone-wrapper').on('dragleave', function(e) {
 e.preventDefault();
 e.stopPropagation();
 $(this).removeClass('dragover');
});
$('.remove-preview').on('click', function() {
 var boxZone = $(this).parents('.preview-zone').find('.box-body');
 var previewZone = $(this).parents('.preview-zone');
 var dropzone = $(this).parents('.form-group').find('.dropzone');
 boxZone.empty();
 previewZone.addClass('hidden');
 reset(dropzone);
});



function konfirmasiHapus(id, id_proker)
{

    job = confirm("Are you sure to delete permanently?");

    alert(id);
    
    if(job != true)
    {
        return false;
    }

    else
    {   
        $.ajax({
            data: [id, id_proker],
            type: "GET",
            url: "<?php echo base_url('Berkas_C/delBerkas/') ?>" + id + "?id_proker=" + id_proker,
            success: function(data){
                Swal.fire({
                  position: 'top-end',
                  type: 'success',
                  title: 'Berhasil Menghapus Berkas',
                  showConfirmButton: false,
                  timer: 1200
                }).then(function(){
                    $('#refBerkas').load(document.URL +  ' #refBerkas');
                }) 
              },
              error: function(data){
                alert('Failed deleting data ');
              }
        })
    }
}


function konfirmasiHapus_link(id)
{

    job = confirm("Are you sure to delete permanently?");
    
    if(job != true)
    {
        return false;
    }

    else
    {   
        $.ajax({
            data: id,
            type: "GET",
            url: "<?php echo base_url('Berkas_C/delLink/') ?>" + id,
            success: function(data){
                Swal.fire({
                  position: 'top-end',
                  type: 'success',
                  title: 'Berhasil Menghapus Link',
                  showConfirmButton: false,
                  timer: 1200
                }).then(function(){
                    $('#refBerkas').load(document.URL +  ' #refBerkas');
                }) 
              },
              error: function(data){
                alert('Failed deleting data ');
              }
        })
    }
}
</script>

