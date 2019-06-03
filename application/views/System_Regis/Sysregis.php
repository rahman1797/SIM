      <section class="content">
        <div class="container-fluid">
        
            <!-- Tabel Prodi -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card" id="round">
                        <div class="header" align="center">
                            
                            <button class="btn btn-lg btn-info waves-effect" data-toggle="modal" data-target="#ModalProdi" id="round">Tambah Prodi</button>  
                        </div>
                        
                        <div class="body">
                            <div class="table-responsive">
                                <table id="round" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Program Studi Terdaftar</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Program Studi Terdaftar</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                        <?php 

                                            $no = 1;
                                            foreach($data_prodi as $dt_pro){ 
                                                
                                            ?>
                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td><?php echo $dt_pro->prodi_nama ?></td>
                                            </tr>
                                        <?php } ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 

             <button id="MyButton">MYBUTTON</button>

            <!-- #END# Tabel Prodi -->

            <!-- Tabel Posisi -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card" id="round">
                        <div class="header" align="center">
                            
                            <button class="btn btn-lg btn-info waves-effect" data-toggle="modal" data-target="#ModalPosisi" id="round">Tambah Posisi</button>  
                        </div>
                        
                        <div class="body">
                            <div class="table-responsive">
                                <table id="round" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Posisi Terdaftar</th>
                                            <th>Lembaga</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Posisi Terdaftar</th>
                                            <th>Lembaga</th>
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
                                                <td><?php 
                                                    if ($dt_pos->posisi_lembaga == 1) {
                                                        echo 'Eksekutif';
                                                    }
                                                    else {
                                                        echo "Legislatif";
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


           

            <!-- #END# Tabel Posisi -->
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
                                    <button class="btn btn-primary waves-effect btn-lg simpanProdi" type="submit" id="round">Simpan</button>
                                </form>
                                     
                            <!-- #END# Form Prodi -->
                        </div>
                        </center>
                    </div>
                </div>
            </div>


 <!-- Modal Posisi -->
            <div class="modal fade" id="ModalPosisi" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Modal title</h4>
                        </div>
                        <div class="modal-body">
                            INI MODAL POSISI
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </div>
                </div>
            </div>




<script type="text/javascript">
    
    function submitProdi() {
         var data = $('.formProdi').serialize();
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url('Main_C/addProdi') ?>",
                data: data,
                success: function() {
                    swal({
                      title: "Sukses!",
                        text: "Selamat Datang di SIM OPMAWA!",
                        icon: "success",
                      })
                    }
                })
            };

    </script>
