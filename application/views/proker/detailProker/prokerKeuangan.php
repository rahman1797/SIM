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
                            <button class="btn btn-lg btn-success waves-effect" data-toggle="modal" data-target="#ModalProkerAnggota" id="round">Tambah Pemasukan</button>  
                        </div>
                        
                        <div class="body">
                            <div class="table-responsive">
                                <table id="refProkerAnggota" class="table table-bordered table-striped table-hover js-basic-example dataTable round_edge">
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
                                <table id="refProkerAnggota" class="table table-bordered table-striped table-hover js-basic-example dataTable round_edge">
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



<!-- Modal Tambah Anggota -->
            <div class="modal fade" id="ModalProkerAnggota" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content" id="round">
                       <center>
                        <div class="modal-body">
                              <!-- Form Angggota -->
                                <form id="form_validation" name="formProkerAnggota" class="formProkerAnggota" method="POST" style="margin: 20px" onsubmit="return submitProkerAnggota()">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <select class="form-control show-tick" name="prokerAnggota_nama">
                                                <option value="">-- Nama Anggota Kepanitiaan --</option>
                                                <?php 
                                                    foreach ($user_data as $ud) {
                                                        echo "<option value='$ud->user_ID'>".$ud->user_nama ."</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <select class="form-control show-tick" name="prokerAnggota_posisi">
                                                <option value="">-- Posisi Kepanitiaan --</option>
                                                <?php 
                                                    foreach ($proker_posisi as $pp) {
                                                        echo "<option value='$pp->prokerPosisi_ID'>".$pp->prokerPosisi_nama ."</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                     <input type="hidden" name="id_proker" value="<?php echo $_GET['id_proker'] ?>">
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

     function submitProkerAnggota() {

         var data = $('.formProkerAnggota').serialize();
                  
            $.ajax({
                type: 'POST',
                data: data,
                url: "<?php echo base_url('Proker_C/addProkerAnggota') ?>",
                success: function() {
                    Swal.fire({
                      position: 'top-end',
                      type: 'success',
                      title: 'Berhasil Menambah Anggota Kepanitiaan Proker',
                      showConfirmButton: false,
                      timer: 1500
                    }).then(function(){
                        $('#refProkerAnggota').load(document.URL +  ' #refProkerAnggota');
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