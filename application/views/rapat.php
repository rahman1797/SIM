<section class="content">
    <div class="container-fluid">
    
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card" id="round">
                    <div class="header">
                        <h2><strong>Tambah Jadwal</strong></h2>
                        <p></p>
                        <div class="row">
                            <form method="POST" class="formRapat" onsubmit="return submit_rapat()">
                                <div class="col-lg-4">
                                    <input class="form-control" style="margin-bottom: 10px" type="date" name="rapat_tanggal" required>
                                </div>
                                <div class="col-lg-6">
                                    <input class="form-control" style="margin-bottom: 10px" type="text" name="rapat_deskripsi" placeholder="Keterangan" required>
                                </div>
                                <input type="hidden" name="id_opmawa" value="<?php echo $_SESSION['user_opmawa'] ?>">
                                <input type="hidden" name="rapat_lembaga" value="<?php echo $_SESSION['user_role'] ?>">
                                <div class="col-lg-2">
                                    <button type="submit" class="btn btn-info" id="round"><i class="material-icons">playlist_add</i></button>  
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="body" id="refJadwalRapat">
                    <?php foreach ($jadwal_rapat as $jadwal) { ?>
                        <div class="card" id="round">
                            <div class="body row">
                                <div class="col-lg-4"><i class="material-icons">date_range</i>
                                    <?php echo date('d F Y', strtotime($jadwal->rapat_tanggal));
                                          $date = strtotime($jadwal->rapat_tanggal);
                                          $diff = $date - time();
                                          $days = floor($diff/(60*60*24));  
                                          $hours = round(($diff-$days*60*60*24)/(60*60)); ?>
                                </div>
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <?php if (time() > $date) { ?>
                                                <a href="<?php echo base_url('Rapat_C/evaluasiRapat?id_rapat='.$jadwal->rapat_ID) ?>">
                                                    <div class="bg-green" style="padding: 5px; width: auto" id="round"><i class="material-icons">event_note</i> Evaluasi
                                                    </div>
                                                </a>                                                 
                                            <?php } else { ?>
                                                <div class="bg-pink" style="padding: 5px; width: auto" id="round"><i class="material-icons">av_timer</i><?php echo "$days hari $hours jam lagi"; ?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <div class="col-lg-4">
                                            <button class="btn btn-danger" id="round" value="<?php echo $jadwal->rapat_ID ?>" onclick="konfirmasiHapus(this.value)"><i class="material-icons">delete_forever</i></button>
                                        </div>
                                        <div class="col-lg-12">
                                            <h4>"<?php echo $jadwal->rapat_deskripsi; ?>"</h4>
                                        </div>
                                    </div>                                                
                                    
                                </div>
                            </div>
                        </div>
                   <?php } ?>       
                </div>
            </div>
        </div> 

        <!-- #END# Basic Examples -->
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<script type="text/javascript">

function submit_rapat() {

    var data = $('.formRapat').serialize();
          
    $.ajax({
        type: 'POST',
        data: data,
        url: "<?php echo base_url('Rapat_C/addJadwalRapat') ?>",
        success: function() {
            Swal.fire({
              position: 'top-end',
              type: 'success',
              title: 'Berhasil Menambah Jadwal',
              showConfirmButton: false,
              timer: 1300
            }).then(function(){
                $('#refJadwalRapat').load(document.URL +  ' #refJadwalRapat');
            })     
        }
    });
    
    return false;
}  

function konfirmasiHapus(id) {

    job = confirm("Are you sure to delete permanently?");
    
    if(job != true) {
        return false;
    }

    else
    {
        $.ajax({
            data: id,
            type: "GET",
            url: "<?php echo base_url('Rapat_C/hapusJadwal?id=') ?>" + id,
            success: function(data){
                Swal.fire({
                  position: 'top-end',
                  type: 'success',
                  title: 'Berhasil Menghapus Jadwal',
                  showConfirmButton: false,
                  timer: 1300
                }).then(function(){
                    $('#refJadwalRapat').load(document.URL +  ' #refJadwalRapat');
                }) 
              },
              error: function(data){
                alert('Failed deleting data ');
              }
        })
    }
}
</script>