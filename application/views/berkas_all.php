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
<?php $data_opmawa_user = $this->M_sys->getOpmawaData($_SESSION['user_opmawa']); ?>
<section class="content">
    <div class="container-fluid">
    
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card" id="round"> 

                     <center>                      
                          <div class="row" style="padding: 20px">
                            <div class="alert alert-warning" id="round">
                              Sebelum mengupload berkas, disarankan untuk me-rename file yang akan di upload agar mempermudah proses pencarian kembali.
                            </div>
                            <div class="col-lg-4">
                              <button class="btn btn-lg btn-info waves-effect" data-toggle="modal" data-target="#ModalUmum" id="round"><i class="material-icons">library_add</i> Berkas non-LPJ</button>  
                            </div>
                            <div class="col-lg-4">
                              <button class="btn btn-lg btn-info waves-effect" data-toggle="modal" data-target="#ModalLpj" id="round"><i class="material-icons">library_add</i> Berkas LPJ</button>
                            </div>
                            <div class="col-lg-4">
                              <button class="btn btn-lg btn-info waves-effect" data-toggle="modal" data-target="#ModalLink" id="round"><i class="material-icons">library_add</i> Link</button>
                            </div>                                                                  
                          </div>
                        </center>

                    <!-- <form action="<?php echo site_url('Berkas_C/uploadBerkas') ?>" method="post" enctype="multipart/form-data" name="userfile">
                      <div class="form-group">
                        <label for="userfile">Upload berkas berupa file</label>
                        <input type="file" class="form-control-file" name="userfile" id="userfile">
                      </div>
                      <button type="submit" class="btn btn-primary">Upload</button>
                    </form> -->


                </div>
             </div> 

             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card" id="round">
                    <div class="header" align="center">
                        <h2><strong>DAFTAR BERKAS FILE PROKER</strong></h2>
                    </div>

                    <div class="body">
                        <div class="row">
                            <center>
                                <?php 
                                
                                foreach($proker_data as $pd){ 

                                   $data_opmawa_proker = $this->M_sys->getOpmawaData($pd->id_opmawa);
                                        
                                    // Memfilter opmawa berdasarkan tingkatan level dan prodi
                                    if ($data_opmawa_user["0"]["opmawa_level"] == $data_opmawa_proker["0"]["opmawa_level"]) {

                                    $date = date_create($pd->proker_tanggal);
                                    $id_proker = $pd->proker_ID;
                                    $jumlah = $this->M_berkas->JumlahBerkasAll($id_proker); ?>
                                <a href="<?php echo base_url('Berkas_C/proker?id_proker='.$id_proker) ?>">
                                    <div class="col-lg-3">

                                        <div style="cursor: pointer;" class="info-box bg-orange hover-zoom-effect" id="round">
                                            <div class="icon">
                                                <i class="material-icons">description</i>
                                            </div>
                                            <div class="content">
                                                <div class="text"> <?= $pd->proker_nama; ?> </div>
                                                <div class="number count-to" data-from="0" data-to="<?= $jumlah; ?>" data-speed="1000" data-fresh-interval="20"></div>
                                            </div>
                                        </div>                                  
                                    </div>

                                    <?php } } ?>
                                </a>
                            </center>
                        </div>    
                    </div>
                    
                    <div class="header" align="center">
                        <h2><strong>DAFTAR BERKAS NON PROKER</strong></h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table id="refBerkas" class="table table-bordered table-striped table-hover js-basic-example dataTable round_edge">
                                <thead>
                                    <tr>
                                        <th>Nama File / Link</th>
                                        <th>Di upload oleh</th>
                                      <!--   <th>Program kerja</th> -->
                                        <th>Tanggal di upload</th>
                                        <th>Kelola</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Nama File</th>
                                        <th>Di upload oleh</th>
                                       <!--  <th>Program kerja</th> -->
                                        <th>Tanggal di upload</th>
                                        <th>Kelola</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php 
                                        foreach($berkas_data as $bd){ 
                                            
                                            $data_opmawa_berkas = $this->M_sys->getOpmawaData($bd->id_opmawa);
                                        
                                            // Memfilter opmawa berdasarkan tingkatan level dan prodi
                                            if ($data_opmawa_user["0"]["opmawa_level"] == $data_opmawa_berkas["0"]["opmawa_level"]) {

                                            $idUser = $bd->id_user;
                                            $idProker = $bd->id_proker;
                                            $idToUser = $this->M_user->getUserNama($idUser);
                                            $idToProker = $this->M_proker->getProkerNama($idProker);
                                            if ($idProker == '0') { ?>
                                    <?php if ($bd->berkas_jenis == 'lpj') {      
                                                echo "<tr style='background-color: #13fc03'>";
                                             } 
                                              else {
                                                echo "<tr>";
                                              }
                                            ?>
                                        <td><?php echo $bd->berkas_nama; ?></td>
                                        <td><?php echo $idToUser['0']['user_nama']; ?></td>
                                        <!-- <td><?php 
                                            if ($idToProker['0']['proker_nama']) 
                                            {
                                                echo $idToProker['0']['proker_nama'];
                                            }
                                            else 
                                            {
                                                echo "<font color='red'>Umum</font>";
                                            }
                                         ?>    
                                        </td> -->
                                        <td><?php echo $bd->berkas_tanggal; ?></td>
                                        <td>
                                            <?php 
                                                if($bd->berkas_jenis != 'link') { ?>
                                                  
                                                  <a href="<?php echo base_url('Berkas_C/download?name='.$bd->berkas_nama) ?>"><button button class="btn btn-info" id="round"><i class="material-icons">cloud_download</i></button></a>
                                                 
                                                <?php }
                                           
                                                if ($idUser == $_SESSION['user_ID']) {

                                                  if ($bd->berkas_jenis == 'link') { ?>
                                                    <button class="btn btn-danger" value="<?php echo $bd->berkas_ID ?>" id="round" onclick="return konfirmasiHapus_link(this.value)"><i class="material-icons">delete_forever</i></button>
                                                  <?php }

                                                  elseif ($bd->berkas_jenis != 'link') { ?>

                                                     <button class="btn btn-danger" value="<?php echo $bd->berkas_ID ?>" id="round" onclick="return konfirmasiHapus(this.value)"><i class="material-icons">delete_forever</i></button>
                                                  
                                                  <?php } 
                                                }
                                                
                                                else {
                                                    echo "<button class='btn btn-danger' id='round' disabled><i class='material-icons'>delete_forever</i></button>";
                                                }
                                             ?> 

                                        </td>
                                    </tr>
                                    <?php   } }
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
                    <input type="hidden" name="id_proker" value="0">
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
                    <input type="hidden" name="id_proker" value="0">
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
                <!-- <form id="form_validation" name="formLink" class="formLink" action="<?php echo site_url('Berkas_C/berkas_link?id_proker=');?>" method="POST" > -->

                <form id="form_validation" name="formLink" class="formLink" onsubmit="return submit_link()" method="POST" >
                  <div class="form-group form-float">
                      <div class="form-line">
                          <input type="text" class="form-control" name="berkas_nama" id="link" required>
                          <label class="form-label">Masukan link</label>
                      </div>
                  </div>
                  <input type="hidden" name="id_proker" value="<?php echo '0' ?>">
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


function konfirmasiHapus(id)
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
            url: "<?php echo base_url('Berkas_C/delBerkas/') ?>" + id,
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