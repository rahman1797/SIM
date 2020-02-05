      <section class="content">
        <div class="container-fluid">
        
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card" id="round">
                        <div class="header" align="center">
                            <h2><strong>DATA PROGRAM KERJA</strong></h2>
                        </div>
                        
                        <div class="row clearfix">
                           <div class="body col-lg-6">
                             
                            <div class="table-responsive">
                                <table id="refProker" class="table table-bordered table-striped round_edge"> 
                                        <?php 
                                            foreach($proker_data as $pd) { 
                                            $date = date_create($pd->proker_tanggal);
                                            $id_proker = $pd->proker_ID
                                            ?>
                                            <tr>
                                                <th>Nama proker</th>
                                                <td><?php echo $pd->proker_nama ?></td>
                                            </tr>
                                            <tr>
                                                <th>Tanggal</th>
                                                <td><?php echo date_format($date,"d M Y"); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Lembaga</th>
                                                <td><?php if ($pd->proker_lembaga == 1) 
                                                            {
                                                                echo "Eksekutif";
                                                            }
                                                          elseif ($pd->proker_lembaga == 2) 
                                                            {
                                                                echo "Legislatif";
                                                            }
                                                 ?></td>
                                            </tr>
                                            <tr>
                                                <th>Tahun pelaksana</th>
                                                <td><?php echo $pd->proker_tahun." - ".(($pd->proker_tahun) + 1); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Penilaian</th>
                                                <td><?php if ($pd->proker_nilai) 
                                                            {
                                                                echo $pd->proker_nilai;
                                                            }
                                                          else 
                                                            {
                                                                echo "<font color='red'>Proker belum dinilai</font>";
                                                            }
                                                 ?></td>
                                            </tr> 
                                            <tr><th>Deskripsi</th>
                                                <td><?= $pd->proker_deskripsi ?></td>
                                            </tr>            
                                                 <td>

                                                <?php 
                                                    if ($pd->proker_tahun != $_SESSION['user_tahun']) {
                                                        echo "<button class='btn btn-danger' id='round' disabled>Locked</button>";
                                                    }
                                                    else {  
                                                        $value = [$pd->proker_nilai, $pd->proker_ID]; ?>
                                                        
                                                        <button class="btn btn-info get-id" data-toggle="modal" data-target="#ModalNilai" id="round" value="<?php echo $value['0'].'-'.$value['1'] ?>" onclick="return getValue(this.value)" ><i class="material-icons">edit</i></button>
                                                 <?php }
                                            } ?>
                                                 
                                                 </td>
                                            </tr>
                                            
                                </table>
                            </div>

                            </div> 



                            <div class="body col-lg-6">
                                <div class="table-responsive">
                                    <table id="refProkerAnggota" class="table table-bordered table-striped round_edge">
                                        <thead>
                                            <tr>
                                                <th>Nama Panitia</th>
                                                <th>Sie Kepanitiaan</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            <?php 
                                           
                                                foreach($proker_anggota as $pa){ 
                                                $idPosisi = $pa->id_posisi;
                                                $idUser = $pa->id_user;
                                                $id_anggota = $pa->prokerAnggota_ID;
                                                $idToPosisi = $this->M_proker->getPosisiNama($idPosisi);
                                                $idToNama = $this->M_user->getUserNama($idUser);
                                                ?>
                                                <tr>
                                                    
                                                    <td><?php echo $idToNama['0']['user_nama']; ?></td>
                                                    <td><?php echo $idToPosisi['0']['prokerPosisi_nama']; ?> </td>
                                                  
                                                </tr>
                                            <?php } 
                                                
                                            ?>                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>

                    </div>





                <div class="card" id="round">
                    <div class="header" align="center">
                        <h2><strong>Berkas Program Kerja</strong></h2>
                    </div>
                    <div class="row clearfix">
                      <div class="body col-lg-12">
                            <div class="table-responsive">
                                <table id="refProkerBerkas" class="table table-bordered table-striped round_edge">
                                    <thead>
                                        <tr>
                                            <td>id</td>
                                            <th>Nama file</th>
                                            <th>Tanggal di-upload</th>
                                            <th>Download</th>
                                            <th>Berkas status</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php 
                                            foreach($proker_berkas as $pb){ 
                                            $idBerkas = $pb->berkas_ID;
                                            $idProker = $pb->id_proker;
                                            ?>
                                            <tr>
                                                <td><?php echo $idBerkas; ?></td>
                                                <td><?php echo $pb->berkas_nama; ?></td>
                                                <td><?php echo $pb->berkas_tanggal; ?> </td>
                                                <td><?php if($bd->berkas_jenis != 'link') { ?>
                                                          
                                                      <a href="<?php echo base_url('Berkas_C/download?name='.$pb->berkas_nama.'&id_proker='.$idProker) ?>"><button button class="btn btn-info" id="round"><i class="material-icons">cloud_download</i></button></a>
                                                     
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <select name="berkas_status" onchange="return change_status(<?php echo $idBerkas ?>, this.value)">
                                                        <?php if (($pb->berkas_status) == 0) { ?>
                                                            <option value="0">Belum dikonfirmasi</option>
                                                            <option value="1">Ditolak</option>
                                                            <option value="2">Diterima</option>
                                                        <?php }
                                                        else if (($pb->berkas_status) == 1) { ?>
                                                            <option value="1">Ditolak</option>
                                                            <option value="2">Diterima</option>
                                                        <?php }
                                                        else { ?>
                                                            <option value="2">Diterima</option>
                                                            <option value="1">Ditolak</option>
                                                        <?php } ?>
                                                    </select>
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

            </div> 


            <div class="row clearfix">
                 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card" id="round"> 
                        <div class="body">
                            <table class="table">
                                <tr>
                                    <th>Pemasukan</th>
                                    <td>:</td>
                                    <td> <div id="totalPemasukan"></div></td>
                                </tr>
                                <tr>
                                    <th>Pengeluaran</th>
                                    <td>:</td>
                                    <td> <div id="totalPengeluaran"></div></td>
                                </tr>
                                <tr>
                                    <th>Saldo</th>
                                    <td>:</td>
                                    <td><div id="saldo"></div></td>
                                </tr>
                            </table>   
                        </div>
                    </div>
                </div> 
   <!--          </div>

            <div class="row clearfix"> -->
     
<!-- TABEL DATA PEMASUKAN -->
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="card" id="round">
                        <div class="header" align="center">
                            <h2><strong>PEMASUKAN</strong></h2>
                            <p></p>
                            <?php if ($getProkerData['0']['proker_lembaga'] == $_SESSION['user_role']) { ?>

                            <?php if ($idToProker['0']['proker_tahun'] == $_SESSION['user_tahun']) { ?>
                            <button class="btn btn-lg btn-success waves-effect" data-toggle="modal" data-target="#ModalPemasukan" id="round"><i class="material-icons">add_circle_outline</i> Pemasukan</button>  
                            <?php } ?>

                            <?php } ?>
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
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php 
                                            $totalPemasukan = 0;
                                            foreach($proker_pemasukan as $masuk){ 
                                            $totalPemasukan += $masuk->pemasukan_nominal; 
                                            ?>
                                            <tr>
                                                <td><?php echo date(" d M Y", $masuk->pemasukan_tanggal) ?></td>
                                                <td><?php echo $masuk->pemasukan_nominal ?></td>
                                                <td><?php echo $masuk->pemasukan_deskripsi ?></td>
                                                <td><?php if (isset($masuk->pemasukan_file)) { ?>
                                                    <a href="<?php echo base_url('uploads/keuangan/'. $masuk->pemasukan_file) ?>" class="btn btn-sm btn-success" id="round"><i class="material-icons">image_search</i></a>
                                                <?php } 
                                                else { ?>
                                                    <a href="javascript:void(0)" class="btn btn-sm" disabled id="round"><i class="material-icons">image_search</i></a>
                                                <?php }
                                                ?></td>                                                
                                            </tr>
                                        <?php } ?>
                               
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
                            <h2><strong>PENGELUARAN</strong></h2>
                            <p></p>
                            <?php if ($getProkerData['0']['proker_lembaga'] == $_SESSION['user_role']) { ?>

                            <?php if ($idToProker['0']['proker_tahun'] == $_SESSION['user_tahun']) { ?>
                            <button class="btn btn-lg btn-danger waves-effect" data-toggle="modal" data-target="#ModalPengeluaran" id="round"><i class="material-icons">add_circle_outline</i> Pengeluaran</button>  
                            <?php } ?>

                            <?php } ?>
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
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php 
                                            $totalPengeluaran = 0;
                                            foreach($proker_pengeluaran as $keluar){ 
                                            $totalPengeluaran += $keluar->pengeluaran_nominal; 
                                            ?>
                                            <tr>
                                                <td><?php echo date(" d M Y", $keluar->pengeluaran_tanggal)  ?></td>
                                                <td><?php echo $keluar->pengeluaran_nominal ?></td>
                                                <td><?php echo $keluar->pengeluaran_deskripsi ?></td>
                                                <td><?php if (isset($keluar->pengeluaran_file)) { ?>
                                                    <a href="<?php echo base_url('uploads/keuangan/'. $keluar->pengeluaran_file) ?>" class="btn btn-sm btn-success" id="round"><i class="material-icons">image_search</i></a>
                                                <?php } 
                                                else { ?>
                                                    <a href="javascript:void(0)" class="btn btn-sm" disabled id="round"><i class="material-icons">image_search</i></a>
                                                <?php }
                                                ?></td>
                                                
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





                    <div class="card" id="round">
                        <div class="header" align="center">
                            <h2><strong>EVALUASI</strong></h2>
                            <p></p>
                            <button class="btn btn-lg btn-info waves-effect" data-toggle="modal" data-target="#ModalProkerEvaluasi" id="round"><i class="material-icons">person_add</i> Evaluasi</button>  
                        </div>
                        
                        <div class="body">
                            <div class="table-responsive">
                                <table id="refProkerEvaluasi" class="table table-bordered table-striped table-hover js-basic-example dataTable round_edge">
                                    <thead>
                                        <tr>
                                            <th>Nama Panitia</th>
                                            <th>Evaluasi</th>
                                            <th>Kelola</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nama Panitia</th>
                                            <th>Evaluasi</th>
                                            <th>Kelola</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                        <?php 
                                       
                                            foreach($proker_evaluasi as $pe){ 
                                            $idProker = $pe->id_proker;
                                            $idUser = $pe->id_user;
                                            $id_anggota = $pe->prokerEvaluasi_ID;
                                            // $idToPosisi = $this->M_proker->getPosisiNama($idPosisi);
                                            $idToProker = $this->M_proker->getProkerNama($idProker);
                                            $idToNama = $this->M_user->getUserNama($idUser);
                                            ?>
                                            <tr>
                                                
                                                <td><?php echo $idToNama['0']['user_nama']; ?></td>
                                                <td><?php echo $pe->prokerEvaluasi_isi ?> </td>
                                                <td>
                                                    <?php if ($idUser == $_SESSION['user_ID']) { ?>
                                                        <a href="<?php echo site_url();?>/Proker_C/delProkerEvaluasi/<?php print($id_anggota);?>"><button class="btn btn-danger" id="round" onclick="return delConfirm()"><i class="material-icons">delete_forever</i></button></a>
                                                    
                                                    <?php } 
                                                        else {
                                                            echo "Locked";
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

            <!-- #END# Basic Examples -->
        </div>
    </section>

<!-- Modal Tambah Anggota -->
         <div class="modal fade" id="ModalNilai" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content" id="round">
                   <center>
                    <div class="modal-body">

                            <form id="form_validation" name="formNilai" class="formNilai" method="POST" style="margin: 20px" onsubmit="return submitNilai()">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        Nilai Proker
                                        <input type="text" placeholder="Penilaian dalam bentuk angka" class="form-control getValue" name="proker_nilai" id="proker_nilai" required>
                                    </div>
                                </div>
                                 <input type="hidden" name="proker_ID" id="idProker">
                                <button class="btn btn-primary waves-effect btn-lg" type="submit" id="round">Simpan</button>
                            </form>

                        <!-- #END# Form Anggota -->
                    </div>
                    </center>
                </div>
            </div>
        </div>




<!-- Modal evaluasi -->
<div class="modal fade" id="ModalProkerEvaluasi" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content" id="round">
           <center>
            <div class="modal-body">
                  <!-- Form Angggota -->
                    <form id="form_validation" name="formProkerEvaluasi" class="formProkerEvaluasi" method="POST" style="margin: 20px" onsubmit="return submitProkerEvaluasi()">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <textarea type="text" class="form-control" name="prokerEvaluasi_isi" placeholder="Tuliskan evaluasi anda..."></textarea>
                            </div>
                        </div>
                         <input type="hidden" name="id_proker" value="<?php echo $_GET['id_proker'] ?>">
                         <input type="hidden" name="id_user" value="<?php echo $_SESSION['user_ID'] ?>">
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

    function getValue(nilai){
        var val = nilai;
        var split = val.split("-")
        document.getElementById("proker_nilai").value = split[0];
        document.getElementById("idProker").value = split[1];
    }

     function submitNilai() {

         var data = $('.formNilai').serialize();
                  
            $.ajax({
                type: 'POST',
                data: data,
                url: "<?php echo base_url('Proker_C/nilai_proker_bem') ?>",
                success: function() {
                    Swal.fire({
                      position: 'top-end',
                      type: 'success',
                      title: 'Berhasil Menilai',
                      showConfirmButton: false,
                      timer: 1500
                    }).then(function(){
                        var ref = $('#refProker');
                        $('#refProker').load(document.URL +  ' #refProker', function() {
                        ref.children('#refProker').unwrap();});
                    })     
                }
            });
            
            return false;
        }

    document.getElementById('totalPemasukan').innerHTML = "Rp" + <?php echo $totalPemasukan ?>;
    document.getElementById('totalPengeluaran').innerHTML = "Rp" + <?php echo $totalPengeluaran ?>;
    document.getElementById('saldo').innerHTML = "Rp" + <?php echo $totalPemasukan - $totalPengeluaran ?>;

    function submitProkerEvaluasi() {

         var data = $('.formProkerEvaluasi').serialize();
        
            $.ajax({
                type: 'POST',
                data: data,
                url: "<?php echo base_url('Proker_C/addProkerEvaluasi') ?>",
                success: function() {
                    Swal.fire({
                      position: 'top-end',
                      type: 'success',
                      title: 'Berhasil Menambah Evaluasi',
                      showConfirmButton: false,
                      timer: 1500
                    }).then(function(){
                        var ref = $('#refProkerEvaluasi');
                        $('#refProkerEvaluasi').load(document.URL +  ' #refProkerEvaluasi', function() {
                        ref.children('#refProkerEvaluasi').unwrap();});
                    })     
                }
            });
            
            return false;
        }

        function change_status(idBerkas, status) {

            var data = $('.formStatus').serialize();

            $.ajax({
                type: 'POST',
                data: {berkas_ID: idBerkas, berkas_status: status},
                url: "<?php echo base_url('Proker_C/ganti_status_berkas') ?>",
                success: function() {
                    Swal.fire({
                      position: 'top-end',
                      type: 'success',
                      title: 'Status diganti',
                      showConfirmButton: false,
                      timer: 1500
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