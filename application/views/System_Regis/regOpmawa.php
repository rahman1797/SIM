<section class="content">
    <div class="container-fluid">

        <!-- Tabel OPMAWA -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card" id="round">
                    <div class="header" align="center">
                        <button class="btn btn-lg btn-info waves-effect" data-toggle="modal" data-target="#ModalKabinet" id="round"><i class="material-icons">library_add</i> Registrasi Kabinet OPMAWA</button>  
                    </div>    
                    <div class="body">
                        <div class="table-responsive">
                            <table id="refOpmawa" class="table table-bordered table-striped table-hover js-basic-example dataTable round_edge">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Kabinet</th>
                                        <th>Nama Ketua</th>
                                        <th>Periode Kepengurusan</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Kabinet</th>
                                        <th>Nama Ketua</th>
                                        <th>Periode Kepengurusan</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php 
                                        $no = 1;
                                        foreach($data_opmawa as $do){ 
                                            $idUser = $do->id_user;
                                            $idToNama = $this->M_user->getUserNama($idUser);
                                            $tahunKepengurusan = $do->opmawa_tahun;
                                            $id_opmawa = $do->opmawa_ID;
                                        ?>
                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $do->opmawa_kabinet ?></td>
                                            <td><?php echo $idToNama['0']['user_nama'] ?></td>
                                            <td><?php echo $tahunKepengurusan . " - " . ($tahunKepengurusan + 1)  ?></td>
                                            <td>
                                                <a href="<?php echo base_url('Main_C/opmawaDetail?id_opmawa='. $id_opmawa)?>">
                                                    <button class="btn btn-info" id="round"><i class="material-icons">more_horiz</i></button>
                                                </a>
                                                <?php if ($_SESSION['user_posisi'] == 1 && $_SESSION['user_opmawa'] == $id_opmawa) { ?>
                                                        <a href="<?php echo site_url();?>/Main_C/delOpmawa/<?php print($do->opmawa_ID);?>"><button class="btn btn-danger" id="round" onclick="return delConfirm()"><i class="material-icons">delete_forever</i></button></a>
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
        <!-- #END# Tabel OPMAWA -->
    </div>
</section>

<!-- Modal Kabinet -->
<div class="modal fade" id="ModalKabinet" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content" id="round">
           <center>
            <div class="modal-body">
                  <!-- Form Kabinet -->          
                    <!-- <form id="form_validation" class="formKabinet" method="POST" style="margin: 20px" onsubmit="return submitOpmawa()"> -->
                        <form method="POST" action="<?php echo base_url('Main_C/addOpmawa') ?>">
                        <div class="form-group form-float">
                            <div class="form-line">
                                 <label class="form-label">Nama Kabinet</label>
                                <input type="text" class="form-control" name="nama_kabinet" id="nama_kabinet" required>
                            </div>
                        </div>
                     <!--    <div class="form-group form-float">
                            <div class="form-line">
                                <select class="form-control show-tick" name="nama_user" data-live-search="true" required>
                                    <option value="">-- Nama Ketua --</option>
                                    <?php foreach ($user_data as $ud) {
                                            echo "<option value='$ud->user_ID'>".$ud->user_nama."</option>";
                                    } ?>
                                </select>
                            </div>
                        </div> -->
                        <div class="form-group form-float">
                                        <div class="form-line">
                                            <select class="form-control show-tick" name="opmawa_level" data-live-search="true">
                                                <option value="0">-- Fakultas --</option>
                                                <?php 
                                                    foreach ($prodi_data as $pd) {
                                                        echo "<option value='$pd->prodi_ID'>".$pd->prodi_nama ."</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                        <button class="btn btn-primary waves-effect btn-lg" type="submit" id="round">Simpan</button>
                    </form>
                <!-- #END# Form Kabinet -->
            </div>
            </center>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<script type="text/javascript">

function submitOpmawa() {

    var data = $('.formKabinet').serialize();
    
    $.ajax({
        type: 'POST',
        data: data,
        url: "<?php echo base_url('Main_C/addOpmawa') ?>",
        success: function() {
            Swal.fire({
              position: 'top-end',
              type: 'success',
              title: 'Berhasil Menambah Periode Baru',
              showConfirmButton: false,
              timer: 1500
            }).then(function(){
                var ref = $('#refOpmawa');
                $('#refOpmawa').load(document.URL +  ' #refOpmawa', function() {
                ref.children('#refOpmawa').unwrap();});
                $('#ModalKabinet').modal('hide');
                $('.formKabinet')[0].reset();
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