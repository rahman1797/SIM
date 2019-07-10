
      <section class="content">
        <div class="container-fluid">
        
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card" id="round">
                        <div class="header" align="center">
                            <h2><strong>DAFTAR ANGGOTA OPMAWA</strong></h2>
                            <p></p>
                            <button class="btn btn-lg btn-info waves-effect" data-toggle="modal" data-target="#ModalAnggota" id="round">Tambah Anggota</button>  
                        </div>
                        
                        <div class="body">
                            <div class="table-responsive">
                                <table id="refAng" class="table table-bordered table-striped table-hover js-basic-example dataTable round_edge">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>NIM</th>
                                            <th>Prodi</th>
                                            <th>Posisi</th>
                                            <th>Tahun</th>
                                            <th>Lembaga</th>
                                            <th>Kelola</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nama</th>
                                            <th>NIM</th>
                                            <th>Prodi</th>
                                            <th>Posisi</th>
                                            <th>Tahun</th>
                                            <th>Lembaga</th>
                                            <th>Kelola</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                        <?php 
                                       
                                            foreach($user_data as $u){ 
                                                $idToProdi = $this->M_user->getProdi($u->id_prodi);
                                                $idToPosisi = $this->M_user->getPosisi($u->id_posisi);
                                                $tahun = $u->user_tahun;
                                            ?>
                                            <tr>
                                                <td><?php echo $u->user_nama ?></td>
                                                <td><?php echo $u->user_NIM ?></td>
                                                <td><?php echo $idToProdi['0']['prodi_nama']; ?></td>
                                                <td><?php echo $idToPosisi['0']['posisi_nama']; ?></td>
                                                <td><?php echo $tahun . " - " . ($tahun + 1) ?></td>
                                                <td><?php if ($u->user_role == 1) 
                                                            {
                                                                echo "Eksekutif";
                                                            }
                                                          elseif ($u->user_role == 2) 
                                                            {
                                                                echo "Legislatif";
                                                            }
                                                 ?></td>
                                                 <td>
                                                    <?php 

                                                        if ($_SESSION['user_role'] != $u->user_role) {
                                                            echo "Locked";
                                                        }
                                                        elseif ($_SESSION['user_role'] == $u->user_role) {
                                                            ?>
                                                            
                                                            <a href="<?php echo site_url();?>/User_C/delAnggota/<?php print($u->user_ID);?>"><button class="btn btn-danger" id="round" onclick="return delConfirm()">Delete</button></a>
                                                            
                                                            <?php
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
            <div class="modal fade" id="ModalAnggota" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content" id="round">
                       <center>
                        <div class="modal-body">
                              <!-- Form Angggota -->
                          <div class="alert alert-warning" id="round">
                              <strong>Informasi!</strong> Tahun kepengurusan dan lembaga akan menyesuaikan dengan ketua/ sekretaris yang meng-input.
                            </div>
                                <form id="form_validation" name="formAnggota" class="formAnggota" method="POST" style="margin: 20px" onsubmit="return submitAnggota()">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="user_nama" id="user_nama" required>
                                            <label class="form-label">Nama Lengkap</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="user_NIM" id="user_NIM" required>
                                            <label class="form-label">Nomor Induk Mahasiswa</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="Password" class="form-control" name="user_pass" id="user_pass" required>
                                            <label class="form-label">Password</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="checkbox" id="checkbox" name="checkbox" onclick="lihatPass()">
                                        <label for="checkbox">Tampilkan password</label>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="Password" class="form-control" name="user_pass_check" id="user_pass_check" required>
                                            <label class="form-label">Validasi Password</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <select class="form-control show-tick" name="user_prodi">
                                                <option value="">-- Prodi --</option>
                                                <?php 
                                                    foreach ($prodi_data as $pd) {
                                                        echo "<option value='$pd->prodi_ID'>".$pd->prodi_nama ."</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <select class="form-control show-tick" name="user_posisi">
                                                <option value="">-- Posisi --</option>
                                                <?php 
                                                    foreach ($posisi_data as $pod) {
                                                        echo "<option value='$pod->posisi_ID'>".$pod->posisi_nama ."</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <input type="hidden" name="user_tahun" value="<?php echo $_SESSION['user_tahun'] ?>">
                                     <input type="hidden" name="user_role" value="<?php echo $_SESSION['user_role'] ?>">
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

     function submitAnggota() {

         var data = $('.formAnggota').serialize();
         var pass = document.formAnggota.user_pass.value;  
         var pass_check = document.formAnggota.user_pass_check.value;  
        
             if(pass == pass_check){            
                $.ajax({
                    type: 'POST',
                    data: data,
                    url: "<?php echo base_url('User_C/addAnggota') ?>",
                    success: function() {
                        Swal.fire({
                          position: 'top-end',
                          type: 'success',
                          title: 'Berhasil menambah Anggota',
                          showConfirmButton: false,
                          timer: 1500
                        }).then(function(){
                            $('#refAng').load(document.URL +  ' #refAng');
                        })     
                    }
                });
             }  
        
            else
            {  
                alert("Password harus sama!");  
                return false;  
            }
            
            return false;
        }

        function lihatPass(){
            var x = document.getElementById("user_pass");
              if (x.type === "password") {
                x.type = "text";
              } else {
                x.type = "password";
              }
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