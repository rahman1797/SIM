<?php error_reporting(0); ?>

      <section class="content">
        <div class="container-fluid">
        
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card" id="round">
                        <div class="header" align="center">
                            <h2><strong>DAFTAR TUGAS DAN CATATAN</strong></h2>
                            <p></p>
                            <button class="btn btn-lg btn-info waves-effect" data-toggle="modal" data-target="#ModalProkerAnggota" id="round">Tambah Tugas/Catatan</button>  
                        </div>
                        
                        <div class="body">
                            <div class="table-responsive">
                                <table id="refProkerTugas" class="table table-bordered table-striped table-hover js-basic-example dataTable round_edge">
                                    <thead>
                                        <tr>
                                            <th>Deskripsi Tugas</th>
                                            <th>Penanggung Jawab</th>
                                            <th>Kelola</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Deskripsi Tugas</th>
                                            <th>Penaggung Jawab</th>
                                            <th>Kelola</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                        <?php 
                                       
                                            foreach($proker_tugas as $pa){ 
                                            $idProker = $pa->id_proker;
                                            $idUser = $pa->id_user;
                                            $id_tugas = $pa->prokerTugas_ID;
                                            $idToProker = $this->M_proker->getProkerNama($idProker);
                                            $idToNama = $this->M_user->getUserNama($idUser);
                                            ?>
                                            <tr>
                                                
                                                <td><?php echo $pa->prokerTugas_deskripsi; ?></td>
                                                <td><?php if ($idToNama['0']['user_nama'] == NULL) 
                                                          {
                                                                echo "Tidak Ada PJ";
                                                          }
                                                          else 
                                                          {
                                                                echo $idToNama['0']['user_nama'];
                                                          }
                                                 ?> </td>
                                                <td>
                                                    <a href="<?php echo site_url();?>/Proker_C/delProkerTugas/<?php print($id_tugas);?>"><button class="btn btn-danger" id="round" onclick="return delConfirm()">Delete</button></a>
                                                </td>
                                            </tr>
                                        <?php } 
                                             echo "<div class='alert alert-warning' id='round'>Pendaftaran Anggota Kepanitiaan Untuk Program Kerja <font size='5'>".$idToProker['0']['proker_nama']."</font></div>";
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
            <div class="modal fade" id="ModalProkerAnggota" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content" id="round">
                       <center>
                        <div class="modal-body">
                              <!-- Form Angggota -->
                              <div class="alert alert-warning" id="round">
                                  <strong>Informasi!</strong> Penanggung Jawab tidak wajib untuk di pilih.
                                </div>
                                <form id="form_validation" name="formProkerTugas" class="formProkerTugas" method="POST" style="margin: 20px" onsubmit="return submitProkerTugas()">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <select class="form-control show-tick" name="prokerTugas_pj">
                                                <option value="">-- Penanggung Jawab --</option>
                                                <?php 
                                                    foreach ($anggota_data as $ad) {
                                                        $idToNama = $this->M_user->getUserNama($ad->id_user);
                                                        echo "<option value='$ad->id_user'>".$idToNama['0']['user_nama'] ."</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <textarea class="form-control" name="prokerTugas_deskripsi"></textarea>
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

     function submitProkerTugas() {

         var data = $('.formProkerTugas').serialize();
                  
            $.ajax({
                type: 'POST',
                data: data,
                url: "<?php echo base_url('Proker_C/addProkerTugas') ?>",
                success: function() {
                    Swal.fire({
                      position: 'top-end',
                      type: 'success',
                      title: 'Berhasil Menambah Catatan/Tugas',
                      showConfirmButton: false,
                      timer: 1500
                    }).then(function(){
                        $('#refProkerTugas').load(document.URL +  ' #refProkerTugas');
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