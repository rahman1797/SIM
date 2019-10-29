      <section class="content">
        <div class="container-fluid">
        
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card" id="round">
                        <div class="header" align="center">
                            <h1><strong>
                                <?php 
                                    foreach ($detail_opmawa as $do) {
                                        echo $do->opmawa_kabinet;
                                        $idToNama = $this->M_user->getUserNama($do->id_user);
                                ?>
                            </h1></strong>  
                        </div>
                        
                        <div class="body">
                            <div class="row">
                                <div class="col-lg-3">
                                    <?php 
                                    
                                        echo "<strong>Ketua : </strong>" . $idToNama['0']['user_nama'];
                                    
                                    ?>
                                </div>

                                <div class="col-lg-3">
                                    <?php 
                                        echo "<strong>Penilaian Opmawa : </strong>" ."78";
                                    } ?>
                                </div>
                            </div>

                            <div class="header" align="center">
                                <div class="alert alert-warning" id="round">
                                  <strong>Informasi!</strong> Tabel ini merupakan daftar posisi/jabatan yang terdaftar di dalam OPMAWA.
                                </div>
                                
                                <button class="btn btn-lg btn-info waves-effect" data-toggle="modal" data-target="#ModalDepartemen" id="round"><i class="material-icons">library_add</i> Departemen</button>  
                            </div>
                      
                            <div class="table-responsive">
                                <table id="refDep" class="table table-bordered table-striped table-hover js-basic-example dataTable round_edge">
                                    <thead>
                                        <tr>
                                            <th>Nama Departemen/Biro</th>
                                            <th>Jumlah Anggota</th>
                                            <th>Kelola</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nama Departemen/Biro</th>
                                            <th>Jumlah Anggota</th>
                                            <th>Kelola</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                       
                                            foreach($detail_departemenOpmawa as $ddo) { ?>
                                            <tr>
                                                <td><?php echo $ddo->departemen_nama ?></td>
                                                <td><?php echo "2" ?></td>
                                                <td>
                                                    <a href="<?php echo site_url();?>/Main_C/delDepartemen/<?php print($ddo->departemen_ID);?>"><button class="btn btn-danger" id="round" onclick="return delConfirm()"><i class="material-icons">delete_forever</i></button></a>
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

<!-- Modal Kabinet -->
            <div class="modal fade" id="ModalDepartemen" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content" id="round">
                       <center>
                        <div class="modal-body">
                              <!-- Form Prodi -->
                          
                                <form id="form_validation" class="formDepart" method="POST" style="margin: 20px" onsubmit="return submitDepart()">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                             <label class="form-label">Nama Departemen/Biro</label>
                                            <input type="text" class="form-control" name="nama_departemen" id="nama_departemen" required>
                                        </div>
                                    </div>
                                    <input type="hidden" name="id_opmawa" value="<?php echo $_GET['id_opmawa'] ?>">
                                    <button class="btn btn-primary waves-effect btn-lg" type="submit" id="round">Simpan</button>
                                </form>

                            <!-- #END# Form Prodi -->
                        </div>
                        </center>
                    </div>
                </div>
            </div>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>


<script type="text/javascript">

    function delConfirm()
    {
        job = confirm("Are you sure to delete permanently?");
        
        if(job != true)
        {
            return false;
        }
    }

    function submitDepart() {

         var data = $('.formDepart').serialize();
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url('Main_C/addDepartemen') ?>",
                data: data,
                success: function() {
                    Swal.fire({
                      position: 'top-end',
                      type: 'success',
                      title: 'Berhasil menambah departemen',
                      showConfirmButton: false,
                      timer: 1500
                    }).then(function(){
                        $('#refDep').load(document.URL +  ' #refDep');
                    })
                       
                }
            });
            return false;
            
        }            

    </script>