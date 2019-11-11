<?php $idToProker = $this->M_proker->getProkerNama($_GET['id_proker']);?>

    <section class="content">
        <div class="container-fluid">
        
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card" id="round">
                        <div class="header" align="center">

                            <h2><strong>DAFTAR KEPANITIAAN</strong></h2>
                            <p></p>

                            <?php if ($idToProker['0']['proker_lembaga'] == $_SESSION['user_role']) { ?>


                            <?php if ($idToProker['0']['proker_tahun'] == $_SESSION['user_tahun']) { ?>
                            <button class="btn btn-lg btn-info waves-effect" data-toggle="modal" data-target="#ModalProkerPosisi" id="round"><i class="material-icons">group_add</i> Posisi Kepanitiaan</button>  
                            <?php } ?>


                            <?php } ?>
                        </div>
                        
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable round_edge" id="refProkerPosisi">
                                    <thead>
                                        <tr>
                                            <th>Posisi Terdaftar</th>
                                            <th>Kelola</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Posisi Terdaftar</th>
                                            <th>Kelola</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                        <?php 
                                       
                                            foreach($proker_posisi as $pp){ 
                                            $idProker = $pp->id_proker;
                                            $id_posisi = $pp->prokerPosisi_ID;
                                            // $idToProker = $this->M_proker->getProkerNama($idProker);

                                            ?>
                                            <tr>                
                                                <td><?php echo $pp->prokerPosisi_nama ?></td>
                                                
                                                <td>
                                                    <?php if ($idToProker['0']['proker_lembaga'] == $_SESSION['user_role']) { ?>
                                                        <?php if ($idToProker['0']['proker_tahun'] == $_SESSION['user_tahun']) { ?>
                                                    <a href="<?php echo site_url();?>/Proker_C/delProkerPosisi/<?php print($id_posisi);?>"><button class="btn btn-danger" id="round" onclick="return delConfirm()"><i class="material-icons">delete_forever</i></button></a>
                                                     <?php } 
                                                            else {
                                                                echo "Locked";
                                                            }
                                                        ?>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                        <?php } 
                                             echo "<div class='alert alert-warning' id='round'>Pendaftaran Struktur Kepanitiaan Untuk Program Kerja <font size='5'>".$idToProker['0']['proker_nama']."</font></div>";
                                        ?>
                                 
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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<script type="text/javascript">

    //

        document.getElementById("round").style.visibility = "collapse";
    
    


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
</script>