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

<section class="content">
    <div class="container-fluid">
    
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card" id="round"> 

                    <div class="row" style="padding: 20px">
                        <form action="<?php echo site_url('Berkas_C/uploadBerkas?id_proker=0');?>" method="POST" enctype="multipart/form-data" >
                         <div class="col-lg-6">
                          <div class="form-group">
                           <label class="control-label">Upload File</label>
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
                           <button type="submit" class="btn btn-primary">Upload</button>
                         </div>
                        
                        </form> 




                        <form action="<?php echo site_url('Berkas_C/uploadBerkas?id_proker=0');?>" method="POST" enctype="multipart/form-data" >
                         <div class="col-lg-6">
                          <div class="form-group">
                           <label class="control-label">Upload Khusus Lembar Pertanggung Jawaban (LPJ)</label>
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
                           <button type="submit" class="btn btn-primary">Upload</button>
                         </div>
                        
                        </form> 

                     </div>

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
                        <h2><strong>DAFTAR BERKAS FILE</strong></h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table id="refAng" class="table table-bordered table-striped table-hover js-basic-example dataTable round_edge">
                                <thead>
                                    <tr>
                                        <th>Nama File</th>
                                        <th>Di upload oleh</th>
                                        <th>Program kerja</th>
                                        <th>Tanggal di upload</th>
                                        <th>Kelola</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Nama File</th>
                                        <th>Di upload oleh</th>
                                        <th>Program kerja</th>
                                        <th>Tanggal di upload</th>
                                        <th>Kelola</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php 
                                        foreach($berkas_data as $bd){ 
                                            $idUser = $bd->id_user;
                                            $idProker = $bd->id_proker;
                                            $idToUser = $this->M_user->getUserNama($idUser);
                                            $idToProker = $this->M_proker->getProkerNama($idProker);
                                    ?>
                                    <tr>
                                        <td><?php echo $bd->berkas_nama; ?></td>
                                        <td><?php echo $idToUser['0']['user_nama']; ?></td>
                                        <td><?php 
                                            if ($idToProker['0']['proker_nama']) 
                                            {
                                                echo $idToProker['0']['proker_nama'];
                                            }
                                            else 
                                            {
                                                echo "<font color='red'>Umum</font>";
                                            }
                                         ?>    
                                        </td>
                                        <td><?php echo $bd->berkas_tanggal; ?></td>
                                        <td>
                                            <a href="<?php echo base_url('Berkas_C/download?name='.$bd->berkas_nama) ?>"><button button class="btn btn-info" id="round">Unduh</button></a>
                                        </td>
                                    </tr>
                                    <?php } ?>      
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

<script type="text/javascript">

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
</script>