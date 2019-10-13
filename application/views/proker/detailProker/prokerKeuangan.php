      <section class="content">
        <div class="container-fluid">
        
            <div class="row clearfix">

                 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card" id="round">
                        
                        <div class="body">
                            <div id="totalPemasukan"></div>
                            <div id="totalPengeluaran"></div>
                            <div id="saldo"></div>
                        </div>
                    </div>
                </div>

                
            </div>
            <div class="row clearfix">

               
<!-- TABEL DATA PEMASUKAN -->
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="card" id="round">
                        <div class="header" align="center">
                            <h2><strong>DATA PEMASUKAN PROKER</strong></h2>
                            <p></p>
                            <button class="btn btn-lg btn-success waves-effect" data-toggle="modal" data-target="#ModalPemasukan" id="round">Tambah Pemasukan</button>  
                        </div>
                        
                        <div class="body">
                            <div class="table-responsive">
                                <table id="refPemasukan" class="table table-bordered table-striped table-hover js-basic-example dataTable round_edge">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Nominal</th>
                                            <th>Deskripsi</th>
                                            <th>Bukti File</th>
                                            <th>Proker</th>
                                            <th>Lembaga</th>
                                            <th>Kabinet Opmawa</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Nominal</th>
                                            <th>Deskripsi</th>
                                            <th>Bukti File</th>
                                            <th>Proker</th>
                                            <th>Lembaga</th>
                                            <th>Kabinet Opmawa</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                        <?php 
                                            $totalPemasukan = 0;
                                            foreach($proker_pemasukan as $masuk){ 
                                            $totalPemasukan += $masuk->pemasukan_nominal; 
                                            ?>
                                            <tr>
                                                <td><?php echo $masuk->pemasukan_tanggal ?></td>
                                                <td><?php echo $masuk->pemasukan_nominal ?></td>
                                                <td><?php echo $masuk->pemasukan_deskripsi ?></td>
                                                <td><a href="#" class="btn btn-sm btn-info" id="round">Lihat</a></td>
                                                <td><?php echo $masuk->id_proker ?></td>
                                                <td><?php echo $masuk->pemasukan_lembaga ?></td>
                                                <td><?php echo $masuk->id_opmawa ?></td>
                                                
                                            </tr>
                                        <?php } 
       
                                        ?>

                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

<!-- TABEL DATA PENGELUARAN -->
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="card" id="round">
                        <div class="header" align="center">
                            <h2><strong>DATA PENGELUARAN PROKER</strong></h2>
                            <p></p>
                            <button class="btn btn-lg btn-danger waves-effect" data-toggle="modal" data-target="#ModalProkerAnggota" id="round">Tambah Pengeluaran</button>  
                        </div>
                        
                        <div class="body">
                            <div class="table-responsive">
                                <table id="refPengeluaran" class="table table-bordered table-striped table-hover js-basic-example dataTable round_edge">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Nominal</th>
                                            <th>Deskripsi</th>
                                            <th>Bukti File</th>
                                            <th>Proker</th>
                                            <th>Lembaga</th>
                                            <th>Kabinet Opmawa</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Nominal</th>
                                            <th>Deskripsi</th>
                                            <th>Bukti File</th>
                                            <th>Proker</th>
                                            <th>Lembaga</th>
                                            <th>Kabinet Opmawa</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                        <?php 
                                            $totalPengeluaran = 0;
                                            foreach($proker_pengeluaran as $keluar){ 
                                            $totalPengeluaran += $keluar->pengeluaran_nominal; 
                                            ?>
                                            <tr>
                                                <td><?php echo $keluar->pengeluaran_tanggal ?></td>
                                                <td><?php echo $keluar->pengeluaran_nominal ?></td>
                                                <td><?php echo $keluar->pengeluaran_deskripsi ?></td>
                                                <td><a href="#" class="btn btn-sm btn-info" id="round">Lihat</a></td>
                                                <td><?php echo $keluar->id_proker ?></td>
                                                <td><?php echo $keluar->pengeluaran_lembaga ?></td>
                                                <td><?php echo $keluar->id_opmawa ?></td>
                                                
                                            </tr>
                                        <?php } 
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



<!-- Modal Pemasukan -->
            <div class="modal fade" id="ModalPemasukan" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content" id="round">
                       <center>
                        <div class="modal-body">
                              <!-- Form Angggota -->
                                <!-- <form id="form_validation" name="formPemasukan" class="formPemasukan" method="POST" style="margin: 20px" onsubmit="return submitPemasukan()"> -->
                                <form id="form_validation" action="<?php echo base_url('Keuangan_C/inputPemasukan') ?>" name="formPemasukan" enctype="multipart/form-data" name="pemasukan_file" class="formPemasukan" method="POST" style="margin: 20px">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input class="form-control" type="text" id="pemasukan_nominal" name="pemasukan_nominal">
                                            <label class="form-label">Nominal</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input class="form-control" type="text" name="pemasukan_deskripsi">
                                            <label class="form-label">Deskripsi</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input class="form-control" type="date" name="pemasukan_tanggal">
                                            
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input class="form-control" type="File" name="pemasukan_file">
                                            
                                        </div>
                                    </div>
                                     <input type="hidden" name="id_proker" value="<?php echo $_GET['id_proker'] ?>">
                                     <input type="hidden" name="pemasukan_lembaga" value="<?php echo $_SESSION['user_role'] ?>">
                                     <input type="hidden" name="id_opmawa" value="<?php echo $_SESSION['user_opmawa'] ?>">
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

     function submitPemasukan() {

         var data = $('.formPemasukan').serialize();
         alert(data);

            $.ajax({
                type: 'POST',
                data: data,
                url: "<?php echo base_url('Keuangan_C/inputPemasukan') ?>",
                success: function() {
                    Swal.fire({
                      position: 'top-end',
                      type: 'success',
                      title: 'Berhasil',
                      showConfirmButton: false,
                      timer: 1500
                    }).then(function(){
                        $('#refPemasukan').load(document.URL +  ' #refPemasukan');
                    })     
                }
            });
            
            return false;
        }

        function submitPengeluaran() {

         var data = $('.formPengeluaran').serialize();
                  
            $.ajax({
                type: 'POST',
                data: data,
                url: "<?php echo base_url('Keuangan_C/inputPengeluaran') ?>",
                success: function() {
                    Swal.fire({
                      position: 'top-end',
                      type: 'success',
                      title: 'Berhasil',
                      showConfirmButton: false,
                      timer: 1500
                    }).then(function(){
                        $('#refPengeluaran').load(document.URL +  ' #refPengeluaran');
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

        document.getElementById('totalPemasukan').innerHTML = "Pemasukan Rp" + <?php echo $totalPemasukan ?>;
        document.getElementById('totalPengeluaran').innerHTML = "Pengeluaran Rp" + <?php echo $totalPengeluaran ?>;
        document.getElementById('saldo').innerHTML = "Saldo Rp" + <?php echo $totalPemasukan - $totalPengeluaran ?>;


</script>