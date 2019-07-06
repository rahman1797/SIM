     <?php error_reporting(0); ?>

      <section class="content">
        <div class="container-fluid">
        
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card" id="round">
                        
                        
                        



                        <form action="<?php echo site_url('upload/do_upload');?>" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label for="exampleInputEmail1">Title</label>
                <input type="text" class="form-control" name="title" placeholder="Title">
              </div>
     
              <div class="form-group">
                <label for="exampleInputFile">File input</label>
                <input type="file" class="dropify" name="filefoto" data-height="300">
                 
              </div>
 
              <button type="submit" class="btn btn-primary">Upload</button>
            </form>
















                    </div>
                 </div> 
            </div>
            <!-- #END# Basic Examples -->
        </div>
    </section>



<!-- Modal Tambah Anggota -->
            <div class="modal fade" id="ModalProkerPosisi" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content" id="round">
                       <center>
                        <div class="modal-body">
                              <!-- Form Angggota -->
                                <form id="form_validation" name="formProkerPosisi" class="formProkerPosisi" method="POST" style="margin: 20px" onsubmit="return submitProkerPosisi()">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="prokerPosisi_nama" id="ProkerPosisi_nama" required>
                                            <label class="form-label">Nama Posisi Kepanitiaan</label>
                                        </div>
                                    </div>
                                     <input type="hidden" name="id_proker" value="<?php echo $_GET['id_proker'] ?>">
                                    <button class="btn btn-primary waves-effect btn-lg" type="submit" id="round">Simpan</button>
                                </form>

                            <!-- #END# Form Anggota -->
                        </div>
                        </center>
                    </div>
                </div>
            </div>





<script type="text/javascript">

    $(document).ready(function(){
        $('.dropify').dropify();
    });

     function submitProkerPosisi() {

         var data = $('.formProkerPosisi').serialize();
                  
            $.ajax({
                type: 'POST',
                data: data,
                url: "<?php echo base_url('Proker_C/addProkerPosisi') ?>",
                success: function() {
                    Swal.fire({
                      position: 'top-end',
                      type: 'success',
                      title: 'Berhasil Posisi Kepanitiaan Proker',
                      showConfirmButton: false,
                      timer: 1500
                    }).then(function(){
                        $('#refProkerPosisi').load(document.URL +  ' #refProkerPosisi');
                    })     
                }
            });
            
            return false;
        }

         function delConfirm()
            {
                job = confirm("Are you sure to delete permanently?");
                
                if(job != true)
                {
                    return false;
                }
            }


            Dropzone.options.fileupload = {
      acceptedFiles: 'image/*',
      maxFilesize: 1 // MB
    };
</script>

