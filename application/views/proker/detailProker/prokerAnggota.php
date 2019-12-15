<?php $idToProker = $this->M_proker->getProkerNama($_GET['id_proker']);?>

      <section class="content">
        <div class="container-fluid">
        
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card" id="round">
                        
                            <div class="dropdown">
                              <button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown" style="width: 100%">Kelola lainnya
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
                            <h2><strong>ANGGOTA KEPANITIAAN</strong></h2>
                            <p>
                            </p>
                            <?php if ($idToProker['0']['proker_lembaga'] == $_SESSION['user_role']) { ?>


                            <?php if ($idToProker['0']['proker_tahun'] == $_SESSION['user_tahun']) { ?>
                            <button class="btn btn-lg btn-info waves-effect" data-toggle="modal" data-target="#ModalProkerAnggota" id="round"><i class="material-icons">person_add</i> Anggota Kepanitiaan</button> 
                            <?php } ?>


                            <?php } ?>
                        </div>
                        
                        <div class="body">
                            <div class="table-responsive">
                                <table id="refProkerAnggota" class="table table-bordered table-striped table-hover js-basic-example dataTable round_edge">
                                    <thead>
                                        <tr>
                                            <th>Nama Panitia</th>
                                            <th>Sie Kepanitiaan</th>
                                            <th>Kelola</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nama Panitia</th>
                                            <th>Sie Kepanitiaan</th>
                                            <th>Kelola</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                        <?php 
                                       
                                            foreach($proker_anggota as $pa){ 
                                            $idProker = $pa->id_proker;
                                            $idPosisi = $pa->id_posisi;
                                            $idUser = $pa->id_user;
                                            $id_anggota = $pa->prokerAnggota_ID;
                                            $idToPosisi = $this->M_proker->getPosisiNama($idPosisi);
                                            // $idToProker = $this->M_proker->getProkerNama($idProker);
                                            $idToNama = $this->M_user->getUserNama($idUser);
                                            ?>
                                            <tr>
                                                
                                                <td><?php echo $idToNama['0']['user_nama']; ?></td>
                                                <td><?php echo $idToPosisi['0']['prokerPosisi_nama']; ?> </td>
                                                <td>
                                                    <?php if ($idToProker['0']['proker_lembaga'] == $_SESSION['user_role']) { ?>
                                                        <?php if ($idToProker['0']['proker_tahun'] == $_SESSION['user_tahun']) { ?>
                                                            <a href="<?php echo site_url();?>/Proker_C/delProkerAnggota/<?php print($id_anggota);?>"><button class="btn btn-danger" id="round" onclick="return delConfirm()"><i class="material-icons">delete_forever</i></button></a>
                                                        
                                                        <?php } 
                                                            else {
                                                                echo "Locked";
                                                            }
                                                        ?>

                                                <?php } ?>
                                                    
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
                                <form id="form_validation" name="formProkerAnggota" class="formProkerAnggota" method="POST" style="margin: 20px" onsubmit="return submitProkerAnggota()">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <select class="form-control show-tick" name="prokerAnggota_nama" data-live-search="true">
                                                <option value="">-- Nama Anggota Kepanitiaan --</option>
                                                <?php 
                                                    foreach ($user_data as $ud) {
                                                        echo "<option value='$ud->user_ID'>".$ud->user_nama ."</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group form-float" id="select_posisi">
                                        <div class="form-line">
                                            <select class="form-control show-tick" name="prokerAnggota_posisi" data-live-search="true">
                                                <option value="">-- Posisi Kepanitiaan --</option>
                                                <?php 
                                                    foreach ($proker_posisi as $pp) {
                                                        echo "<option value='$pp->prokerPosisi_ID'>".$pp->prokerPosisi_nama ."</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div> Posisi kepanitiaan belum terdafar ? <a href="#" onclick="hide_modal_panitia()" data-toggle="modal" data-target="#ModalProkerPosisi"> daftarkan </a>
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





<!-- Modal Tambah Posisi Panitia -->
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
                        <hr>
                        <a href="#" onclick="return show_modal_panitia()" data-toggle="modal" data-target="#ModalProkerAnggota"> Daftarkan panitia </a>
                    </form>
                <!-- #END# Form Posisi Panitia -->
            </div>
            </center>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<script type="text/javascript">

    function hide_modal_panitia() {
        $('#ModalProkerAnggota').modal('hide');
        return false;
    }

    function show_modal_panitia() {
        $('#ModalProkerPosisi').modal('hide');
        // $('#ModalProkerAnggota').modal('toggle');
        return false;
    }

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

                        $('#select_posisi').load(document.URL +  ' #select_posisi');

                    })     
                }
            });
            
            return false;
        }

     function submitProkerAnggota() {

         var data = $('.formProkerAnggota').serialize();
                  
            $.ajax({
                type: 'POST',
                data: data,
                url: "<?php echo base_url('Proker_C/addProkerAnggota') ?>",
                success: function() {
                    Swal.fire({
                      position: 'top-end',
                      type: 'success',
                      title: 'Berhasil Menambah Anggota Kepanitiaan Proker',
                      showConfirmButton: false,
                      timer: 1500
                    }).then(function(){
                        $('#refProkerAnggota').load(document.URL +  ' #refProkerAnggota');
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