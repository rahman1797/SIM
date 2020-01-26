 <section class="content">
    <div class="container-fluid">

        <!-- Tabel Posisi -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card" id="round">
                    <div class="header" align="center">
                        <div class="alert alert-warning" id="round">
                          <strong>Informasi!</strong> Tabel ini merupakan daftar posisi / jabatan yang terdaftar di dalam Opmawa.
                        </div>
                        
                        <button class="btn btn-lg btn-info waves-effect" data-toggle="modal" data-target="#ModalPosisi" id="round"><i class="material-icons">group_add</i> Tambah</button>  
                    </div>
                    
                    <div class="body refresh">
                        <div class="table-responsive">
                            <table id="refPos" class="table table-bordered table-striped table-hover js-basic-example dataTable" style="border-radius: 12px">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Posisi Terdaftar</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Posisi Terdaftar</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php 
                                        $no = 1;
                                        foreach($data_posisi as $dt_pos){                 
                                        ?>
                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $dt_pos->posisi_nama ?></td>
                                            <td>
                                                <a href="<?php echo site_url();?>/Main_C/delPosisi/<?php print($dt_pos->posisi_ID);?>"><button class="btn btn-danger" id="round" onclick="return delConfirm()"><i class="material-icons">delete_forever</i></button></a>
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

        <!-- #END# Tabel Posisi -->
    </div>
</section>

 <!-- Modal Posisi -->
<div class="modal fade" id="ModalPosisi" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content" id="round">
           <center>
            <div class="modal-body">
                <!-- Form Posisi -->
                <form id="form_validation" class="formPosisi" method="POST" style="margin: 20px" onsubmit="return submitPosisi()">
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="nama_posisi" id="nama_prodi" required>
                            <input type="hidden" value="<?php echo $_SESSION['user_role'] ?>" name="nama_lembaga" id="nama_lembaga" required>
                            <label class="form-label">Masukkan Posisi/Jabatan Baru</label>
                        </div>
                    </div>
                    <button class="btn btn-primary waves-effect btn-lg" type="submit" id="round">Simpan</button>
                </form>
                <!-- #END# Form Posisi -->
            </div>
            </center>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<script type="text/javascript">  

function submitPosisi() {

    var data = $('.formPosisi').serialize();
    
    $.ajax({
        type: 'POST',
        url: "<?php echo base_url('Main_C/addPosisi') ?>",
        data: data,
        success: function() {
            Swal.fire({
              position: 'top-end',
              type: 'success',
              title: 'Berhasil menambah posisi',
              showConfirmButton: false,
              timer: 1500
            }).then(function(){
                var ref = $('#refPos');
                $('#refPos').load(document.URL +  ' #refPos', function() {
                ref.children('#refPos').unwrap();});
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