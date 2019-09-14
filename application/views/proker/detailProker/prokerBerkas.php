

      <section class="content">
        <div class="container-fluid">
        
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card" id="round">
                        
                        


                        <form action="<?php echo site_url('Berkas_C/uploadBerkas?id_proker='.$_GET['id_proker']);?>" method="post" enctype="multipart/form-data" name="userfile">

              <!-- <div class="form-group">
                <label for="exampleInputEmail1">Title</label>
                <input type="text" class="form-control" name="title" placeholder="Title">
              </div> -->
     
              <div class="form-group">
                <label for="exampleInputFile">File input</label>
                <input type="file" name="userfile" id="userfile">
                <input type="hidden" name="id_proker" value="<?php $_GET['id_proker'] ?>">
                 
              </div>
 
              <button type="submit" class="btn btn-primary">Upload</button>
            </form>









                    </div>
                 </div> 

                 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card" id="round">
                        
                        
                    


                        <div class="header" align="center">
                            <h2><strong>DAFTAR BERKAS OPMAWA</strong></h2>
                       
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
                                                <td><?php if ($idToProker['0']['proker_nama']) 
                                                            {
                                                                echo $idToProker['0']['proker_nama'];
                                                            }
                                                            else 
                                                            {
                                                                echo "Umum";
                                                            }
                                                 ?>    
                                                </td>
                                                
                                                <td><?php echo $bd->berkas_tanggal; ?></td>
                                               
                                                <td>

                                                    <a href="<?php echo base_url('Berkas_C/download?name='.$bd->berkas_nama) ?>"><button button class="btn btn-info" id="round">Unduh</button></a>
                                                     
                                                    <?php if ($idToProker['0']['proker_tahun'] == $_SESSION['user_tahun']) { ?>
                                                         <a href="<?php echo site_url();?>/Berkas_C/delBerkas/<?php print($bd->berkas_ID);?>"><button class="btn btn-danger" id="round" onclick="return delConfirm()">Delete</button></a>
                                                 <?php } 
                                                    else {
                                                        echo "Locked";
                                                    }
                                                 ?>               
                                                   
                                         
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

