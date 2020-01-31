<?php $idToProker = $this->M_proker->getProkerNama($_GET['id_proker']);?>
<section class="content">
    <div class="container-fluid">
    
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card" id="round">

                        <div class="dropdown text-center">
                          <button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown" style="width: 75%; background-color: #FF9800 !important">Kelola lainnya
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
                        <h2><strong>EVALUASI</strong><br>"<?= $idToProker['0']['proker_nama'] ?>"</h2>
                        <p></p>
                        <button class="btn btn-lg btn-info waves-effect" data-toggle="modal" data-target="#ModalProkerEvaluasi" id="round"><i class="material-icons">person_add</i> Tambah</button>  
                    </div>
                    
                    <div class="body">
                        <div class="table-responsive">
                            <table id="refProkerEvaluasi" class="table table-bordered table-striped table-hover js-basic-example dataTable round_edge">
                                <thead>
                                    <tr>
                                        <th>Evaluator</th>
                                        <th>Evaluasi</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Evaluator</th>
                                        <th>Evaluasi</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php foreach($proker_evaluasi as $pe){ 
                                        $idProker = $pe->id_proker;
                                        $idUser = $pe->id_user;
                                        $id_anggota = $pe->prokerEvaluasi_ID;
                                        $idToProker = $this->M_proker->getProkerNama($idProker);
                                        $idToNama = $this->M_user->getUserNama($idUser);?>
                                    <tr>     
                                        <td><?php echo $idToNama['0']['user_nama']; ?></td>
                                        <td><?php echo $pe->prokerEvaluasi_isi ?> </td>
                                        <td>
                                            <?php if ($idUser == $_SESSION['user_ID']) { ?>
                                                <a href="<?php echo site_url();?>/Proker_C/delProkerEvaluasi/<?php print($id_anggota);?>"><button class="btn btn-danger" id="round" onclick="return delConfirm()"><i class="material-icons">delete_forever</i></button></a>
                                            
                                            <?php } 
                                                else {
                                                    echo "Locked";
                                                } ?>
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

<!-- Modal Tambah Evaluasi -->
<div class="modal fade" id="ModalProkerEvaluasi" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content" id="round">
           <center>
            <div class="modal-body">
                  <!-- Form Evaluasi -->
                    <form id="form_validation" name="formProkerEvaluasi" class="formProkerEvaluasi" method="POST" style="margin: 20px" onsubmit="return submitProkerEvaluasi()">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <textarea type="text" class="form-control" name="prokerEvaluasi_isi" placeholder="Tuliskan evaluasi anda..."></textarea>
                            </div>
                        </div>
                         <input type="hidden" name="id_proker" value="<?php echo $_GET['id_proker'] ?>">
                         <input type="hidden" name="id_user" value="<?php echo $_SESSION['user_ID'] ?>">
                        <button class="btn btn-primary waves-effect btn-lg" type="submit" id="round">Simpan</button>
                    </form>

                <!-- #END# Form Evaluasu -->
            </div>
            </center>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<script type="text/javascript">

function submitProkerEvaluasi() {

    var data = $('.formProkerEvaluasi').serialize();

    $.ajax({
        type: 'POST',
        data: data,
        url: "<?php echo base_url('Proker_C/addProkerEvaluasi') ?>",
        success: function() {
            Swal.fire({
              position: 'top-end',
              type: 'success',
              title: 'Berhasil Menambah Evaluasi',
              showConfirmButton: false,
              timer: 1500
            }).then(function(){
                var ref = $('#refProkerEvaluasi');
                $('#refProkerEvaluasi').load(document.URL +  ' #refProkerEvaluasi', function() {
                ref.children('#refProkerEvaluasi').unwrap();});
                $('#ModalProkerEvaluasi').modal('hide');
                $('.formProkerEvaluasi')[0].reset();
            })     
        }
    });
    
    return false;
}

 function delConfirm() {
    job = confirm("Are you sure to delete permanently?");
    
    if(job != true)
    {
        return false;
    }
}
</script>