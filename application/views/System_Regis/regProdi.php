      <section class="content">
        <div class="container-fluid">

            <!-- Tabel Prodi -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card" id="round">
                        <div class="header" align="center">
                            <div class="alert alert-warning" id="round">
                              <strong>Peringatan!</strong> Menghapus salah satu prodi, maka seluruh user yang merupakan prodi tersebut akan otomatis terhapus.
                            </div>

                            <button class="btn btn-lg btn-info waves-effect" data-toggle="modal" data-target="#ModalProdi" id="round"><i class="material-icons">add_box</i> Prodi</button>  
                        </div>
                        
                        <div class="body">
                            <div class="table-responsive">
                                <table id="refPro" class="table table-bordered table-striped table-hover js-basic-example dataTable" style="border-radius: 12px"    >
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Program Studi Terdaftar</th>
                                            <th>Kelola</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Program Studi Terdaftar</th>
                                            <th>Kelola</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                        <?php 
                                            $no = 1;
                                            foreach($data_prodi as $dt_pro){ ?>
                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td><?php echo $dt_pro->prodi_nama ?></td>
                                                <td>
                                                    <a href="<?php echo site_url();?>/Main_C/delProdi/<?php print($dt_pro->prodi_ID);?>"><button class="btn btn-danger" id="round" onclick="return delConfirm()"><i class="material-icons">delete_forever</i></button></a>
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
            <!-- #END# Tabel Prodi -->
        </div>
    </section>

 <!-- Modal Prodi -->
            <div class="modal fade" id="ModalProdi" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content" id="round">
                        <center>
                        <div class="modal-body">
                            <!-- Form Prodi -->
                          
                                <form id="form_validation" class="formProdi" method="POST" style="margin: 20px" onsubmit="return submitProdi()">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="nama_prodi" id="nama_prodi" required>
                                            <label class="form-label">Masukkan Program Studi Baru</label>
                                        </div>
                                    </div>
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

    function submitProdi() {

         var data = $('.formProdi').serialize();
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url('Main_C/addProdi') ?>",
                data: data,
                success: function() {
                    Swal.fire({
                      position: 'top-end',
                      type: 'success',
                      title: 'Berhasil menambah posisi',
                      showConfirmButton: false,
                      timer: 1500
                    }).then(function(){
                        $('#refPro').load(document.URL +  ' #refPro');
                    })
                       
                }
            });
            return false; 
        }

    </script>
