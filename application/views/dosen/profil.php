      <section class="content">
        <div class="container-fluid">
        
            <!-- Basic Examples -->
            
            <div class="card" id="round">
                <div class="row body">
                    <div class="col-lg-3">
                            <?php foreach ($profil as $p) { 
                                 $idToProdi = $this->M_user->getProdi($p->id_prodi);
                                 // $idToPosisi = $this->M_user->getPosisi($p->id_posisi);
                                 // $idToKabinet = $this->M_user->getKabinet($p->id_opmawa);
                                 // $idToDepartemen = $this->M_user->getDepartemen($p->id_departemen);
                                 // $tahun = $p->user_tahun;
                            ?>
                        
                              <div class="card profile-card">
                                <div class="profile-header">&nbsp;</div>
                                <div class="profile-body">
                                    <div class="image-area">
                                        <img style="width: 70%" src="<?php echo base_url('assets/images/user.png')?>" />
                                    </div>
                                    <div class="content-area" style="padding: 5px" id="refProfil1">
                                        <h3><?= $p->dosen_nama; ?></h3>
                                        <p><?= $p->dosen_nik ?></p>
                                    </div>
                                </div>
                            </div>
                       
                    </div>
                    <div class="col-lg-9">
                      <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Tentang Saya   </a></li>
                            <li role="presentation"><a href="#profile_settings" aria-controls="settings" role="tab" data-toggle="tab">Kelola Profil</a></li>
                            <li role="presentation"><a href="#change_password_settings" aria-controls="settings" role="tab" data-toggle="tab">Ganti Password</a></li>
                        </ul>
                                                     

                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="home">
                                        
                                            <table class="table" id="refProfil2">

                                            <tr>
                                                <th>Nomor Induk Karyawan </th>
                                                <td>:</td>
                                                <td><?php echo $p->dosen_nik; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Program Studi </th>
                                                <td>:</td>
                                                <td><?php echo $idToProdi['0']['prodi_nama']; ?></td>
                                            </tr>

                                        </table>
                                    </div>

                                    <div role="tabpanel" class="tab-pane fade in" id="profile_settings">

                                        <form class="form-horizontal form_edit_profil" id="form_edit_profil" onsubmit="return ubah_profil()">

                                            <div class="form-group">
                                                <label for="nama" class="col-lg-2 control-label">Nama</label>
                                                <div class="col-lg-10">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="nama" name="dosen_nama" value="<?=  $p->dosen_nama; ?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="NIM" class="col-lg-2 control-label">NIK</label>
                                                <div class="col-lg-10">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="NIM" name="dosen_nik" value="<?= $p->dosen_nik ?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="prodi" class="col-lg-2 control-label">Prodi</label>
                                                <div class="col-lg-10">
                                                    <select class="form-control show-tick" id="prodi" name="id_prodi" data-live-search="true">
                                                        <option value="<?php echo $p->id_prodi ?>"><?= $idToProdi['0']['prodi_nama']; ?></option>
                                                        <?php 
                                                            foreach ($prodi_data as $pd) {
                                                                echo "<option value='$pd->prodi_ID'>".$pd->prodi_nama ."</option>";
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                                                                
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" id="round" class="btn btn-success">Simpan</button>
                                                </div>
                                            </div>

                                            <input type="hidden" name="dosen_ID" value="<?= $_SESSION['user_ID'] ?>">
                                            <!-- <input type="hidden" name="user_pass" value="<?= $_SESSION['user_pass'] ?>">
                                            <input type="hidden" name="user_tahun" value="<?= $_SESSION['user_tahun'] ?>">
                                            <input type="hidden" name="user_role" value="<?= $_SESSION['user_role'] ?>"> -->
                                            

                                        </form>
                                    </div>

                                    <?php } ?>

                                    <div role="tabpanel" class="tab-pane fade in" id="change_password_settings">

                                        <!-- <form class="form-horizontal" method="post" action="<?php echo base_url('Dosen_C/ubah_password') ?>"> -->

                                        <form class="form-horizontal form_edit_password" onsubmit="return ubah_password()"> 
                                            
                                            <div class="form-group">
                                                <label for="OldPassword" class="col-sm-3 control-label">Password Lama</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="password" class="form-control" id="OldPassword" name="OldPassword" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">Password Baru</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="password" class="form-control" id="NewPassword" name="NewPassword" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="NewPasswordConfirm" class="col-sm-3 control-label">Password Baru (Konfirmasi)</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="password" class="form-control" id="NewPasswordConfirm" name="NewPasswordConfirm" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-3 col-sm-9">
                                                    <button type="submit" id="round" class="btn btn-success">Simpan</button>
                                                </div>
                                            </div>

                                            <input type="hidden" name="dosen_ID" value="<?= $_SESSION['user_ID'] ?>">

                                        </form>
                                    </div>
                                </div>
                          <!--   </div> -->

                    </div>

                </div>
            </div>

            <!-- #END# Basic Examples -->
        </div>
    </section>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<script type="text/javascript">
    
function ubah_profil() {

 var data = $('.form_edit_profil').serialize();
 
    $.ajax({
        type: 'POST',
        data: data,
        url: "<?php echo base_url('Dosen_C/ubah_profil') ?>",
        success: function() {
            Swal.fire({
              position: 'top-end',
              type: 'success',
              title: 'Profil diubah',
              showConfirmButton: false,
              timer: 1500
            }).then(function(){
                $('#refProfil1').load(document.URL +  ' #refProfil1');
                $('#refProfil2').load(document.URL +  ' #refProfil2');
                // $('#form_edit_profil').trigger("reset");
                $("form_edit_profil")[0].reset();
            })     
        }
    });
    
    return false;
}




function ubah_password() {

 var data = $('.form_edit_password').serialize();

 // alert(data);
          
    $.ajax({
        type: 'POST',
        data: data,
        url: "<?php echo base_url('Dosen_C/ubah_password') ?>",
        success: function(response) {
            if (response=='berhasil') {
                Swal.fire({
                      position: 'top-end',
                      type: 'success',
                      title: 'Password diubah',
                      showConfirmButton: false,
                      timer: 1500
                    })
                    // .then(function(){
                    //     $('#refProfil').load(document.URL +  ' #refProfil');
                    // })     
                }

            else if (response=='password lama salah') {

                Swal.fire({
                  title: 'Oops...',
                  text: 'Password lama salah!'
                })
            
            }
            
        }
            
    });
    
    return false;
}

</script>