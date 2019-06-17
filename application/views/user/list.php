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
                                <table id="refAng" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>NIM</th>
                                            <th>Prodi</th>
                                            <th>Posisi</th>
                                            <th>Tahun</th>
                                            <th>Lembaga</th>
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
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                        <?php 
                                       
                                            foreach($user_data as $u){ 
                                                $idToProdi = $this->M_user->getProdi($u->user_prodi);
                                                $idToPosisi = $this->M_user->getPosisi($u->user_prodi);
                                            ?>
                                            <tr>
                                                <td><?php echo $u->user_nama ?></td>
                                                <td><?php echo $u->user_NIM ?></td>
                                                <td><?php echo $idToProdi['0']['prodi_nama'] ?></td>
                                                <td><?php echo $idToPosisi['0']['posisi_nama'] ?></td>
                                                <td><?php echo $u->user_tahun ?></td>
                                                <td><?php if ($u->user_role == 1) 
                                                            {
                                                                echo "Eksekutif";
                                                            }
                                                          elseif ($u->user_role == 2) 
                                                            {
                                                                echo "Legislatif";
                                                            }
                                                 ?></td>
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
                          
                                <form id="form_validation" class="formAnggota" method="POST" style="margin: 20px" onsubmit="return submitAnggota()">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="user_nama" id="user_nama" required>
                                            <input type="hidden" value="<?php echo $_SESSION['user_role'] ?>" name="nama_lembaga" id="nama_lembaga" required>
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
                                        <input type="checkbox" id="checkbox" name="checkbox">
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
                                            <select class="form-control show-tick">
                                                <option value="">-- Prodi --</option>
                                                <option value="10">10</option>
                                                <option value="20">20</option>
                                                <option value="30">30</option>
                                                <option value="40">40</option>
                                                <option value="50">50</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <select class="form-control show-tick">
                                                <option value="">-- Posisi --</option>
                                                <option value="10">10</option>
                                                <option value="20">20</option>
                                                <option value="30">30</option>
                                                <option value="40">40</option>
                                                <option value="50">50</option>
                                            </select>
                                        </div>
                                    </div>
                                    <input type="hidden" name="user_tahun" value="<?php echo $_SESSION['user_role'] ?>">
                                    <button class="btn btn-primary waves-effect btn-lg" type="submit" id="round">Simpan</button>
                                </form>

                            <!-- #END# Form Anggota -->
                        </div>
                        </center>
                    </div>
                </div>
            </div>





<script type="text/javascript">
     function submitPosisi() {

         var data = $('.formAnggota').serialize();
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url('Main_C/addAnggota') ?>",
                data: data,
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
            return false;
            
        }
</script>