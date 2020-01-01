<section class="content">
    <div class="container-fluid">
    
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card" id="round">
                    <div class="header" align="center">
                        <h2><strong>EVALUASI RAPAT</strong></h2>
                        <p></p>
                        <button class="btn btn-lg btn-info waves-effect" data-toggle="modal" data-target="#ModalEvaluasiRapat" id="round"><i class="material-icons">person_add</i> Evaluasi</button>  
                    </div>
                    
                    <div class="body">
                        <div class="table-responsive">
                            <table id="refEvaluasiRapat" class="table table-bordered table-striped table-hover js-basic-example dataTable round_edge">
                                <thead>
                                    <tr>
                                        <th>Nama Panitia</th>
                                        <th>Evaluasi</th>
                                        <th>Kelola</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Nama Panitia</th>
                                        <th>Evaluasi</th>
                                        <th>Kelola</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php foreach($evaluasi_rapat as $er){ 
                                        $idRapat = $er->id_rapat;
                                        $idUser = $er->id_user;
                                        $id_evaluasi = $er->evaluasiRapat_ID;
                                        $idToRapat = $this->M_rapat->getRapatTanggal($idRapat);
                                        $idToNama = $this->M_user->getUserNama($idUser);
                                    ?>
                                    <tr>    
                                        <td><?php echo $idToNama['0']['user_nama']; ?></td>
                                        <td><?php echo $er->evaluasiRapat_isi ?> </td>
                                        <td>
                                            <?php if ($idUser == $_SESSION['user_ID']) { ?>
                                               <button class="btn btn-danger" id="round" value="<?php echo $er->evaluasiRapat_ID ?>" onclick="konfirmasiHapus(this.value)"><i class="material-icons">delete_forever</i></button>
                                            <?php } 
                                                else {
                                                    echo "Locked";
                                            } ?>       
                                        </td>
                                    </tr>
                                    <?php } 
                                         echo "<div class='alert alert-warning' id='round'>Evaluasi Untuk Rapat Pada Tanggal <font size='5'>".date('d F Y', strtotime($idToRapat['0']['rapat_tanggal']))."</font></div>";
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


<!-- Modal Tambah Eval Rapat -->
<div class="modal fade" id="ModalEvaluasiRapat" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content" id="round">
           <center>
            <div class="modal-body">
                <!-- Form Eval Rapat -->
                <form id="form_validation" name="formEvaluasiRapat" class="formEvaluasiRapat" method="POST" style="margin: 20px" onsubmit="return submitEvaluasiRapat()">
                    <div class="form-group form-float">
                        <div class="form-line">
                            <textarea type="text" class="form-control" name="evaluasiRapat_isi" placeholder="Tuliskan evaluasi anda..."></textarea>
                        </div>
                    </div>
                     <input type="hidden" name="id_rapat" value="<?php echo $_GET['id_rapat'] ?>">
                     <input type="hidden" name="id_user" value="<?php echo $_SESSION['user_ID'] ?>">
                    <button class="btn btn-primary waves-effect btn-lg" type="submit" id="round">Simpan</button>
                </form>
                <!-- #END# Form Eval Rapat -->
            </div>
            </center>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<script type="text/javascript">

function submitEvaluasiRapat() {

    var data = $('.formEvaluasiRapat').serialize();

    $.ajax({
        type: 'POST',
        data: data,
        url: "<?php echo base_url('Rapat_C/addEvaluasiRapat') ?>",
        success: function() {
            Swal.fire({
              position: 'top-end',
              type: 'success',
              title: 'Berhasil Menambah Evaluasi',
              showConfirmButton: false,
              timer: 1500
            }).then(function(){
                var ref = $('#refEvaluasiRapat');
                $('#refEvaluasiRapat').load(document.URL +  ' #refEvaluasiRapat', function() {
                ref.children('#refEvaluasiRapat').unwrap();});
            })     
        }
    });
    
    return false;
}

function konfirmasiHapus(id) {

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
            url: "<?php echo base_url('Rapat_C/hapusEvaluasiRapat?id_evaluasi=') ?>" + id,
            success: function(data){
                Swal.fire({
                  position: 'top-end',
                  type: 'success',
                  title: 'Berhasil Menghapus Evaluasi',
                  showConfirmButton: false,
                  timer: 1300
                }).then(function(){
                    var ref = $('#refEvaluasiRapat');
                    $('#refEvaluasiRapat').load(document.URL +  ' #refEvaluasiRapat' , function() {
                    ref.children('#refEvaluasiRapat').unwrap();});
                }) 
              },
              error: function(data){
                alert('Failed deleting data ');
              }
        })
    }
}
</script>